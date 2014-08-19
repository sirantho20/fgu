<?php
namespace frontend\models;

use common\models\User;
use yii\base\Model;
use Yii;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $first_name;
    public $last_name;
    public $company;
    public $role;
    public $status;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'filter', 'filter' => 'trim'],
            ['username', 'required'],
            [['first_name', 'last_name', 'company','role'], 'safe'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if ($this->validate()) {
            $user = new User();
            $user->username = $this->username;
            $user->email = $this->email;
            $user->setPassword($this->password);
            $user->company = $this->company;
            $user->first_name = $this->first_name;
            $user->last_name = $this->last_name;
            $user->role = $this->role;
            $user->generateAuthKey();
            return $user->save(false);
        }

        return false;
    }
    
//    public function beforeValidate() {
//        $this->company = $_POST['SignupForm']['company'];
//        $this->first_name = $_POST['SignupForm']['first_name'];
//        $this->last_name = $_POST['SignupForm']['last_name'];
//        $this->username = $_POST['SignupForm']['username'];
//        $this->password = $_POST['SignupForm']['password'];
//        $this->role = $_POST['SignupForm']['role'];
//        $this->email = $_POST['SignupForm']['email'];
//        return parent::beforeValidate();
//    }
}
