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
        return $this->hasOne(Sitedetails::className(), ['site_id' => 'site_id']);
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
    public static function getMCSites($mc)
    {
        $qr = Site::findBySql('SELECT site.site_id,
           CONCAT(site.site_id,"-",site.site_name) as site_name,
           site.region,
           site.city_town
          FROM (site_genset site_genset
            INNER JOIN site site ON (site_genset.site_id = site.site_id))
           INNER JOIN site_details site_details
              ON (site_details.site_id = site.site_id)
         WHERE     (`site`.`site_id` IN (SELECT DISTINCT site_id FROM site_genset))
           AND (lower(site_details.maintenance_contractor) = :mc) order by site.site_id ASC',[':mc'=>strtolower($mc)]);
        
        return $qr->all();
    }
    
    public static function getMCSitesAutoComplete($mc)
    {
        $query = new \yii\db\Query();
        $query->from(['site_genset site_genset'])
                ->innerJoin('site site', 'site_genset.site_id = site.site_id')
                ->innerJoin('site_details site_details','site_details.site_id = site.site_id')
                ->where('(`site`.`site_id` IN (SELECT DISTINCT site_id FROM site_genset))')
                ->andWhere(['lower(site_details.maintenance_contractor)'=>  strtolower($mc)])
                ->select(['site.site_id as value','site.site_name as label'])
                ->orderBy(['site.site_id'=>SORT_ASC]);
        return \yii\helpers\Json::encode($query->all());
        
//        $qr = Site::findBySql('SELECT site.site_id as value,
//           CONCAT(site.site_id,"-",site.site_name) as `label`
//          FROM (site_genset site_genset
//            INNER JOIN site site ON (site_genset.site_id = site.site_id))
//           INNER JOIN site_details site_details
//              ON (site_details.site_id = site.site_id)
//         WHERE     (`site`.`site_id` IN (SELECT DISTINCT site_id FROM site_genset))
//           AND (site_details.maintenance_contractor = :mc) order by site.site_id ASC',[':mc'=>$mc]);
//        
//        return $qr->all();
    }
    public static function getMCPrepaidMeterSites($mc)
    {
        $qr = new \yii\db\Query();
        $qr->from(['prepaid_meter_sites prepaid_meter_sites'])
                ->innerJoin('site_details site_details', 'prepaid_meter_sites.site_id = site_details.site_id')
                ->where(['lower(site_details.maintenance_contractor)'=>  strtolower($mc)])
                ->select(['prepaid_meter_sites.site_id','CONCAT(prepaid_meter_sites.site_ID,"-",prepaid_meter_sites.site_name) AS site_name'])
                ->orderBy(['site_id'=>SORT_ASC]);
        
        return $qr->all();
    }
}
