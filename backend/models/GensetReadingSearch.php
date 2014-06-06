<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\GensetReading;

/**
 * GensetReadingSearch represents the model behind the search form about `backend\models\GensetReading`.
 */
class GensetReadingSearch extends GensetReading
{
    public function rules()
    {
        return [
            [['genset_id', 'site_id', 'reading_date', 'entry_date', 'reading_by', 'entry_by', 'source_of_reading', 'date_modified', 'modified_by', 'access_code'], 'safe'],
            [['fuel_level_cm', 'fuel_quantity_lts', 'genset_run_hours'], 'number'],
            [['days_from_last_reading'], 'integer'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = GensetReading::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'reading_date' => $this->reading_date,
            'fuel_level_cm' => $this->fuel_level_cm,
            'fuel_quantity_lts' => $this->fuel_quantity_lts,
            'genset_run_hours' => $this->genset_run_hours,
            'entry_date' => $this->entry_date,
            'date_modified' => $this->date_modified,
            'days_from_last_reading' => $this->days_from_last_reading,
        ]);

        $query->andFilterWhere(['like', 'genset_id', $this->genset_id])
            ->andFilterWhere(['like', 'site_id', $this->site_id])
            ->andFilterWhere(['like', 'reading_by', $this->reading_by])
            ->andFilterWhere(['like', 'entry_by', $this->entry_by])
            ->andFilterWhere(['like', 'source_of_reading', $this->source_of_reading])
            ->andFilterWhere(['like', 'modified_by', $this->modified_by])
            ->andFilterWhere(['like', 'access_code', $this->access_code]);

        return $dataProvider;
    }
}
