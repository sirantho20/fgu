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
    public function actionTest()
    {
//        $auth = \Yii::$app->ldap->authenticate('aafetsrom', '!!AFtony19833');
//        var_dump($auth);

        print_r(\Yii::$app->ldap->user()->info('gvaneijk')[0]);
    }

}
