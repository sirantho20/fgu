<?php

namespace backend\controllers;

class DashboardController extends \yii\web\Controller
{
    public $layout = 'adminDashboard';
    
    public function actionIndex()
    {
        return $this->render('index');
    }

}
