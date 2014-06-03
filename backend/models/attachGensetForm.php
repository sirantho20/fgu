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

class attachGensetForm extends Model {
    public $site_id;
    public $genset_id;
    
    public function rules() {
        
       return [
           [['site_id','genset_id'],'required'],
       ];
    }
    
    public function attachGenset()
    {
        if($this->validate())
        {
            $attach = new SiteGenset();
            $attach->genset_id = $this->genset_id;
            $attach->site_id = $this->site_id;
            return $attach->save();
        }
    }
    
    
    
}
