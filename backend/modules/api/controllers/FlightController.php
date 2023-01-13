<?php

namespace backend\modules\api\controllers;

use yii\rest\ActiveController;
use common\models\Flight;
use backend\modules\api\components\CustomAuth;

class FlightController extends ActiveController
{
    public $modelClass = 'common\models\Flight';

    public function behaviors()
    {
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
        unset($actions['index'], $actions['view'], $actions['delete'], $actions['create'], $actions['update'], $actions['options']);


        return $actions;
    }

    public function actionView($id)
    {
        $flight =  Flight::find()
            ->with('tariff')
            ->with('airplane')
            ->where(['id' => $id])
            ->one();

        return $flight ? $flight : throw new \yii\web\NotFoundHttpException(sprintf('No flights were found'));
    }

    public function actionFind($airportDeparture, $airportArrival)
    {
        $flights = Flight::find()
            ->with('tariff')
            ->with('airplane')
            ->where('airportDeparture_id = ' . $airportDeparture)
            ->andWhere('airportArrival_id = ' . $airportArrival)
            ->all();

        return $flights ? $flights : throw new \yii\web\NotFoundHttpException(sprintf('No flights were found to these airports'));
    }
}
