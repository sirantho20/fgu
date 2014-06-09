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
            [['genset_id', 'site_id', 'reading_date', 'entry_date', 'access_code', 'meter_reading'], 'required'],
            [['reading_date', 'entry_date', 'date_modified'], 'safe'],
            [['fuel_level_cm', 'fuel_quantity_lts', 'genset_run_hours', 'fuel_consumed', 'power_consumed'], 'number'],
            [['days_from_last_reading', 'meter_reading'], 'integer'],
            [['genset_id', 'site_id', 'reading_by', 'entry_by', 'source_of_reading', 'modified_by', 'access_code'], 'string', 'max' => 50]
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
       $this->fuel_consumed = $this->fuelConsumed($this->genset_id, $this->fuel_quantity_lts);
       $this->power_consumed = $this->powerConsumed($this->genset_id, $this->meter_reading);
        //print_r($qr[0]['genset_id']);die();
       
        return parent::beforeValidate();
    }
    
    private function daysSinceLastReading($genset,$new_date)
    {
        $qr = new \yii\db\Query();
        $qr->from('genset_reading');
        $qr->select('date(reading_date) as reading_date');
        $qr->where(['genset_id'=>$genset]);
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
    private function fuelConsumed($genset, $fuel_level)
    {
        $model = GensetReading::find()->where(['genset_id'=>$genset])->orderBy('reading_date desc')->limit(1)->all();
        if(count($model)>0)
        {
            $re = $model[0]['fuel_quantity_lts'] - $fuel_level;
        }
        else 
        {
            $re = '0.00';
        }
        return $re;
    }
    private function powerConsumed($genset,$meter_reading) 
    {
        $model = GensetReading::find()->where(['genset_id'=>$genset])->orderBy('reading_date desc')->limit(1)->all();
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
}
