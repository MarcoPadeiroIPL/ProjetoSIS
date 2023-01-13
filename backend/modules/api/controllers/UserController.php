<?php

namespace backend\modules\api\controllers;

use yii\rest\ActiveController;
use common\models\User;
use backend\modules\api\components\CustomAuth;

class UserController extends ActiveController
{
    public $modelClass = 'common\models\User';


    public function behaviors()
    {
        \Yii::$app->params['id'] = 0;
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => CustomAuth::class,
            'auth' => [$this, 'authCustom'],
        ];
        return $behaviors;
    }

    public function actions()
    {
        $actions = parent::actions();

        // dar disable de todas as actions desnecessarias
        unset($actions['create'], $actions['view'], $actions['delete']);

        // customize the data provider preparation with the "prepareDataProvider()" method
        $actions['index']['prepareDataProvider'] = [$this, 'userInfo'];

        return $actions;
    }

    public function userInfo()
    {
        return $this->modelClass::findOne([\Yii::$app->params['id']]);
    }

    public function checkAccess($action, $model = null, $params = [])
    {
        if ($action == 'update' && $model->client_id !== \Yii::$app->params['id'])
            throw new \yii\web\ForbiddenHttpException(sprintf('You only can manage your balance requests!'));
    }
}
