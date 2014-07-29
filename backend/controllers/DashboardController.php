<?php

namespace backend\controllers;

class DashboardController extends \yii\web\Controller
{
    public $layout = 'adminDashboard';
    
    public function actionIndex()
    {
        if(\Yii::$app->user->identity->role >= 6)
        {
            $view = 'mc';
        }
        else
        {
            $view = 'index';
        }
        return $this->render($view);
    }

}
