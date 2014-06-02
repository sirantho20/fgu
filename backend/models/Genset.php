<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "gensets".
 *
 * @property string $genset_id
 * @property string $supplier
 * @property double $kva
 * @property string $engine_used
 * @property string $fuel_tank_width
 * @property string $purchase_date
 * @property string $fuel_tank_height
 * @property string $fuel_tank_breadth
 * @property integer $start_run_hours
 *
 * @property SiteGenset $siteGenset
 * @property Site[] $sites
 */
class Genset extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'gensets';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['genset_id', 'supplier', 'kva', 'engine_used', 'fuel_tank_width', 'purchase_date', 'fuel_tank_height', 'fuel_tank_breadth', 'start_run_hours'], 'required'],
            [['kva'], 'number'],
            [['purchase_date'], 'safe'],
            [['start_run_hours'], 'integer'],
            [['genset_id', 'supplier'], 'string', 'max' => 50],
            [['engine_used', 'fuel_tank_width'], 'string', 'max' => 10],
            [['fuel_tank_height', 'fuel_tank_breadth'], 'string', 'max' => 53]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'genset_id' => 'Genset ID',
            'supplier' => 'Supplier',
            'kva' => 'Capacity (Kva)',
            'engine_used' => 'Engine Used',
            'fuel_tank_width' => 'Fuel Tank Width',
            'purchase_date' => 'Purchase Date',
            'fuel_tank_height' => 'Fuel Tank Height',
            'fuel_tank_breadth' => 'Fuel Tank Breadth',
            'start_run_hours' => 'Start Run Hours',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSiteGenset()
    {
        return $this->hasOne(SiteGenset::className(), ['genset_id' => 'genset_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSites()
    {
        return $this->hasMany(Site::className(), ['site_id' => 'site_id'])->viaTable('site_genset', ['genset_id' => 'genset_id']);
    }
}
