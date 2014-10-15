<?php

namespace backend\models;

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
            [['site_id', 'site_name', 'region', 'city_town','siteDetails.x3_site_id'], 'safe'],
        ];
    }
    
    public function attributes()
    {
        //parent::attributes();
        
        return array_merge(parent::attributes(), ['siteDetails.x3_site_id']);
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
        
        $query->joinWith(['siteDetails' => function($query){ $query->from(['siteDetails'=>'site_details']); }]);
        
        $dataProvider->sort->attributes['siteDetails.x3_site_id'] = [
            'asc' => ['siteDetails.x3_site_id' => SORT_ASC],
            'desc' => ['siteDetails.x3_site_id' => SORT_DESC],
        ];
        
        if (!($this->load($params) && $this->validate()))
        {
            return $dataProvider;
        }

        $query->andFilterWhere(['like', 'site.site_id', $this->site_id])
            ->andFilterWhere(['like', 'site_name', $this->site_name])
            ->andFilterWhere(['like', 'region', $this->region])
            ->andFilterWhere(['like', 'siteDetails.x3_site_id', $this->getAttribute('siteDetails.x3_site_id')])
            ->andFilterWhere(['like', 'city_town', $this->city_town]);

        return $dataProvider;
    }
}
