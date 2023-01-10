<?php

namespace backend\modules\api\controllers;

use yii\rest\ActiveController;
use common\models\Flight;
use common\models\Ticket;

class FlightController extends ActiveController
{
    public $modelClass = 'common\models\Flight';

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => \yii\filters\auth\QueryParamAuth::class,
        ];
        return $behaviors;
    }
    public function actions()
    {
        $actions = parent::actions();

        unset($actions['create'], $actions['delete'], $actions['update']);

        return $actions;
    }
}
