<?php

namespace backend\controllers;

use Yii;
use backend\models\PrepaidReload;
use app\models\PrepaidReloadSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PrepaidReloadController implements the CRUD actions for PrepaidReload model.
 */
class PrepaidReloadController extends Controller
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
        ];
    }

    /**
     * Lists all PrepaidReload models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PrepaidReloadSearch;
        $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }

    /**
     * Displays a single PrepaidReload model.
     * @param string $site_id
     * @param string $meter_id
     * @param string $reload_date
     * @return mixed
     */
    public function actionView($site_id, $meter_id, $reload_date)
    {
        return $this->render('view', [
            'model' => $this->findModel($site_id, $meter_id, $reload_date),
        ]);
    }

    /**
     * Creates a new PrepaidReload model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PrepaidReload;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'site_id' => $model->site_id, 'meter_id' => $model->meter_id, 'reload_date' => $model->reload_date]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing PrepaidReload model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $site_id
     * @param string $meter_id
     * @param string $reload_date
     * @return mixed
     */
    public function actionUpdate($site_id, $meter_id, $reload_date)
    {
        $model = $this->findModel($site_id, $meter_id, $reload_date);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'site_id' => $model->site_id, 'meter_id' => $model->meter_id, 'reload_date' => $model->reload_date]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing PrepaidReload model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $site_id
     * @param string $meter_id
     * @param string $reload_date
     * @return mixed
     */
    public function actionDelete($site_id, $meter_id, $reload_date)
    {
        $this->findModel($site_id, $meter_id, $reload_date)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the PrepaidReload model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $site_id
     * @param string $meter_id
     * @param string $reload_date
     * @return PrepaidReload the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($site_id, $meter_id, $reload_date)
    {
        if (($model = PrepaidReload::findOne(['site_id' => $site_id, 'meter_id' => $meter_id, 'reload_date' => $reload_date])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
