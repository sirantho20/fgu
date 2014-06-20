<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "site".
 *
 * @property string $site_id
 * @property string $site_name
 * @property string $region
 * @property string $city_town
 *
 * @property FguFuelling[] $fguFuellings
 * @property GensetReading[] $gensetReadings
 * @property MeterReading[] $meterReadings
 * @property MeterSite $meterSite
 * @property UtilityMeter[] $meters
 * @property SiteDetails $siteDetails
 * @property SiteGenset $siteGenset
 * @property Gensets[] $gensets
 */
class Site extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'site';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['site_id', 'city_town'], 'required'],
            [['site_id', 'site_name', 'region', 'city_town'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'site_id' => 'Site ID',
            'site_name' => 'Site Name',
            'region' => 'Region',
            'city_town' => 'City Town',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFguFuellings()
    {
        return $this->hasMany(FguFuelling::className(), ['site_id' => 'site_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGensetReadings()
    {
        return $this->hasMany(GensetReading::className(), ['site_id' => 'site_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMeterReadings()
    {
        return $this->hasMany(MeterReading::className(), ['site_id' => 'site_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMeterSite()
    {
        return $this->hasOne(MeterSite::className(), ['site_id' => 'site_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMeters()
    {
        return $this->hasMany(UtilityMeter::className(), ['meter_id' => 'meter_id'])->viaTable('meter_site', ['site_id' => 'site_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSiteDetails()
    {
        return $this->hasOne(SiteDetails::className(), ['site_id' => 'site_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSiteGenset()
    {
        return $this->hasOne(SiteGenset::className(), ['site_id' => 'site_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGensets()
    {
        return $this->hasMany(Gensets::className(), ['genset_id' => 'genset_id'])->viaTable('site_genset', ['site_id' => 'site_id']);
    }
}
