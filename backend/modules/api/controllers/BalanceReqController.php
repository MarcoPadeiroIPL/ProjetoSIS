<?php

namespace backend\modules\api\controllers;

use yii\rest\ActiveController;
use common\models\BalanceReq;

class BalanceReqController extends ActiveController
{
    public $modelClass = 'common\models\BalanceReq';

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => \yii\filters\auth\QueryParamAuth::class,
        ];
        return $behaviors;
    }

    public function actionMe()
    {
        return BalanceReq::find()
            ->where('client_id = ' . \Yii::$app->user->getId())
            ->all();
    }

    public function actions()
    {
        $actions = parent::actions();

        unset($actions['update']);

        return $actions;
    }


    public function checkAccess($action, $model = null, $params = [])
    {
        if ('admin' !== \Yii::$app->user->identity->authAssignment->item_name) {
            if ($action === 'index') {
                throw new \yii\web\ForbiddenHttpException(sprintf('You can only list your balance requests'));
            }
            if ($model->client_id !== \Yii::$app->user->id)
                throw new \yii\web\ForbiddenHttpException(sprintf('You can only list your balance requests'));
        }
    }
}
