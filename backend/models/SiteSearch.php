<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Site;

/**
 * SiteSearch represents the model behind the search form about `backend\models\Site`.
 */
class SiteSearch extends Site
{
    public function rules()
    {
        return [
            [['site_id', 'site_name', 'region', 'city_town'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Site::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere(['like', 'site_id', $this->site_id])
            ->andFilterWhere(['like', 'site_name', $this->site_name])
            ->andFilterWhere(['like', 'region', $this->region])
            ->andFilterWhere(['like', 'city_town', $this->city_town]);

        return $dataProvider;
    }
}
