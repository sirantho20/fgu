<?php

namespace backend\models;

use Yii;
use backend\models\GensetReading;

/**
 * This is the model class for table "fgu_fuelling".
 *
 * @property string $site_id
 * @property string $genset_id
 * @property string $delivery_date
 * @property double $quantity_delivered_cm
 * @property double $quantity_delivered_lts
 * @property string $emergency_fuelling
 * @property string $access_code
 * @property double $quantity_before_delivery_cm
 * @property double $quantity_before_delivery_lts
 * @property double $quantity_after_delivery_cm
 * @property double $quantity_after_delivery_lts
 * @property string $htg_fs_present,
 * @property string $entry_date 
 * @property string $entry_by
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
            [['delivery_date', 'quantity_delivered_cm', 'emergency_fuelling', 'access_code', 'quantity_before_delivery_cm', 'quantity_after_delivery_cm', 'htg_fs_present','genset_id','entry_date'], 'required'],
            [['delivery_date'], 'safe'],
            [['quantity_delivered_cm', 'quantity_delivered_lts', 'quantity_before_delivery_cm', 'quantity_before_delivery_lts', 'quantity_after_delivery_cm', 'quantity_after_delivery_lts'], 'number'],
            [['site_id', 'access_code', 'htg_fs_present'], 'string', 'max' => 50],
            [['emergency_fuelling'], 'string', 'max' => 10],
            [['genset_id'], 'string', 'max' => 255],
            [['entry_by'], 'string', 'max' => 45]
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
            'quantity_delivered_cm' => 'Quantity Delivered(cm)',
            'quantity_delivered_lts' => 'Quantity Delivered (lts)',
            'emergency_fuelling' => 'Emergency Fuelling',
            'access_code' => 'Access Code',
            'quantity_before_delivery_cm' => 'Quantity Before Delivery(cm)',
            'quantity_before_delivery_lts' => 'Quantity Before Delivery(lts)',
            'quantity_after_delivery_cm' => 'Quantity After Delivery(cm)',
            'quantity_after_delivery_lts' => 'Quantity After Delivery(lts)',
            'htg_fs_present' => 'Htg Fs Present',
            'genset_id' =>'Genset',
            'entry_date' => 'Entry Date',
            'entry_by' => 'Entry By',
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
        $this->quantity_delivered_lts = GensetReading::getFuelLtsfromCM($this->genset_id, $this->quantity_delivered_cm);
        $this->quantity_after_delivery_lts = GensetReading::getFuelLtsfromCM($this->genset_id, $this->quantity_after_delivery_cm);
        $this->quantity_before_delivery_lts = GensetReading::getFuelLtsfromCM($this->genset_id, $this->quantity_before_delivery_cm);
        $this->entry_date = new \yii\db\Expression('now()');
        $this->entry_by = Yii::$app->user->identity->username;
        return parent::beforeValidate();
    }
}