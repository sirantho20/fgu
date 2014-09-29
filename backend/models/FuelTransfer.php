<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Fueltransfer
 *
 * @author tony
 */
namespace backend\models;
use yii\base\Model;

class FuelFransfer extends Model {
    public $from;
    public $to;
    public $fuel_quantity;
    public $from_date;
    public $to_date;
    public $from_accesscode;
    public $to_accesscode;
    
    public function rules() {
        
        return [
            [['from','to','fuel_quantity','from_date','to_date','from_accesscode','to_accesscode'],'required'],
            
        ];
    }
    
    public function attributeLabels()
    {
        return [
          'from' => 'Site ID where fuel is taken from (Source)',
          'to' =>'Site ID where fuel is taken to (Destination)',
          'fuel_quantity' => 'Quantity of fuel taken (litres)',
          'from_date' =>'Date when fuel was taken',
            'to_date' =>'Date when fuel delivered to Destination',
            'from_accesscode' =>'Accesscode when fuel was taken from source',
            'to_accesscode' => 'Accesscode when fuel was delivered to destination'
        
        ];
    }

    public function doTransfer()
    {
        $fuel = new Fuelling();
    }
}
