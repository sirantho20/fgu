<?php

namespace backend\controllers;

class DashboardController extends \yii\web\Controller
{
    public $layout = 'adminMain';
    
    public function actionIndex()
    {
        return $this->render('index');
    }

}
