<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\PrepaidReload;

/**
 * PrepaidReloadSearch represents the model behind the search form about `backend\models\PrepaidReload`.
 */
class PrepaidReloadSearch extends PrepaidReload
{
    public function rules()
    {
        return [
            [['site_id', 'meter_id', 'reload_date', 'entry_date', 'entry_by', 'mc', 'date_modified', 'modified_by'], 'safe'],
            [['reload_amount', 'balance_before_reload', 'amount_consumed'], 'number'],
            [['kwh_readings', 'kwh_consumed', 'days_since_last_reload'], 'integer'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = PrepaidReload::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'reload_amount' => $this->reload_amount,
            'reload_date' => $this->reload_date,
            'balance_before_reload' => $this->balance_before_reload,
            'kwh_readings' => $this->kwh_readings,
            'kwh_consumed' => $this->kwh_consumed,
            'amount_consumed' => $this->amount_consumed,
            'entry_date' => $this->entry_date,
            'date_modified' => $this->date_modified,
            'days_since_last_reload' => $this->days_since_last_reload,
        ]);

        $query->andFilterWhere(['like', 'site_id', $this->site_id])
            ->andFilterWhere(['like', 'meter_id', $this->meter_id])
            ->andFilterWhere(['like', 'entry_by', $this->entry_by])
            ->andFilterWhere(['like', 'mc', $this->mc])
            ->andFilterWhere(['like', 'modified_by', $this->modified_by]);

        return $dataProvider;
    }
}
