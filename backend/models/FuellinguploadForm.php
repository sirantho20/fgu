<?php
/**
 * Created by PhpStorm.
 * User: tony
 * Date: 1/9/15
 * Time: 9:46 AM
 */

namespace backend\models;
use yii\base\ErrorException;
use yii\base\Model;
use yii\db\Exception;
use yii\web\UploadedFile;


class FuellinguploadForm extends Model {

    public $file;

    public function rules()
    {
        return [
            [['file'], 'file','skipOnEmpty' => false/*,'extensions' => 'csv','mimeTypes' => 'text/csv'*/],
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

            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                try {
                    if (!Fuelling::find()->where([
                    'site_id' => $data[array_search('site_id', $header)],
                    //'genset_id' => $genset_id,
                        'access_code' => $data[array_search('access_code', $header)],
                        'delivery_date' => $data[array_search('delivery_date', $header)]
                    ])->exists()) {
                        //echo $data[array_search('site_id', $header)];
                        //die();
                        if(Site::find()->where(['site_id' => $data[array_search('site_id', $header)]])->exists()) {
                            if (SiteGenset::find()->where(['site_id' => $data[array_search('site_id', $header)]])->exists()) {
                                $genset_id = SiteGenset::findOne(['site_id' => $data[array_search('site_id', $header)]])->genset_id;
                                $model = new Fuelling();
                                $access_code = $data[array_search('access_code', $header)];
                                if(strlen($access_code) < 4)
                                {
                                    $access_code = '0'.$data[array_search('access_code', $header)];
                                }
                                $model->access_code = $access_code;
                                $model->site_id = $data[array_search('site_id', $header)];
                                $model->genset_id = $genset_id;
                                $model->quantity_before_delivery_cm = $data[array_search('quantity_before_in_cm', $header)];
                                $model->quantity_after_delivery_cm = $data[array_search('quantity_after_in_cm', $header)];
                                $model->fuel_supplier = $data[array_search('supplier', $header)];
                                $model->emergency_fuelling = $data[array_search('fuelling_type', $header)];
                                $model->htg_fs_present = $data[array_search('htg_fs', $header)];
                                $model->delivery_date = $data[array_search('delivery_date', $header)];

                                if ($model->save()) {
                                    $error = [];
                                } else {
                                    $error = $model->getErrors();
                                }

                                // prepare output result

                                $output[] = [
                                    'site_id' => $model->site_id,
                                    'access_code' => $model->access_code,
                                    'delivery_date' => $model->delivery_date,
                                    'quantity_before_in_cm' => $model->quantity_before_delivery_cm,
                                    'quantity_after_in_cm' => $model->quantity_after_delivery_cm,
                                    'fuelling_type' =>$model->emergency_fuelling,
                                    'error' => $error

                                ];
                            } else {
                                //echo 'no genset <br />';
                                $output[] = [
                                    'site_id' => $data[array_search('site_id', $header)],
                                    'access_code' => '',
                                    'delivery_date' => '',
                                    'quantity_before_in_cm' => '',
                                    'quantity_after_in_cm' => '',
                                    'fuelling_type' => '',
                                    'error' => array('site_id' =>array('no genset attached to site'))

                                ];

                            }
                        }
                        else {
                            //echo 'no site';
                            $output[] = [
                               // 'site_id' => $data[array_search('site_id', $header)],
                                //'access_code' => "",
                                //'delivery_date' => '',
                                //'quantity_before_in_cm' => '',
                               // 'quantity_after_in_cm' => '',
                                //'fuelling_type' => '',
                                //'error' => array('site_id' =>array('<span style="color:red">site not added in system</span>'))

                            ];
                        }
                    }
                    else
                    {
                        //die('duplicate');
                        $output[] = [
                            'site_id' => $data[array_search('site_id', $header)],
                            'access_code' => "",
                            'delivery_date' => '',
                            'quantity_before_in_cm' => '',
                            'quantity_after_in_cm' => '',
                            'fuelling_type' => '',
                            'error' => []
                        ];

                    }
                }
                catch( Exception $e){
                    //echo $e->getMessage();
                    //continue;
                }

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