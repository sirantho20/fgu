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
use backend\models\Genset;
use backend\models\Sitedetails;
use backend\models\MeterSite;
use backend\models\UtilityMeter;

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
    
    public function actionMctankprops($genset)
    {
        $output = array();
        
        $det = SiteGenset::findOne(['genset_id'=>  urldecode($genset)]);
        
        if($det->genset->has_base_tank == 'yes')
        {
            $output['tank'] = 'Base Tank';
            $gen = $det->genset;
            $output['width'] = $gen->fuel_tank_width;
            $output['height'] = $gen->fuel_tank_height;
            $output['bredth'] = $gen->fuel_tank_breadth;
            $output['url'] = '/siteactions/mcupdategenset?genset='.urlencode($det->genset->genset_id);
        }
        else 
        {
            $output['tank'] = 'External Tank';        
            $tank = Sitedetails::findOne(['site_id'=>$det->site_id]);
            $output['width'] = $tank->tank_width;
            $output['height'] = $tank->tank_height;
            $output['bredth'] = $tank->tank_bredth;
            $output['url'] = '/siteactions/mcsidedetailtankupdate?site='.urlencode($det->site->site_id);
            
        }
        
        echo \yii\helpers\Json::encode($output);
        
    }
    
    public function actionMcupdategenset($genset)
    {
        $this->layout = '/adminMain';
        $old = array();
        
        $model = Genset::findOne(['genset_id' => $genset]);
        $old['site_id'] = $model->siteGenset->site->site_id;
        $old['site_name'] = $model->siteGenset->site->site_name;
        $old['has_base_tank'] = $model->has_base_tank;
        $old['fuel_tank_width'] = $model->fuel_tank_width;
        $old['fuel_tank_breadth'] = $model->fuel_tank_breadth;
        $old['fuel_tank_height'] = $model->fuel_tank_height;
                
       // $old = Genset::find()->where(['genset_id' => $genset]);

        if ($model->load(Yii::$app->request->post())) {
            
            if($model->save(FALSE))
            {
                $new = array();
                $new['site_id'] = $model->siteGenset->site->site_id;
                $new['site_name'] = $model->siteGenset->site->site_name;
                $new['has_base_tank'] = $model->has_base_tank;
                $new['fuel_tank_width'] = $model->fuel_tank_width;
                $new['fuel_tank_breadth'] = $model->fuel_tank_breadth;
                $new['fuel_tank_height'] = $model->fuel_tank_height;
                
                //$new = Genset::find()->where(['genset_id' => $genset]);
            }
            
            $msg = \Yii::$app->mailer->compose('tankChanges',['old' => $old, 'new' => $new, 'model' => $model])
                    ->setTo(\Yii::$app->params['dataChangeMailingList'])
                    ->setFrom('fgu.htg@gmail.com')
                    ->setSubject('Fuel tank dimension change - '.$model->siteGenset->site->site_name.' - '.$model->siteGenset->site->site_id)
                    ->send();
            
            return $this->redirect(['fuelling/create']);
        } else {
            return $this->render('/genset/update_ro', [
                'model' => $model,
            ]);
        }
    }
    
    public function actionMcsidedetailtankupdate($site)
    {
        $this->layout = '/adminMain';
        $model = \backend\models\Sitedetails::findOne(['site_id'=>$site]);
        $old = array();
        $old['site_id'] = $model->site->site_id;
        $old['site_name'] = $model->site->site_name;
        $old['has_base_tank'] = $model->site->siteGenset->genset->has_base_tank;
        $old['fuel_tank_width'] = $model->tank_width;
        $old['fuel_tank_breadth'] = $model->tank_bredth;
        $old['fuel_tank_height'] = $model->tank_height;
        
        if ($model->load(Yii::$app->request->post())) {
            
            $new = array();
            
            
            if($model->save(false))
            {
                $new['site_id'] = $model->site->site_id;
                $new['site_name'] = $model->site->site_name;
                $new['has_base_tank'] = $model->site->siteGenset->genset->has_base_tank;
                $new['fuel_tank_width'] = $model->tank_width;
                $new['fuel_tank_breadth'] = $model->tank_bredth;
                $new['fuel_tank_height'] = $model->tank_height;
            }
            
            $msg = \Yii::$app->mailer->compose('tankChanges',['old' => $old, 'new' => $new, 'model' => $model, 'site_id'=>$model->site->site_id])
                ->setTo(\Yii::$app->params['dataChangeMailingList'])
                ->setFrom(\Yii::$app->params['fromEmail'])
                ->setSubject('Fuel tank dimension change - '.$old['site_name'].' - '.$old['site_id'])
                ->send();
            
            return $this->redirect(['fuelling/create']);
        }
        else 
        {
            return $this->render('/genset/tank_dimentions',[
               'model' => $model 
            ]);
        }
    }
    
    public function actionMeterprops($site)
    {
        $out = array();
        
        $det = \backend\models\MeterSite::findOne(['site_id' => $site]);
        
        $out['type'] = $det->meter->meter_type;
        
        $out['url'] = '/siteactions/mcmeterupdate?site='.$det->site->site_id;
        echo json_encode($out);
    }
    
    public function actionMcmeterupdate($site)
    {
        \yii\helpers\BaseUrl::remember(\Yii::$app->request->referrer,'prev');
        
        $this->layout = '/adminMain';
         
        $meter = MeterSite::findOne(['site_id' => $site]);
        
        $model = UtilityMeter::findOne(['meter_id' => $meter->meter_id]);
        
        $old = $model->meter_type;
        
        $site_name = $meter->site->site_name;
        $site_id = $meter->site->site_id;
        
        if($model->load(Yii::$app->request->post()) && $model->save())
        {
            $new = $model->meter_type;
            
            if($old != $new)
            {
                $msg = \Yii::$app->mailer->compose('meterUpdate',['old' => $old, 'new' => $new, 'site_name' => $site_name, 'site_id' => $site_id])
                        ->setTo(\Yii::$app->params['dataChangeMailingList'])
                        ->setFrom(\Yii::$app->params['fromEmail'])
                        ->setSubject('Meter type changed - '.$meter->site->site_name.' '.$meter->site->site_id)
                        ->send();
            }
            
            $this->redirect(\yii\helpers\Url::previous('prev'));
        }
        else 
        {
            return $this->render('/metersite/mcMeterchange',[
                'model' => $model
            ]);
        }
        

    }
    
    

}
