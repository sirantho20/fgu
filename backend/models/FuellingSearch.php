<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Fuelling;

/**
 * FuellingSearch represents the model behind the search form about `backend\models\Fuelling`.
 */
class FuellingSearch extends Fuelling
{
    public function rules()
    {
        return [
            [['site_id', 'delivery_date', 'emergency_fuelling', 'access_code', 'htg_fs_present'], 'safe'],
            [['quantity_delivered_cm', 'quantity_delivered_lts', 'quantity_before_delivery_cm', 'quantity_before_delivery_lts', 'quantity_after_delivery_cm', 'quantity_after_delivery_lts'], 'number'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Fuelling::find()->where(['week(entry_date,1)'=>new \yii\db\Expression('week(now(),1)'),'mc'=>  \Yii::$app->user->identity->company]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'delivery_date' => $this->delivery_date,
            'quantity_delivered_cm' => $this->quantity_delivered_cm,
            'quantity_delivered_lts' => $this->quantity_delivered_lts,
            'quantity_before_delivery_cm' => $this->quantity_before_delivery_cm,
            'quantity_before_delivery_lts' => $this->quantity_before_delivery_lts,
            'quantity_after_delivery_cm' => $this->quantity_after_delivery_cm,
            'quantity_after_delivery_lts' => $this->quantity_after_delivery_lts,
        ]);

        $query->andFilterWhere(['like', 'site_id', $this->site_id])
            ->andFilterWhere(['like', 'emergency_fuelling', $this->emergency_fuelling])
            ->andFilterWhere(['like', 'access_code', $this->access_code])
            ->andFilterWhere(['like', 'htg_fs_present', $this->htg_fs_present]);

        return $dataProvider;
    }
}
