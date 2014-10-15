<?php

namespace backend\controllers;

use Yii;
use backend\models\Genset;
use backend\models\GensetSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\UserAccess;

/**
 * GensetController implements the CRUD actions for Genset model.
 */
class GensetController extends Controller
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
     * Lists all Genset models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new GensetSearch;
        $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }

    /**
     * Displays a single Genset model.
     * @param string $id
     * @return mixed
     */
    public function actionView($genset_id, $supplier, $kva)
    {
        return $this->render('view', [
            'model' => Genset::findOne(['genset_id' => $genset_id, 'kva'=>$kva, 'supplier'=>$supplier]),
        ]);
    }

    /**
     * Creates a new Genset model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Genset;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'genset_id' => $model->genset_id,'kva'=>$model->kva,'supplier'=>$model->supplier]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Genset model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($genset_id, $supplier, $kva)
    {
        $model = Genset::findOne(['genset_id' => $genset_id, 'kva'=>$kva, 'supplier'=>$supplier]);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'genset_id' => $model->genset_id,'kva'=>$model->kva,'supplier'=>$model->supplier]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Genset model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($genset_id, $supplier, $kva)
    {
        Genset::findOne(['genset_id' => $genset_id, 'kva'=>$kva, 'supplier'=>$supplier])->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Genset model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Genset the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Genset::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    

}
