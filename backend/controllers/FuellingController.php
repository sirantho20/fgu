<?php

namespace backend\controllers;

use Yii;
use backend\models\Fuelling;
use app\models\FuellingSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * FuellingController implements the CRUD actions for Fuelling model.
 */
class FuellingController extends Controller
{
    public $layout = '//adminMain';
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
     * Lists all Fuelling models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new FuellingSearch;
        $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }

    /**
     * Displays a single Fuelling model.
     * @param string $delivery_date
     * @param string $access_code
     * @return mixed
     */
    public function actionView($delivery_date, $access_code)
    {
        return $this->render('view', [
            'model' => $this->findModel($delivery_date, $access_code),
        ]);
    }

    /**
     * Creates a new Fuelling model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Fuelling;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'delivery_date' => $model->delivery_date, 'access_code' => $model->access_code]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }
    
    public function actionHistoric()
    {
        $dataProvider = new \yii\data\ActiveDataProvider([
            'query'=>  Fuelling::find()->where(['mc'=>  \Yii::$app->user->identity->company]),
                ]);
        
        return $this->render('historic',['dataProvider'=>$dataProvider]);
    }

    /**
     * Updates an existing Fuelling model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $delivery_date
     * @param string $access_code
     * @return mixed
     */
    public function actionUpdate($delivery_date, $access_code)
    {
        $model = $this->findModel($delivery_date, $access_code);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'delivery_date' => $model->delivery_date, 'access_code' => $model->access_code]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Fuelling model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $delivery_date
     * @param string $access_code
     * @return mixed
     */
    public function actionDelete($delivery_date, $access_code)
    {
        $this->findModel($delivery_date, $access_code)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Fuelling model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $delivery_date
     * @param string $access_code
     * @return Fuelling the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($delivery_date, $access_code)
    {
        if (($model = Fuelling::findOne(['delivery_date' => $delivery_date, 'access_code' => $access_code])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
