<?php

namespace backend\modules\api\controllers;

use yii\rest\ActiveController;

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
}
