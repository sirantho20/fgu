<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\UtilityMeter;

/**
 * UtilitymeterSearch represents the model behind the search form about `backend\models\Utilitymeter`.
 */
class UtilitymeterSearch extends UtilityMeter
{
    public function rules()
    {
        return [
            [['meter_id', 'purchase_date', 'meter_type', 'utility_provider'], 'safe'],
            [['kwh_before_install'], 'number'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Utilitymeter::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'purchase_date' => $this->purchase_date,
            'kwh_before_install' => $this->kwh_before_install,
        ]);

        $query->andFilterWhere(['like', 'meter_id', $this->meter_id])
            ->andFilterWhere(['like', 'meter_type', $this->meter_type])
            ->andFilterWhere(['like', 'utility_provider', $this->utility_provider]);

        return $dataProvider;
    }
}
