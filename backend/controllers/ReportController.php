<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ReportController
 *
 * @author aafetsrom
 */
namespace backend\controllers;
use yii\web\Controller;

class ReportController extends Controller {
    //put your code here
    public $layout = '/adminMain';
    
    public function actionIndex()
    {
        $query = \Yii::$app->db->createCommand('select site_id,fuel_consumed,last_fuel_level,fuel_quantity_lts,power_consumed from fgu_step_3')->queryAll();
        $dataprovider = new \yii\data\ArrayDataProvider([
            'allModels' => $query,
            'pagination' => [
                    'pageSize' => 2,
                    ],
        ]);
        
            header("Content-type: text/x-csv");
            header("Content-type: text/csv");
            header("Content-type: application/csv");
            header( 'Content-Disposition: attachment;filename='.'test.csv');
            $fp = fopen('php://output', 'w');
            
            
            fputcsv($fp, array_keys($query[0]));
            foreach ($query as $row)
            {
                fputcsv($fp, array_values($row));
            }
            fclose($fp);
    }
}
