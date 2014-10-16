<?php

namespace backend\controllers;
use yii\web\Controller;
use common\models\UserSearch;
use backend\models\SiteSearch;

class SuperController extends Controller {
    
    public $layout = 'adminMain';
    
    public function actionIndex()
    {
            $searchModel = new UserSearch();
            $dataProvider = $searchModel->search(\Yii::$app->request->getQueryParams());
            
            return $this->render('index',[
                'dataProvider' => $dataProvider,
                'searchModel' => $searchModel,
                
            ]);
    }
    
    public function actionAddUser()
    {
        $model = new \frontend\models\SignupForm();
        
        if($model->load(\Yii::$app->request->post()) && $model->signup())
        {
            $search = new SiteSearch();
            $dataProvider = $search->search(\Yii::$app->request->getQueryParams());
        
            \Yii::$app->session->setFlash('success', 'User successfully created');
            $this->redirect(['super/index']);
        }
        
        return $this->render('create',
                [
                    'model' => $model,
                ]);
    }
    
    public function actionResetpassword($username)
    {
        $user = \common\models\User::findOne(['username'=>$username]);
        $user->setPassword(\Yii::$app->params['defaultPassword']);
        if($user->save(false))
        {
            if(\Yii::$app->mailer->compose('accountDetails',['user'=>$user,'password'=>(new \yii\base\Security())->generateRandomString(8)])
                    ->setTo($user->email)
                    ->setFrom(\Yii::$app->params['fromEmail'])
                    ->setSubject('Password Reset')
                    ->send())
            {
                die('sent');
            }
            else 
            {
                die('not sent');
            }
        }
        else
        {
            die('param not set');
        }
    }
    
}
