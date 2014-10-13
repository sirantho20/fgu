<?php

namespace backend\models;

use Yii;
use backend\models\GensetReading;

/** room 11 5091144086
 * This is the model class for table "fgu_fuelling".
 *
 * @property string $site_id
 * @property string $genset_id
 * @property string $delivery_date
 * @property double $quantity_delivered_cm
 * @property double $quantity_delivered_lts
 * @property string $emergency_fuelling
 * @property string $access_code
 * @property double $quantity_before_delivery_cm
 * @property double $quantity_before_delivery_lts
 * @property double $quantity_after_delivery_cm
 * @property double $quantity_after_delivery_lts
 * @property string $htg_fs_present,
 * @property string $entry_date 
 * @property string $entry_by
 * @property string $mc
 * @property string $fuel_supplier
 *
 * @property Site $site
 */
class Fuelling extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fgu_fuelling';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['delivery_date', 'quantity_delivered_cm', 'emergency_fuelling', 'access_code', 'quantity_before_delivery_cm', 'quantity_after_delivery_cm', 'htg_fs_present','genset_id','entry_date'], 'required'],
            [['delivery_date'], 'safe'],
            [['quantity_delivered_cm', 'quantity_delivered_lts', 'quantity_before_delivery_cm', 'quantity_before_delivery_lts', 'quantity_after_delivery_cm', 'quantity_after_delivery_lts'], 'number'],
            [['site_id', 'access_code', 'htg_fs_present'], 'string', 'max' => 50],
            [['emergency_fuelling'], 'string', 'max' => 10],
            [['genset_id', 'mc'], 'string', 'max' => 255],
            [['entry_by'], 'string', 'max' => 45],
            [['access_code'],'validateAccessCode'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'site_id' => 'Site ID',
            'delivery_date' => 'Delivery Date',
            'quantity_delivered_cm' => 'Quantity Delivered/Transfered(cm)',
            'quantity_delivered_lts' => 'Quantity Delivered (lts)',
            'emergency_fuelling' => 'Remarks',
            'access_code' => 'Access Code',
            'quantity_before_delivery_cm' => 'Quantity Before Delivery/Transfer/Seperation(cm)',
            'quantity_before_delivery_lts' => 'Quantity Before Delivery/Transfer/Seperation(lts)',
            'quantity_after_delivery_cm' => 'Quantity After Delivery/Transfer/Seperation(cm)',
            'quantity_after_delivery_lts' => 'Quantity After Delivery/Transfer/Seperation(lts)',
            'htg_fs_present' => 'Htg Fs Present',
            'genset_id' =>'Genset',
            'entry_date' => 'Entry Date',
            'entry_by' => 'Entry By',
            'mc' => 'Maintenance Contractor',
            'fuel_supplier' => 'Fuel Supplier'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSite()
    {
        return $this->hasOne(Site::className(), ['site_id' => 'site_id']);
    }
    
    public function beforeValidate() {
        $this->quantity_delivered_cm = $this->quantity_after_delivery_cm - $this->quantity_before_delivery_cm;
        $this->quantity_delivered_lts = GensetReading::getFuelLtsfromCM($this->genset_id, $this->quantity_delivered_cm);
        $this->quantity_after_delivery_cm = $this->quantity_before_delivery_cm + $this->quantity_delivered_cm;
        $this->quantity_after_delivery_lts = GensetReading::getFuelLtsfromCM($this->genset_id, $this->quantity_after_delivery_cm);
        $this->quantity_before_delivery_lts = GensetReading::getFuelLtsfromCM($this->genset_id, $this->quantity_before_delivery_cm);
        $this->entry_date = new \yii\db\Expression('now()');
        $this->entry_by = Yii::$app->user->identity->username;
        $this->mc = Yii::$app->user->identity->company;
        $this->delivery_date = new \yii\db\Expression('date(now())');
        
        return parent::beforeValidate();
    }
    
    public function validateAccessCode($attribute, $params)
    {
        $conn = \Yii::$app->spoandb;
        $query = $conn->createCommand("select * from (SELECT sitelist.ContractorName contractor,
                troubleticket.siteID site_id,
                SUBSTRING(troubleticket.ourReference,charindex(':',troubleticket.ourReference)+1,4) access_code,
                convert(date, troubleticket.dateReported) date
           FROM escalator.dbo.sitelist sitelist
                INNER JOIN escalator.dbo.troubleticket troubleticket
                   ON (sitelist.siteID = troubleticket.siteID)
           UNION
           SELECT access.contractor contractor,
                access.siteID site_id,
                access.accessCode AccessCode,
                CONVERT(DATE,access.accessDate) date
           FROM escalator.dbo.access access
           UNION
           SELECT refuel.Contractor contractor,
                refuel.siteid site_id,
                refuel.AccessCode access_code,
                CONVERT(DATE,refuel.dateRefueled) date
           FROM escalator.dbo.refuel refuel) as tbl
           where lower(right(tbl.contractor,2)) = lower(right(:contractor,2)) and tbl.date = convert(date, getdate()) and tbl.access_code = :access_code and site_id = :site_id
            ",
           [
               ':contractor' => \Yii::$app->user->identity->company,
               ':access_code' => str_replace(' ','',trim($this->access_code)),
               ':site_id' => $this->site_id
           ]);
        $re = $query->queryAll();
        
        if(count($re) < 1)
        {
            $this->addError($attribute, 'Invalid access code');
        }
    }
    public static function getRefuelforPeriod($genset, $date)
    {
        //$model = Fuelling::findBySql('select sum(quantity_delivered_lts) as quantity from fgu_fuelling where week(delivery_date,1) = week(:date,1) and genset_id = :genset;',[':date'=>$date,':genset'=>$genset])->all();
//        $model = Fuelling::find()->select('sum(quantity_delivered_lts)')->where('week(delivery_date,1) = week(:date,1)',[':date'=>$date])
//                ->andWhere(['genset_id'=>$genset])->all();
        $mod = new \yii\db\Query();
        $mod->from('fgu_fuelling')
                ->select('sum(quantity_delivered_lts) as quantity')
                ->where('week(delivery_date,1) = week(:date,1)', [':date'=>$date])
                ->andWhere(['genset_id'=>$genset]);
        $model = $mod->all();
        
        if(count($model) > 0)
        {
            $re = $model[0]['quantity'];
        }
        else
        {
            $re = 0;
        }
        
        return $re;
    }
    /**
     * Get fueling quantity for week of $date
     * @param string $genset Genset of ID for site
     * @param date $date Date of last/current refuel
     * @param boolean $wholeWeek Wether to calculate for whole week of $date or only for period after $date
     */
    public static function getWeeklyRefuel($genset, $date, $wholeWeek = FALSE)
    {
        if($wholeWeek)
        {
            $mod = new \yii\db\Query();
            $mod->select('sum(quantity_delivered_lts) as quantity')
                    ->from('fgu_fuelling')
                    ->where('week(:date,1) = week(delivery_date,1)',[':date'=>$date])
                    ->andWhere(['genset_id'=>$genset]);
        }
        else
        {
            $mod = new \yii\db\Query();
            $mod->select('sum(quantity_delivered_lts) as quantity')
                    ->from('fgu_fuelling')
                    ->where('week(:date,1) = week(delivery_date,1)',[':date'=>$date])
                    ->andWhere('delivery_date < :date',[':date'=>$date])
                    ->andWhere(['genset_id'=>$genset]);
        }
        
        $re = $mod->all();
        
        if(count($re) > 0)
        {
            print_r($re);die();
            $out = $re[0]['quantity'];
        }
        else 
        {
            $out = 0;
        }
        
        return $out;
        
    }

}
