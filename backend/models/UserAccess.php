<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserAccess
 *
 * @author tony
 */
namespace backend\models;

class UserAccess {
    public $role;
    public $company;
    public $access_rights;


    public function __construct() {
        $this->role = \Yii::$app->user->identity->role;
        $this->company = \Yii::$app->user->identity->company;
        
        $this->access_rights = [
            'mc'=>[6,7,8,9,10],
            'htg' => [1,2,3,4,5],
            'super' => [0],
        ];
    }
    public function accessCheck($right)
    {
        $return  = false;
        
        if($this->role == 0)
        {
            return true;
        }
        else
        {
            $right = $this->access_rights[$right];
            if(in_array($this->role, $right))
            {
                $return = true;
            }
            else 
            {
                $return = false;
            }
        }
        
        return $return;
    }
}
