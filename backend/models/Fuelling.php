<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "fgu_fuelling".
 *
 * @property string $site_id
 * @property string $delivery_date
 * @property double $quantity_delivered_cm
 * @property double $quantity_delivered_lts
 * @property string $emergency_fuelling
 * @property string $access_code
 * @property double $quantity_before_delivery_cm
 * @property double $quantity_before_delivery_lts
 * @property double $quantity_after_delivery_cm
 * @property double $quantity_after_delivery_lts
 * @property string $htg_fs_present
 *
 * @property Site $site
 */
class Fuelling extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fgu_fuelling';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['delivery_date', 'quantity_delivered_lts', 'emergency_fuelling', 'access_code', 'quantity_before_delivery_cm', 'quantity_before_delivery_lts', 'quantity_after_delivery_cm', 'quantity_after_delivery_lts', 'htg_fs_present'], 'required'],
            [['delivery_date'], 'safe'],
            [['quantity_delivered_cm', 'quantity_delivered_lts', 'quantity_before_delivery_cm', 'quantity_before_delivery_lts', 'quantity_after_delivery_cm', 'quantity_after_delivery_lts'], 'number'],
            [['site_id', 'access_code', 'htg_fs_present'], 'string', 'max' => 50],
            [['emergency_fuelling'], 'string', 'max' => 10]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'site_id' => 'Site ID',
            'delivery_date' => 'Delivery Date',
            'quantity_delivered_cm' => 'Quantity Delivered Cm',
            'quantity_delivered_lts' => 'Quantity Delivered Lts',
            'emergency_fuelling' => 'Emergency Fuelling',
            'access_code' => 'Access Code',
            'quantity_before_delivery_cm' => 'Quantity Before Delivery Cm',
            'quantity_before_delivery_lts' => 'Quantity Before Delivery Lts',
            'quantity_after_delivery_cm' => 'Quantity After Delivery Cm',
            'quantity_after_delivery_lts' => 'Quantity After Delivery Lts',
            'htg_fs_present' => 'Htg Fs Present',
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
