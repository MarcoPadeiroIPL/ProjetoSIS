<?php

namespace backend\controllers;

use common\models\Tariff;
use common\models\Flight;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\filters\AccessControl;

class TariffController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['index', 'create', 'delete', 'update', 'view'],
                        'allow' => true,
                        'roles' => ['admin','supervisor'],
                    ],
                    [
                        'actions' => ['view','index'],
                        'allow' => true,
                        'roles' => ['ticketOperator'],
                    ],
                    [
                        'actions' => ['index', 'create', 'delete', 'update', 'view'],
                        'allow' => false,
                        'roles' => ['client', '?'],
                    ],
                    [
                        'actions' => ['create', 'delete', 'update'],
                        'allow' => false,
                        'roles' => ['ticketOperator'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function actionIndex($flight_id)
    {
        if (!\Yii::$app->user->can('listTariff')) {
            return;
        }

        $flight = Flight::findOne([$flight_id]);
        $dataProvider = new ActiveDataProvider([
            'query' => Tariff::find()
            ->where('flight_id =' . $flight_id)
            ->orderBy(['startDate' => SORT_DESC]),
        ]);
        return $this->render('index', [
            'flight' => $flight,
            'dataProvider' => $dataProvider,
        ]);
    }

    protected function findModel($id)
    {
        if (($model = Tariff::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

