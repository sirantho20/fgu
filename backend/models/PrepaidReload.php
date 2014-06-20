<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "prepaid_reload".
 *
 * @property string $site_id
 * @property string $meter_id
 * @property double $reload_amount
 * @property string $reload_date
 * @property double $balance_before_reload
 * @property integer $kwh_readings
 * @property integer $kwh_consumed
 * @property double $amount_consumed
 * @property string $entry_date
 * @property string $entry_by
 * @property string $mc
 * @property string $date_modified
 * @property string $modified_by
 * @property integer $days_since_last_reload
 *
 * @property UtilityMeter $meter
 * @property Site $site
 */
class PrepaidReload extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'prepaid_reload';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['site_id', 'meter_id', 'reload_amount', 'reload_date', 'balance_before_reload','kwh_readings'], 'required'],
            [['reload_amount', 'balance_before_reload', 'amount_consumed'], 'number'],
            [['reload_date', 'entry_date', 'date_modified'], 'safe'],
            [['kwh_readings', 'kwh_consumed', 'days_since_last_reload'], 'integer'],
            [['site_id'], 'string', 'max' => 20],
            [['meter_id', 'entry_by', 'mc', 'modified_by'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'site_id' => 'Site ID',
            'meter_id' => 'Meter ID',
            'reload_amount' => 'Reload Amount',
            'reload_date' => 'Reload Date',
            'balance_before_reload' => 'Balance Before Reload',
            'kwh_readings' => 'Kwh Readings',
            'kwh_consumed' => 'Kwh Consumed',
            'amount_consumed' => 'Amount Consumed',
            'entry_date' => 'Entry Date',
            'entry_by' => 'Entry By',
            'mc' => 'Mc',
            'date_modified' => 'Date Modified',
            'modified_by' => 'Modified By',
            'days_since_last_reload' => 'Days Since Last Reload',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMeter()
    {
        return $this->hasOne(UtilityMeter::className(), ['meter_id' => 'meter_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSite()
    {
        return $this->hasOne(Site::className(), ['site_id' => 'site_id']);
    }
    
    public function beforeValidate() {
        $this->entry_date = new \yii\db\Expression('now()');
        $this->entry_by = Yii::$app->user->identity->username;
        $this->amount_consumed = $this->amountConsumed($this->meter_id, $this->balance_before_reload);
        $this->kwh_consumed = $this->kwhConsumed($this->meter_id, $this->kwh_readings);
        $this->days_since_last_reload = $this->daysSinceLastReload($this->meter_id, $this->reload_date);
        $this->mc = $this->entry_by = Yii::$app->user->identity->company;
        
        if(!$this->isNewRecord)
        {
            $this->date_modified = new yii\db\Expression('now()');
            $this->modified_by = Yii::$app->user->identity->username;
        }
        
        return parent::beforeValidate();
    }

    private function daysSinceLastReload($meter_id, $new_date)
    {
        
        $qr = new \yii\db\Query();
        $qr->from('prepaid_reload');
        $qr->select('date(reload_date) as reload_date');
        $qr->where(['meter_id'=>$meter_id]);
        $qr->orderBy('reload_date desc');
        $qr->limit(1);
        $model = $qr->all();
        if(count($model)>0)
        {
            $reading_date = $model[0]['reload_date'];
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
    
    private function amountConsumed($meter_id, $before_reload)
    {
        $model = PrepaidReload::find()->where(['meter_id'=>$meter_id])->orderBy('reload_date desc')->limit(1)->all();
        if(count($model)>0)
        {
            $re = ($model[0]['balance_before_reload'] + $model[0]['reload_amount']) - $before_reload;
        }
        else 
        {
            $re = '0.00';
        }
        return $re;
    }
    
    private function kwhConsumed($meter_id, $current_kwh)
    {
        $model = PrepaidReload::find()->where(['meter_id'=>$meter_id])->orderBy('reload_date desc')->limit(1)->all();
        if(count($model)>0)
        {
            $re = $current_kwh - $model[0]['kwh_readings'];
        }
        else 
        {
            $re = '0';
        }
        
        return $re;
    }
}
