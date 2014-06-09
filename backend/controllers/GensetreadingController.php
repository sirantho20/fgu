<?php

namespace backend\controllers;

use Yii;
use backend\models\GensetReading;
use app\models\GensetReadingSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;
/**
 * GensetreadingController implements the CRUD actions for GensetReading model.
 */
class GensetreadingController extends Controller
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
     * Lists all GensetReading models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new GensetReadingSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());
        
        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }
    
    public function actionHistoric()
    {
        $searchModel = new GensetReadingSearch();
        $dataProvider = new \yii\data\ActiveDataProvider([
            'query' => GensetReading::find(),
        ]);
        
        
        return $this->render('historic', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }

    /**
     * Displays a single GensetReading model.
     * @param string $reading_date
     * @param string $access_code
     * @return mixed
     */
    public function actionView($reading_date, $access_code)
    {
        return $this->render('view', [
            'model' => $this->findModel($reading_date, $access_code),
        ]);
    }

    /**
     * Creates a new GensetReading model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new GensetReading;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'reading_date' => $model->reading_date, 'access_code' => $model->access_code]);
        } else {
            
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing GensetReading model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $reading_date
     * @param string $access_code
     * @return mixed
     */
    public function actionUpdate($reading_date, $access_code)
    {
        $model = $this->findModel($reading_date, $access_code);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'reading_date' => $model->reading_date, 'access_code' => $model->access_code]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing GensetReading model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $reading_date
     * @param string $access_code
     * @return mixed
     */
    public function actionDelete($reading_date, $access_code)
    {
        $this->findModel($reading_date, $access_code)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the GensetReading model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $reading_date
     * @param string $access_code
     * @return GensetReading the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($reading_date, $access_code)
    {
        if (($model = GensetReading::findOne(['reading_date' => $reading_date, 'access_code' => $access_code])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    public function actionSitegensets()
    {
         $out = [];
        if (isset($_POST['depdrop_parents'])) {
        $parents = $_POST['depdrop_parents'];
        if ($parents != null) {
        $cat_id = $parents[0];
        $query = new yii\db\Query();
        $query->from('site_genset')->where(['site_id'=>$cat_id])->select('genset_id')->asArray();
        print_r($query);
        
        $out = \backend\models\SiteGenset::findAll($query); //self::getSubCatList($cat_id);
        // the getSubCatList function will query the database based on the
        // cat_id and return an array like below:
        // [
        // ['id'=>'<sub-cat-id-1>', 'name'=>'<sub-cat-name1>'],
        // ['id'=>'<sub-cat_id_2>', 'name'=>'<sub-cat-name2>']
        // ]
        echo Json::encode(['output'=>$out, 'selected'=>'']);
        return;
        }
        }
        echo Json::encode(['output'=>'', 'selected'=>'']);
    }
    public function actionTest()
    {
        $url = 'http://fgu/index.php?r=gensetreading/sitegensets';
        $data = array('depdrop_parents' =>array());

        // use key 'http' even if you send the request to https://...
        $options = array(
            'http' => array(
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'POST',
                'content' => http_build_query($data),
            ),
        );
        $context  = stream_context_create($options);
        $result = file_get_contents($url, false, $context);

        var_dump($result);die();
    }
}
