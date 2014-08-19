<?php

namespace backend\controllers;
use yii\web\Controller;
use common\models\UserSearch;

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
            $search = new \app\models\SiteSearch();
            $dataProvider = $search->search(\Yii::$app->request->getQueryParams());
        
            \Yii::$app->session->setFlash('success', 'User successfully created');
            $this->redirect(['super/index']);
        }
        
        return $this->render('create',
                [
                    'model' => $model,
                ]);
    }
    
}
