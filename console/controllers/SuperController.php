<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SuperController
 *
 * @author aafetsrom
 */
namespace console\controllers;
use yii\console\Controller;

class SuperController extends Controller {
    //put your code here
    
    public function actionIndex()
    {
        $this->prompt('what is your name?');
    }
    
    public function actionAddUser()
    {
        $model = new \frontend\models\SignupForm();
        $model->username = $this->prompt('Username', ['required'=>true]);
        $model->password = $this->prompt('Password', ['required'=>true]);
        $model->first_name = $this->prompt('First Name', ['required'=>true]);
        $model->last_name = $this->prompt('Last Name', ['required'=>true]);
        $model->email = $this->prompt('Email Address', ['required'=>true]);
        $model->company = $this->prompt('Company', ['required'=>true]);
        $model->role = $this->prompt('Role', ['required'=>true]);
        
        if($model->signup())
        {
            echo 'User successfully created!'."\n";
            return 0;
        }
        else 
        {
            echo 'Sorry, something went wrong. Please try again!'."\n";
            return 1;
        }
        
    }
    
    public function actionChangepassword($username)
    {
        $user = \common\models\User::findOne(['username'=>$username]);
        if($user)
        {
            $pword = $this->prompt('New Password ('.$user->username.')', ['required'=>true]);
            $pword1 = $this->prompt('Repeat Password', ['required'=>true]);
            if($pword == $pword1)
            {
                $user->setPassword($pword);
                
                if($this->confirm('Are you sure you wnt to change password for '.$username.'?'))
                {
                    $user->update(false);
                    echo 'Password successfully changed!';
                    return 0;
                }
                else 
                {
                    echo 'Password was not changed';
                    return 1;
                }
            }
            else 
            {
                echo 'Sorry, password doesn\'t match';
                return 1;
            }
        }
        else 
        {
            echo 'User '.$username.' doesn\'t exist';
            return 1;
        }
    }
}
