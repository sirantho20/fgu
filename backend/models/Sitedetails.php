<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "site_details".
 *
 * @property string $site_id
 * @property string $x3_site_id
 * @property string $ownership
 * @property string $site_accepted_for_closing
 * @property string $shareable
 * @property string $tigo_site_class
 * @property string $tigo_site_type
 * @property string $htg_site_type
 * @property integer $number_of_dependent_tigo_sites
 * @property string $tank_width
 * @property string $tank_height
 * @property string $tank_bredth
 * @property string $maintenance_contractor 
 * @property string $field_supervisor
 *
 * @property Site $site
 */
class SiteDetails extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'site_details';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['site_id', 'x3_site_id', 'ownership', 'site_accepted_for_closing', 'shareable', 'tigo_site_class', 'tigo_site_type', 'htg_site_type', 'number_of_dependent_tigo_sites'], 'required'],
            [['number_of_dependent_tigo_sites'], 'integer'],
            [['site_id', 'x3_site_id', 'ownership', 'site_accepted_for_closing', 'shareable', 'tigo_site_class', 'tigo_site_type', 'htg_site_type'], 'string', 'max' => 50],
            [['tank_width', 'tank_height', 'tank_bredth', 'maintenance_contractor', 'field_supervisor'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'site_id' => 'Site ID',
            'x3_site_id' => 'X3 Site ID',
            'ownership' => 'Ownership',
            'site_accepted_for_closing' => 'Site Accepted For Closing',
            'shareable' => 'Shareable',
            'tigo_site_class' => 'Tigo Site Class',
            'tigo_site_type' => 'Tigo Site Type',
            'htg_site_type' => 'Htg Site Type',
            'number_of_dependent_tigo_sites' => 'Number Of Dependent Tigo Sites',
            'tank_width' => 'Tank Width',
            'tank_height' => 'Tank Height',
            'tank_bredth' => 'Tank Bredth',
            'maintenance_contractor' => 'Maintenance Contractor', 
            'field_supervisor' => 'Field Supervisor',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSite()
    {
        return $this->hasOne(Site::className(), ['site_id' => 'site_id']);
    }
}
