<?php

namespace backend\models;
use app\models\Genset;
use yii\db\ActiveRecord;
use yii\db\Expression;


use Yii;

/**
 * This is the model class for table "site_genset".
 *
 * @property string $site_id
 * @property string $genset_id
 * @property string $date_added
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
    
    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => 'yii\behaviors\TimestampBehavior',
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['date_added'],
                ],
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['site_id', 'genset_id'], 'required'],
            [['date_added'], 'safe'],
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
            'date_added' => 'Date Added',
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
