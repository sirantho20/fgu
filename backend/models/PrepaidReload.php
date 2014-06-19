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
}
