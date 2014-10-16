<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Genset;

/**
 * GensetSearch represents the model behind the search form about `backend\models\Genset`.
 */
class GensetSearch extends Genset
{
    public function rules()
    {
        return [
            [['genset_id', 'supplier', 'engine_used', 'fuel_tank_width', 'purchase_date', 'fuel_tank_height', 'fuel_tank_breadth'], 'safe'],
            [['kva'], 'number'],
            [['start_run_hours'], 'integer'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Genset::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'kva' => $this->kva,
            'purchase_date' => $this->purchase_date,
            'start_run_hours' => $this->start_run_hours,
        ]);

        $query->andFilterWhere(['like', 'genset_id', $this->genset_id])
            ->andFilterWhere(['like', 'supplier', $this->supplier])
            ->andFilterWhere(['like', 'engine_used', $this->engine_used])
            ->andFilterWhere(['like', 'fuel_tank_width', $this->fuel_tank_width])
            ->andFilterWhere(['like', 'fuel_tank_height', $this->fuel_tank_height])
            ->andFilterWhere(['like', 'fuel_tank_breadth', $this->fuel_tank_breadth]);

        return $dataProvider;
    }
}
