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
        $model = new \backend\models\Report();
        
        if($model->load(\Yii::$app->request->post()) && $model->validate())
        {
            
            $query = $model->getQuery();
            if(count($query) > 0)
            {
                    header("Content-type: text/x-csv");
                    header("Content-type: text/csv");
                    header("Content-type: application/csv");
                    header( 'Content-Disposition: attachment;filename='.\Yii::$app->user->identity->company.$_POST['Report']['type'].$_POST['Report']['reportDates'].'_'.(new \DateTime("now"))->format('Y-m-d H:i:s').'.csv');
                    $fp = fopen('php://output', 'w');


                    fputcsv($fp, array_keys($query[0]));
                    foreach ($query as $row)
                    {
                        fputcsv($fp, array_values($row));
                    }
                    fclose($fp);
                    \Yii::$app->end();
            }
            else 
            {
                \Yii::$app->session->setFlash('info','No records found');
                return $this->render('index',[
                    'model' => $model,
                ]);
            }
            
            
        }

        return $this->render('index',[
            'model' => $model,
        ]);
    }

}


