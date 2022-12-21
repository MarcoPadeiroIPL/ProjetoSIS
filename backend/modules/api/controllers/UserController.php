<?php

namespace backend\modules\api\controllers;

use yii\rest\ActiveController;
use common\models\User;

class UserController extends ActiveController
{
    public $modelClass = 'common\models\User';


    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => \yii\filters\auth\QueryParamAuth::class,
        ];
        return $behaviors;
    }

    // custom action para facilitar obter os proprios dados
    public function actionMe(){
        return User::findOne([\Yii::$app->user->getId()]);
    }

    public function actions()
    {
        $actions = parent::actions();

        unset($actions['create']);

        return $actions;
    }


    public function checkAccess($action, $model = null, $params = [])
    {
        if ('admin' !== \Yii::$app->user->identity->authAssignment->item_name) {
            if ($action === 'index') {
                throw new \yii\web\ForbiddenHttpException(sprintf('You cannot list other accounts'));
            }
            if ($model->id !== \Yii::$app->user->id)
                throw new \yii\web\ForbiddenHttpException(sprintf('You cannot manage other accounts'));
        }
    }
}
