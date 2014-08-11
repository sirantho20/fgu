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
    
    public function actionFgu()
    {
        $req = new \yii\db\Query();
        $req->from('fgu_step_3');
               // ->where(['`week`' => 'week(now(),1) - 1']);
        return $req->all();
    }
    
    public function actionWeeklyfuelstock()
    {
//        $q = new \yii\db\Query();
//        $q->from('fgu_weekly_stock')
//                ->select('concat(`year`," ",fgu_weekly_stock.week) as week, fuel_on_site, fuel_consumed, fuel_theft');
//        
//        return $q->all();
        
        $cmd = \Yii::$app->db->createCommand('SELECT concat(`year`," wk",fgu_step_3.week) `week`,
       SUM(IFNULL(fgu_step_3.fuel_consumed,0)) AS fuel_consumed,
       SUM(IFNULL(fgu_step_3.fuel_quantity_lts,0)) AS fuel_on_site,
       SUM(IFNULL(fgu_step_3.fuel_theft,0)) AS fuel_theft
  FROM fgu1.fgu_step_3 fgu_step_3
GROUP BY fgu_step_3.`year`, fgu_step_3.`week`
ORDER BY `week` ASC');
        return $cmd->queryAll();
    }
    
    public function actionWeeklyfueldelivery()
    {
        $cmd = \Yii::$app->db->createCommand('SELECT concat(`year`," wk",fgu_step_3.`week`) week, SUM(IFNULL(fgu_step_3.fuel_delivered,0)) fuel_delivered
  FROM fgu1.fgu_step_3 fgu_step_3
GROUP BY fgu_step_3.week
ORDER BY `week` ASC');
        
        return $cmd->queryAll();
    }

}
