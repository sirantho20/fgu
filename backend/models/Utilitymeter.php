<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "utility_meter".
 *
 * @property string $meter_id
 * @property string $purchase_date
 * @property string $meter_type
 * @property string $utility_provider
 * @property double $kwh_before_install
 *
 * @property MeterSite $meterSite
 * @property Site[] $sites
 */
class Utilitymeter extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'utility_meter';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['meter_id', 'purchase_date', 'kwh_before_install'], 'required'],
            [['purchase_date'], 'safe'],
            [['kwh_before_install'], 'number'],
            [['meter_id', 'meter_type', 'utility_provider'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'meter_id' => 'Meter ID',
            'purchase_date' => 'Purchase Date',
            'meter_type' => 'Meter Type',
            'utility_provider' => 'Utility Provider',
            'kwh_before_install' => 'Kwh Before Install',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMeterSite()
    {
        return $this->hasOne(MeterSite::className(), ['meter_id' => 'meter_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSites()
    {
        return $this->hasMany(Site::className(), ['site_id' => 'site_id'])->viaTable('meter_site', ['meter_id' => 'meter_id']);
    }
}
