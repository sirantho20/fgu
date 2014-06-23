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

}
