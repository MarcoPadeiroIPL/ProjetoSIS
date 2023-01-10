
<?php

namespace backend\modules\api\controllers;

use yii\rest\ActiveController;
use yii\filters\AccessControl;

class AirplaneController extends ActiveController
{
    public $modelClass = 'common\models\Airplane';

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => \yii\filters\auth\QueryParamAuth::class,
        ];
        return $behaviors;
    }
}
