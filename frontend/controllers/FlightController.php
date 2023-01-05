<?php

namespace frontend\controllers;

use Yii;
use common\models\Flight;
use common\models\Airport;
use frontend\models\SelectAirport;
use frontend\models\SelectFlight;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\helpers\ArrayHelper;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

class FlightController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'actions' => ['select-flight', 'select-airport', 'view'],
                        'allow' => true,
                        'roles' => ['client', '?'],
                        'matchCallback' => function ($rule, $action) {
                            return Yii::$app->user->isGuest || Yii::$app->user->identity->status == 10;
                        },
                        'denyCallback' => function ($rule, $action) {
                            throw new \Exception('Access denied');
                        }
                    ],
                    [
                        'allow' => false,
                        'actions' => ['select-flight', 'select-airport', 'view'],
                        'matchCallback' => function ($rule, $action) {
                            return Yii::$app->user->identity->status == 8;
                        },
                        'denyCallback' => function ($rule, $action) {
                            \Yii::$app->session->setFlash('error', 'You do not have sufficient permissions to perform this action');
                            \Yii::$app->response->redirect(['site/fill']);
                        },
                    ],
                ],
            ],

            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actionSelectAirport($receipt_id = null)
    {
        $model = new SelectAirport();

        // se esta action for chamada por post

        // caso nao seja chamado por post, redireciona para o proximo passo
        $airports = ArrayHelper::map(Airport::find()->asArray()->all(), 'id', 'city', 'country');

        return $this->render('select-airport', [
            'model' => $model,
            'airports' => $airports,
            'receipt_id' => $receipt_id,
        ]);
    }

    public function actionSelectFlight($receipt_id = null)
    {
        $selectFlight = new SelectFlight();
        $selectAirport = new SelectAirport();

        // se esta action nao for chamada por post
        if ($this->request->isPost && $selectAirport->load($this->request->post()) && $selectAirport->validate()) {
            $flights = Flight::find()
                ->where('airportDeparture_id = ' . $selectAirport->airportDeparture_id)
                ->andWhere('airportArrival_id = ' . $selectAirport->airportArrival_id)
                ->orderBy('departureDate')
                ->all();

            return $this->render('select-flight', [
                'model' => $selectFlight,
                'flights' => $flights,
                'airportArrival' => Airport::findOne($selectAirport->airportArrival_id),
                'airportDeparture' => Airport::findOne($selectAirport->airportDeparture_id),
                'passangers' => $selectAirport->passangers + 1,
                'receipt_id' => $receipt_id,
            ]);
        }
        return $this->redirect(['select-airport']);
    }

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }


    protected function findModel($id)
    {
        if (($model = Flight::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
