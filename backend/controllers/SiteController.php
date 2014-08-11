<?php
namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use common\models\LoginForm;
use yii\filters\VerbFilter;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        //'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    //'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionIndex()
    {
        $this->redirect(['dashboard/index']);
        //return $this->render('index');
    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            $this->redirect(['dashboard/index']);
            
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
    
    public function actionResetpassword()
    {
//        Yii::$app->mailer->compose('@app/mail/accountDetails')
//                ->setFrom('admin@mail.i-webb.net')
//                ->setTo('aafetsrom@htghana.com')
//                ->setSubject('hello Welcome')
//                ->send();
//    
        
        $this->layout = 'adminMain';
        $model = new \common\models\PasswordResetForm();
        
        if($model->load(Yii::$app->request->post()))
        {
            $model->changePassword();
            Yii::$app->session->setFlash('success', 'Password reset succcessful');
            //return $this->redirect(\yii\helpers\Url::toRoute('index'));
        }
        else {
            return $this->render('passwordReset',[
                'model' => $model
            ]);
        }
        
        return $this->render('passwordReset',[
                'model' => $model
            ]);
    }
}
