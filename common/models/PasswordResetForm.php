<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PasswordResetForm
 *
 * @author tony
 */
namespace common\models;

use Yii;
use yii\base\Model;

class PasswordResetForm extends Model {
    
    public $password;
    public $confirm;
    
    
    public function rules() {
        
       return [
           [['password', 'confirm'], 'required'],
           [['password'], 'string', 'min' => 6],
           ['confirm', 'compare', 'compareAttribute' => 'password'],
           
       ];
    }
    
    public function attributeLabels() {
        return [
          'password' => 'New Password',
          'confirm' => 'Repeat Password'
        ];
    }

        public function changePassword()
    {
        if($this->validate())
        {
            $model = User::findOne(['username'=>  Yii::$app->user->identity->username]);
            $model->setPassword($this->password);
            //die(Yii::$app->getSecurity()->generatePasswordHash($this->password));
            $model->update(false);
        }
    }
}
