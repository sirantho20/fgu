<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of attachGensetForm
 *
 * @author aafetsrom
 */
namespace backend\models;
use yii\base\Model;

class attachMeterForm extends Model {
    public $site_id;
    public $meter_id;
    
    public function rules() {
        
       return [
           [['site_id','meter_id'],'required'],
       ];
    }
    
    public function attachMeter()
    {
        if($this->validate())
        {
            $attach = new MeterSite();
            $attach->meter_id = $this->meter_id;
            $attach->site_id = $this->site_id;
            return $attach->save();
        }
    }
    
    
    
}
