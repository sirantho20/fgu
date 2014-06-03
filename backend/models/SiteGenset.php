<?php

namespace backend\models;
use app\models\Genset;


use Yii;

/**
 * This is the model class for table "site_genset".
 *
 * @property string $site_id
 * @property string $genset_id
 *
 * @property Gensets $genset
 * @property Site $site
 */
class SiteGenset extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'site_genset';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['site_id', 'genset_id'], 'required'],
            [['site_id', 'genset_id'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'site_id' => 'Site ID',
            'genset_id' => 'Genset ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGenset()
    {
        return $this->hasOne(Genset::className(), ['genset_id' => 'genset_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSite()
    {
        return $this->hasOne(Site::className(), ['site_id' => 'site_id']);
    }
}
