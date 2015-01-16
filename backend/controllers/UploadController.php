<?php

namespace backend\controllers;

use backend\models\FguploadForm;
use \Yii;
use yii\web\UploadedFile;

class UploadController extends \yii\web\Controller
{
    public $layout = '//adminMain';

    public function actionIndex()
    {
            $model = new FguploadForm();

            if (Yii::$app->request->isPost) {
                $model->file = UploadedFile::getInstance($model, 'file');

                if ($model->file && $model->validate()) {
                    //$model->file->saveAs('uploads/' . $model->file->baseName . '.' . $model->file->extension);
                    $result = $model->upload();
                    return $this->render('output', ['output' => $result]);
                }
            }

            return $this->render('index', ['model' => $model]);

    }

}
