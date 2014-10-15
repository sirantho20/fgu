<?php

namespace backend\controllers;

use Yii;
use backend\models\Site;
use backend\models\SiteSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\UserAccess;
use backend\models\attachMeterForm;

/**
 * SitesController implements the CRUD actions for Site model.
 */
class SitesController extends Controller
{
    public $layout = '/adminMain';
    
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
            
            'access' => [
            'class' => \yii\filters\AccessControl::className(),
            'rules' => [
                [
                    'allow' => (new UserAccess())->accessCheck('htg')
                ]
            ]
            ]
        ];
    }

    /**
     * Lists all Site models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SiteSearch;
        $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }

    /**
     * Displays a single Site model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        $js='$("#attachGensetLink").click(function(){$("#modal").modal("show")});';
        $this->getView()->registerJs($js);
        
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Site model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Site;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->site_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Site model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->site_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }
    
    public function actionAttachgenset()
    {
        $model = new \backend\models\attachGensetForm();
        if($model->load(Yii::$app->request->post()) && $model->attachGenset())
        {
            Yii::$app->session->setFlash('success', 'Genset successfully attached.');
            return $this->redirect(['view', 'id'=>$model->site_id]);
        }
        return $this->render('_attachGenset',['model'=>$model]);
    }
    
    public function actionAttachmeter()
    {
        $model = new attachMeterForm();
        if($model->load(Yii::$app->request->post()) && $model->attachMeter())
        {
            Yii::$app->session->setFlash('success', 'Meter successfully attached.');
            return $this->redirect(['view', 'id'=>$model->site_id]);
        }
        return $this->render('_attachMeter',['model'=>$model]);
    }

    /**
     * Deletes an existing Site model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Site model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Site the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Site::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
