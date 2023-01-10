<?php

namespace backend\modules\api\controllers;

use common\models\User;

class LoginController extends \yii\web\Controller
{
    public $user;

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => \yii\filters\auth\HttpBasicAuth::className(),
            //’except' => ['index', 'view'], //Excluir aos GETs
            'auth' => [$this, 'auth']
        ];
        return $behaviors;
    }

    public function actions()
    {
        $actions = parent::actions();

        // dar disable de todas as actions desnecessarias
        unset($actions['delete'], $actions['create'], $actions['view'], $actions['update'], $actions['options']);

        return $actions;
    }

    public function auth($username, $password)
    {
        $user = User::findByUsername($username);
        if ($user && $user->validatePassword($password)) {
            $this->user = $user;
            return $this->user;
        }
        throw new \yii\web\ForbiddenHttpException('No authentication'); //403
    }
    public function actionIndex()
    {
        $response['status'] = 200;
        $response['id'] = $this->user->id;
        $response['role'] = $this->user->authAssignment->item_name;
        $response['token'] = $this->user->auth_key;

        $json = json_encode($response);

        return $json;
    }
}
