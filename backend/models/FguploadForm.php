<?php
/**
 * Created by PhpStorm.
 * User: tony
 * Date: 1/9/15
 * Time: 9:46 AM
 */

namespace backend\models;
use yii\base\Model;
use yii\web\UploadedFile;


class FguploadForm extends Model {

    public $file;

    public function rules()
    {
        return [
            [['file'], 'file','skipOnEmpty' => false,/*'extensions' => 'csv','mimeTypes' => 'text/csv'*/],
            [['file'],'validateContent']
        ];
    }

    public function attributeLabels()
    {
        return [
            'file' => 'Select FGU file to upload',
        ];
    }
    public function validateContent()
    {
        $file = $this->file->tempName;
        if (($handle = fopen($file, "r")) !== FALSE) {
            $header = fgetcsv($handle, 1000, ",");
            $content = fgetcsv($handle, 1000, ",");

            if(empty($content) || empty($header))
            {
                $this->addError('Empty file not allowed');
            }
        }
    }
    public function upload()
    {
        $file = $this->file->tempName;

        $output = array();
        if (($handle = fopen($file, "r")) !== FALSE) {

            //Skip header rows
            $header = fgetcsv($handle, 1000, ",");
            //print_r($header);die();
            //Loop, validate and load file data
            $model = new GensetReading();
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {

                $model->access_code = $data[array_search('access_code',$header)];
                $model->site_id = $data[array_search('site_id', $header)];
                $model->genset_id = SiteGenset::findOne(['site_id'=> $data[array_search('site_id', $header)]])->genset_id;
                $model->genset_run_hours = $data[array_search('run_hours',$header)];
                $model->fuel_level_cm = $data[array_search('fuel_level_cm',$header)];
                $model->meter_reading = $data[array_search('kwh_reading',$header)];
                $model->reading_date = $data[array_search('reading_date',$header)];

                if($model->save())
                {
                    $error = [];
                }
                else
                {
                    $error = $model->getErrors();
                }

                // prepare output result

                $output[] = [
                    'site_id' => $model->site_id,
                    'access_code' => $model->access_code,
                    'reading_date' => $model->reading_date,
                    'run_hours' => $model->genset_run_hours,
                    'kwh_reading' => $model->meter_reading,
                    'fuel_level_cm' => $model->fuel_level_cm,
                    'error' => $error

                ];

            }
            fclose($handle);
        }
        else
        {
            echo 'error reading uploaded file';
        }

        return $output;
    }

}