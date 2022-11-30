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
    public $user_id;
    public $airport_id;


    public function rules()
    {
        return [
            ['fName', 'trim'],
            ['fName', 'required'],
            ['fName', 'string', 'min' => 2, 'max' => 25],

            ['surname', 'trim'],
            ['surname', 'required'],
            ['surname', 'string', 'min' => 2, 'max' => 25],

            ['gender', 'required'],

            ['phone', 'trim'],
            ['phone', 'required'],
            ['phone', 'number'],
            ['phone', 'unique', 'targetClass' => '\common\models\UserData', 'message' => 'This phone has already been taken.'],
            ['phone', 'string', 'min' => 9, 'max' => 9],

            ['nif', 'trim'],
            ['nif', 'required'],
            ['nif', 'number'],
            ['nif', 'unique', 'targetClass' => '\common\models\UserData', 'message' => 'This nif has already been taken.'],
            ['nif', 'string', 'min' => 9, 'max' => 9],

            ['birthdate', 'trim'],
            ['birthdate', 'required'],
            ['birthdate', 'string', 'min' => 10, 'max' => 10],

            ['salary', 'trim'],
            ['salary', 'required'],
            ['salary', 'integer'],

            ['role', 'required'],
            ['role', 'string', 'min' => 2, 'max' => 255],

            ['airport_id', 'required'],

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

        $user->save();

        $this->user_id = $user->getId();
        // tabela USERDATA
        $userData->user_id = $user->getId();
        $userData->fName = $this->fName;
        $userData->surname = $this->surname;
        $userData->birthdate = date('Y/m/d', strtotime($this->birthdate));
        $userData->phone = $this->phone;
        $userData->nif = $this->nif;
        $userData->gender = $this->gender;
        $userData->accCreationDate = date('Y/m/d H:i:s');

        $userData->save();


        // tabela EMPLOYEE
        $employee->user_id = $user->getId();
        $employee->salary = $this->salary;
        $employee->airport_id = $this->airport_id;


        // RBAC
        $auth = \Yii::$app->authManager;
        $role = $auth->getRole($this->role);
        $auth->assign($role, $user->getId());


        return $employee->save();
    }
}
