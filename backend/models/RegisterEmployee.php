<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use common\models\User;
use common\models\UserData;
use backend\models\Employee;

/**
 * Signup form
 */
class RegisterEmployee extends Model
{
    public $username;
    public $email;
    public $password;
    public $role;

    public $fName;
    public $surname;
    public $gender;
    public $phone;
    public $nif;
    public $birthdate;

    public $salary;
    public $airportID;


    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => Yii::$app->params['user.passwordMinLength']],
        ];
    }

    public function register()
    {
        if (!$this->validate()) {
            return null;
        }

        $user = new User();
        $userData = new UserData();
        $employee = new Employee();

        // tabela USER
        $user->username = $this->username;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->generateEmailVerificationToken();
        $user->status = 10;

        // tabela USERDATA
        $userData->user_id = $user->getId();
        $userData->fName = $this->fName;
        $userData->surname = $this->surname;
        $userData->gender = $this->gender;
        $userData->phone = $this->phone;
        $userData->nif = $this->nif;
        $userData->birthdate = $this->birthdate;

        // tabela EMPLOYEE
        $employee->user_id = $user->getId();
        $employee->salary = $this->salary;

        // RBAC
        $auth = \Yii::$app->authManager;
        $role = $auth->getRole($this->role);
        $auth->assign($role, $user->getId());


        return ($employee->save() && $user->save() && $userData->save());
    }
}
