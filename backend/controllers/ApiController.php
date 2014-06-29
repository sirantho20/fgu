<?php

namespace backend\controllers;

class ApiController extends \yii\rest\Controller
{
    public function actionFuelonsite()
    {
        $rec = new \yii\db\Query();
            $rec->from('fuel_on_site');
        
        $result = $rec->all();
        return $result;
    }
    public function actionGensetbysupplier()
    {
        $rec = new \yii\db\Query();
        $rec->from(['gensets'])
                ->select(['COUNT(DISTINCT gensets.genset_id) as gensets','supplier'])
                ->groupBy(['supplier'])
                ->orderBy('gensets DESC');
        $result = $rec->all();
        return $result;
    }

}
