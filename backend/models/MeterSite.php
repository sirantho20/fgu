<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "meter_site".
 *
 * @property string $site_id
 * @property string $meter_id
 *
 * @property Site $site
 * @property UtilityMeter $meter
 */
class MeterSite extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'meter_site';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['site_id', 'meter_id'], 'required'],
            [['site_id', 'meter_id'], 'string', 'max' => 50]
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSite()
    {
        return $this->hasOne(Site::className(), ['site_id' => 'site_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMeter()
    {
        return $this->hasOne(UtilityMeter::className(), ['meter_id' => 'meter_id']);
    }
}
