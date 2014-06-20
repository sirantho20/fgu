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
    
    public function actionGensetlist()
    {
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
        $parents = $_POST['depdrop_parents'];
        if ($parents != null) {
            $site = $parents[0];
            $re = SiteGenset::find()->where(['site_id'=>$site])->select(['genset_id'])->all();
            foreach ($re as $record)
            {
                $out[] = ['id'=>$record['genset_id'],'name'=>$record['genset_id']];
            }
            
            echo \yii\helpers\Json::encode(['output'=>$out, 'selected'=>$re[0]['genset_id']]);
            return;
        }
        
        }
        //$handle .= \yii\helpers\Json::encode(['output'=>$out, 'selected'=>'']);
        
            
    }
        public function actionPrepaidGensetlist()
    {
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
        $parents = $_POST['depdrop_parents'];
        if ($parents != null) {
            $site = $parents[0];
            $re = SiteGenset::find()->where(['site_id'=>$site])->select(['genset_id'])->all();
            foreach ($re as $record)
            {
                $out[] = ['id'=>$record['genset_id'],'name'=>$record['genset_id']];
            }
            
            echo \yii\helpers\Json::encode(['output'=>$out, 'selected'=>$re[0]['genset_id']]);
            return;
        }
        
        }
        //$handle .= \yii\helpers\Json::encode(['output'=>$out, 'selected'=>'']);
        
            
    }
    public function actionMeterlist()
    {
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
        $parents = $_POST['depdrop_parents'];
        if ($parents != null) {
            $site = $parents[0];
            $re = \backend\models\MeterSite::find()->where(['site_id'=>$site])->select(['meter_id'])->all();
            foreach ($re as $record)
            {
                $out[] = ['id'=>$record['meter_id'],'name'=>$record['meter_id']];
            }
            
            echo \yii\helpers\Json::encode(['output'=>$out, 'selected'=>$re[0]['meter_id']]);
            return;
        }
        
        }
        //$handle .= \yii\helpers\Json::encode(['output'=>$out, 'selected'=>'']);
        
            
    }
    public function actionIndex()
    {
        //echo \yii\helpers\Url::to(['gensetlist','site'=>1003]);
        
    }
    
    public static function fuelOnSite($site)
    {
        $qr = new \yii\db\Query();
        $qr->from(['genset_reading'])
                ->where(['site_id'=>$site])
                ->orderBy(['reading_date DESC'])
                ->limit(1);
        
        $arr = $qr->all();
    }
}
