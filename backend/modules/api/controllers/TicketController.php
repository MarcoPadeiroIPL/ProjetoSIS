<?php

namespace backend\modules\api\controllers;

use yii\rest\ActiveController;
use common\models\Ticket;

class TicketController extends ActiveController
{
    public $modelClass = 'common\models\Ticket';

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
        return Ticket::find()
            ->where('client_id = ' . \Yii::$app->user->getId())
            ->all();
    }

    public function checkAccess($action, $model = null, $params = [])
    {
        if ('admin' !== \Yii::$app->user->identity->authAssignment->item_name) {
            if ($action === 'index')
                throw new \yii\web\ForbiddenHttpException(sprintf('You only can view your tickets'));
            if ($model->client_id !== \Yii::$app->user->id || $action === 'index')
                throw new \yii\web\ForbiddenHttpException(sprintf('You only can view your tickets'));
        }
    }
}
