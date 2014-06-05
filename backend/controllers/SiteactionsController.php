<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SiteactionsController
 *
 * @author aafetsrom
 */
namespace backend\controllers;
use yii\web\Controller;
use Yii;
use backend\models\SiteGenset;

class SiteactionsController extends Controller {
    
    public function actionDetachgensetfromsite($genset)
    {
        $model = SiteGenset::findOne(['genset_id'=>$genset]);
       
        $site = $model->site_id;
        if($model->delete())
        {
            Yii::$app->session->setFlash('success', 'Genset successfully detached');
            return $this->redirect(['sites/view', 'id' => $site]);
        }
        else 
        {
            Yii::$app->session->setFlash('error', 'Sorry, genset was not detached');
        }
    }
    
    public function actionDetachmeterfromsite($meter)
    {
        $model = \backend\models\MeterSite::findOne(['meter_id'=>$meter]);
       
        $site = $model->site_id;
        if($model->delete())
        {
            Yii::$app->session->setFlash('success', 'Meter successfully detached');
            return $this->redirect(['sites/view', 'id' => $site]);
        }
        else 
        {
            Yii::$app->session->setFlash('error', 'Sorry, meter was not detached');
        }
    }
}
