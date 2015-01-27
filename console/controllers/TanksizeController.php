<?php
/**
 * Created by PhpStorm.
 * User: tony
 * Date: 1/23/15
 * Time: 9:23 AM
 */

namespace console\controllers;


use backend\models\Genset;
use backend\models\Sitedetails as SiteDetails;
use backend\models\SiteGenset;
use yii\console\Controller;

class TanksizeController extends Controller {

    public function actionUpload()
    {
        $file = $this->prompt('File Path: ', ['required' => true]);
        //echo 'about to read file'. $file.PHP_EOL;
        if (($handle = fopen($file, "r")) !== FALSE) {

            $header = fgetcsv($handle, 1000, ",");
            //echo count($header). 'columns read from file'.PHP_EOL;
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                //echo 'about loading variables '.$data['0'].PHP_EOL;
                $site_id = $data[array_search('site_id', $header)];
                $location = $data[array_search('location', $header)];
                $l = $data[array_search('l', $header)];
                $b = $data[array_search('b', $header)];
                $h = $data[array_search('h', $header)];
                //echo 'done loading variables... '.PHP_EOL;
                if(SiteDetails::find()->where(['site_id' => $site_id])->exists())
                {
                    //echo $site_id.' exists. about to process update'.PHP_EOL;
                    if($location =='EXTERNAL')
                    {
                        //echo 'found external tank'.PHP_EOL;
                        $details = SiteDetails::findOne(['site_id' => $site_id]);
                        $details->tank_bredth = $b;
                        $details->tank_height = $h;
                        $details->tank_width = $l;
                        $details->tigo_site_type = 'unknown';
                        $details->shareable = 'yes';

                        if($details->update() !== false)
                        {
                            echo $site_id.' updated with dimensions '.$l.' x '.$b.' x '.$h.' external'.PHP_EOL;
                        }
                        else
                        {
                            echo 'error with '.$site_id.print_r($details->getErrors());
                            break;
                        }
                    }
                    elseif($location == 'BASE' && SiteGenset::find(['site_id' => $site_id])->exists())
                    {
                        //echo 'in base'.PHP_EOL;
                        $genset_id = SiteGenset::findOne(['site_id' => $site_id])->genset_id;
                        $genset = Genset::findOne(['genset_id' => $genset_id]);
                        $genset->has_base_tank = 'yes';
                        $genset->fuel_tank_breadth = $b;
                        $genset->fuel_tank_height = $h;
                        $genset->fuel_tank_width = $l;
                        $genset->engine_used = 'yes';

                        if($genset->update() !== false)
                        {
                            echo $site_id.' updated with dimensions '.$l.' x '.$b.' x '.$h.' base'.PHP_EOL;
                        }
                        else
                        {
                            echo print_r($genset->getErrors());
                            break;
                        }
                    }
                    else
                    {
                        echo 'site '.$site_id.' does not seem to have a genset attached.'.PHP_EOL;
                    }
                }
                else
                {
                    echo 'Site '.$site_id.' does not exist in the system'.PHP_EOL;
                }
            }
        }
        else
        {
            echo 'error reading file'.PHP_EOL;
        }
    }

}