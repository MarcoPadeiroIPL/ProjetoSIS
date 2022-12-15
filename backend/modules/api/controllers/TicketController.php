<?php

namespace backend\modules\api\controllers;

use yii\rest\ActiveController;

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
}
