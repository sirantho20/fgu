<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Sitedetails;

/**
 * SitedetailsSearch represents the model behind the search form about `backend\models\Sitedetails`.
 */
class SitedetailsSearch extends Sitedetails
{
    public function rules()
    {
        return [
            [['site_id', 'x3_site_id', 'ownership', 'site_accepted_for_closing', 'shareable', 'tigo_site_class', 'tigo_site_type', 'htg_site_type', 'tank_width', 'tank_height', 'tank_bredth'], 'safe'],
            [['number_of_dependent_tigo_sites'], 'integer'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Sitedetails::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'number_of_dependent_tigo_sites' => $this->number_of_dependent_tigo_sites,
        ]);

        $query->andFilterWhere(['like', 'site_id', $this->site_id])
            ->andFilterWhere(['like', 'x3_site_id', $this->x3_site_id])
            ->andFilterWhere(['like', 'ownership', $this->ownership])
            ->andFilterWhere(['like', 'site_accepted_for_closing', $this->site_accepted_for_closing])
            ->andFilterWhere(['like', 'shareable', $this->shareable])
            ->andFilterWhere(['like', 'tigo_site_class', $this->tigo_site_class])
            ->andFilterWhere(['like', 'tigo_site_type', $this->tigo_site_type])
            ->andFilterWhere(['like', 'htg_site_type', $this->htg_site_type])
            ->andFilterWhere(['like', 'tank_width', $this->tank_width])
            ->andFilterWhere(['like', 'tank_height', $this->tank_height])
            ->andFilterWhere(['like', 'tank_bredth', $this->tank_bredth]);

        return $dataProvider;
    }
}
