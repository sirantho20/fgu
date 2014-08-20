<?php

namespace backend\models;

use Yii;
use yii\db\ActiveRecord;
use yii\db\Expression;

/**
 * This is the model class for table "genset_reading".
 *
 * @property string $genset_id
 * @property string $site_id
 * @property string $reading_date
 * @property double $fuel_level_cm
 * @property double $fuel_quantity_lts
 * @property double $genset_run_hours
 * @property string $entry_date
 * @property string $reading_by
 * @property string $entry_by
 * @property string $source_of_reading
 * @property string $date_modified
 * @property string $modified_by
 * @property integer $days_from_last_reading
 * @property string $access_code
 * @property integer $meter_reading
 * @property double $fuel_consumed 
 * @property double $power_consumed 
 * @property string $mc
 * @property string $run_hours_for_period
 *
 * @property Site $site
 */
class GensetReading extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'genset_reading';
    }
    
    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => 'yii\behaviors\TimestampBehavior',
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_VALIDATE => ['entry_date'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['date_modified'],
                ],
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['genset_id', 'site_id', 'reading_date', 'entry_date', 'access_code', 'meter_reading','fuel_level_cm'], 'required'],
            [['reading_date', 'entry_date', 'date_modified'], 'safe'],
            [['fuel_level_cm', 'fuel_quantity_lts', 'genset_run_hours', 'fuel_consumed', 'power_consumed'], 'number'],
            [['days_from_last_reading', 'meter_reading'], 'integer'],
            [['meter_reading'],'validateKWH'],
            [['genset_run_hours'],'validateRunHRS'], 
            [['access_code'],'validateAccessCode'],
            [['genset_id', 'site_id', 'reading_by', 'entry_by', 'source_of_reading', 'modified_by', 'access_code'], 'string', 'max' => 50],
            //[['mc', 'run_hours_for_period'], 'integer', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'genset_id' => 'Genset ID',
            'site_id' => 'Site ID',
            'reading_date' => 'Reading Date',
            'fuel_level_cm' => 'Fuel Level(cm)',
            'fuel_quantity_lts' => 'Fuel Quantity(lts)',
            'genset_run_hours' => 'Genset Run Hours',
            'entry_date' => 'Entry Date',
            'reading_by' => 'Reading By',
            'entry_by' => 'Entry By',
            'source_of_reading' => 'Source Of Reading',
            'date_modified' => 'Date Modified',
            'modified_by' => 'Modified By',
            'days_from_last_reading' => 'Days From Last Reading',
            'access_code' => 'Access Code',
            'meter_reading' => 'ECG Meter Reading(KWH)',
            'fuel_consumed' => 'Fuel Consumed',
            'power_consumed' => 'Power Consumed',
            'mc' => 'Maintenance Contractor',
            'run_hours_for_period' => 'Run Hours For Period',
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
       $qr = (new \yii\db\Query)->from('site_genset')->where(['site_id'=>$this->site_id])->select('genset_id')->all();
       $this->genset_id = $qr[0]['genset_id'];
       $this->entry_by = Yii::$app->user->identity->username;
       $this->days_from_last_reading = $this->daysSinceLastReading($this->genset_id,$this->reading_date);
       $this->fuel_quantity_lts = self::getFuelLtsfromCM($this->genset_id, $this->fuel_level_cm);
       $this->fuel_consumed = $this->fuelConsumed($this->genset_id, $this->fuel_quantity_lts);
       $this->power_consumed = $this->powerConsumed($this->genset_id, $this->meter_reading);
       $this->mc = Yii::$app->user->identity->company;
       $this->run_hours_for_period = $this->runHrsSinceLastReading($this->genset_id, $this->genset_run_hours);
        
       if(!$this->isNewRecord)
        {
            $this->modified_by = Yii::$app->user->identity->username;
        }
        return parent::beforeValidate();
    }

        private function daysSinceLastReading($genset,$new_date)
    {
        $qr = new \yii\db\Query();
        $qr->from('genset_reading');
        $qr->select('date(reading_date) as reading_date');
        $qr->where(['genset_id'=>$genset]);
        $qr->andWhere('reading_date < :date',[':date'=>$this->reading_date]);
        $qr->orderBy('reading_date desc');
        $qr->limit(1);
        $model = $qr->all();
        if(count($model)>0)
        {
            $reading_date = $model[0]['reading_date'];
            $date1 = new \DateTime($reading_date);
        }
        else 
        {
            $date1 = new \DateTime($new_date);
        }
        
        $date2 = new \Datetime($new_date);
        $diff = $date1->diff($date2);
        //echo $diff->days.' '.$new_date.' '.$reading_date;        die();
        return $diff->days;
        
    }
    private function runHrsSinceLastReading($genset, $runHrs)
    {
        $qr = new \yii\db\Query();
        $qr->from('genset_reading');
        $qr->select('genset_run_hours');
        $qr->where(['genset_id'=>$genset]);
        $qr->andWhere('reading_date < :date',[':date'=>$this->reading_date]);
        $qr->orderBy('reading_date desc');
        $qr->limit(1);
        $model = $qr->all();
        if(count($model)>0)
        {
            $last_runHrs = $model[0]['genset_run_hours'];
            
            $re = $runHrs - $last_runHrs;
        }
        else 
        {
            $re = 0;
        }
        
        return $re;
    }

    private function fuelConsumed($genset, $fuel_level)
    {
        $model = GensetReading::find()->where(['genset_id'=>$genset])->andWhere('reading_date < :date',[':date'=>$this->reading_date])->orderBy('reading_date desc')->limit(1)->all();
        if(count($model)>0)
        {
            $previous = $model[0]['fuel_quantity_lts'];
            $previous_date = $model[0]['reading_date'];
            
            $refuel = Fuelling::getRefuelforPeriod($genset, $previous_date);
            $re = ($refuel + $previous) - $fuel_level;
        }
        else 
        {
            $re = '0.00';
        }
        if($re < 0)
        {
            $re = $re * (-1);
        }
        return $re;
    }
    private function powerConsumed($genset,$meter_reading) 
    {
        $model = GensetReading::find()->where(['genset_id'=>$genset])->andWhere('reading_date < :date',[':date'=>$this->reading_date])->orderBy('reading_date desc')->limit(1)->all();
        if(count($model)>0)
        {
            $re = $meter_reading - $model[0]['meter_reading'];
        }
        else 
        {
            $re = '0.00';
        }
        return $re;
    }
    
    public function validateKWH($attribute, $params)
    {
        $model = GensetReading::find()->where(['genset_id'=>$this->genset_id])->andWhere('reading_date < :date',[':date'=>$this->reading_date])->orderBy('reading_date desc')->limit(1)->all();
        if(count($model)>0)
        {
         $last_kwh = $model[0]['meter_reading'];
         if($this->meter_reading < $last_kwh)
         {
             $this->addError($attribute,'Invalid meter reading. Check your data and try again.');
         }
        }
    }
    
    public function validateRunHRS($attribute, $params)
    {
        $model = GensetReading::find()->where(['genset_id'=>$this->genset_id])->andWhere('reading_date < :date',[':date'=>$this->reading_date])->orderBy('reading_date desc')->limit(1)->all();
            if(count($model)>0)
            {
                 $last_runHRS = $model[0]['genset_run_hours'];
                 if($this->genset_run_hours < $last_runHRS)
                 {
                     $this->addError($attribute,'Invalid run hours. Check your data and try again.');
                 }
            }
    }
    public static function getFuelLtsfromCM($genset, $level)
    {
        $gen = \app\models\Genset::find()->where(['genset_id'=>$genset])->all();
        //print_r($gen); die($gen);
        $site_genset = SiteGenset::find()->where(['genset_id'=>$genset])->all();
        $site_id = $site_genset[0]['site_id'];
        if($gen[0]['has_base_tank'] =='yes')
        {
            $lts = ($gen[0]['fuel_tank_width'] * $gen[0]['fuel_tank_breadth'] * $level)/1000;
        }
        else 
        {
            $site = Site::findOne($site_id);
            $width = $site->siteDetails->tank_width;
            $bredth = $site->siteDetails->tank_bredth;
            
            $lts = ($width * $bredth * $level) / 1000;
        }
        
        return $lts;
    }
    
    public static function getFuelTankCapacity($genset)
    {
        $gen = \app\models\Genset::find()->where(['genset_id'=>$genset])->all();
        //print_r($gen); die($gen);
        $site_genset = SiteGenset::find()->where(['genset_id'=>$genset])->all();
        $site_id = $site_genset[0]['site_id'];
        if($gen[0]['has_base_tank'] =='yes')
        {
            $lts = ($gen[0]['fuel_tank_width'] * $gen[0]['fuel_tank_breadth'] * $gen[0]['fuel_tank_height'])/1000;
        }
        else 
        {
            $site = Site::findOne($site_id);
            $width = $site->siteDetails->tank_width;
            $bredth = $site->siteDetails->tank_bredth;
            $height = $site->siteDetails->tank_height;
            
            $lts = ($width * $bredth * $height) / 1000;
        }
        
        return $lts;
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
           where lower(right(tbl.contractor,2)) = lower(right(:contractor,2)) and tbl.date = :date and tbl.access_code = :access_code and site_id = :site_id
            ",
           [
               //':contractor' => \Yii::$app->user->identity->company,
               ':date' => $this->reading_date,
               ':access_code' => str_replace(' ','',trim($this->access_code)),
               ':site_id' => $this->site_id
           ]);
        $re = $query->queryAll();
        
        if(count($re) < 1)
        {
            $this->addError($attribute, 'Invalid access code');
        }
    }
    
    
}
