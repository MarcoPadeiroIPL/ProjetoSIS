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
                ],
            ],
        ];
    }

    public function actionSelectAirport($airportArrival_id = null, $receipt_id = null)
    {
        $model = new SelectAirport();
        $model->airportArrival_id = $airportArrival_id;

        // se esta action for chamada por post
        if ($this->request->isPost && $model->load($this->request->post()) && $model->validate()) {
            $this->redirect([
                'select-flight',
                'airportDeparture_id' => $model->airportDeparture_id,
                'airportArrival_id' => $model->airportArrival_id,
                'departureDate' => isset($model->departureDate) ? $model->departureDate : null,
                'receipt_id' => $receipt_id,
            ]);
        }

        // caso nao seja chamado por post, redireciona para o proximo passo
        $airports = ArrayHelper::map(Airport::find()->asArray()->all(), 'id', 'city', 'country');

        return $this->render('select-airport', [
            'model' => $model,
            'airports' => $airports,
            'receipt_id' => $receipt_id,
        ]);
    }

    public function actionSelectFlight($flight_id = null, $airportDeparture_id = null, $airportArrival_id = null, $departureDate = null, $receipt_id = null)
    {
        $selectFlight = new SelectFlight();

        if (!is_null($flight_id)) {
            $selectedFlight = Flight::findOne([$flight_id]);
            $flights = Flight::find()
                ->where('airportDeparture_id = ' . $selectedFlight->airportDeparture_id)
                ->andWhere('airportArrival_id = ' . $selectedFlight->airportArrival_id)
                ->orderBy('departureDate')
                ->all();
        } else {
            // sql query nao estava a funcionar ffs
            $temp = Flight::find()->all();

            foreach ($temp as $flight) {
                $interval[] = abs(strtotime($flight->departureDate) - strtotime($departureDate));
            }
            asort($interval);

            $selectedFlight = Flight::findOne(key($interval) + 1);

            // se esta action nao for chamada por post
            $flights = Flight::find()
                ->where('airportDeparture_id = ' . $airportDeparture_id)
                ->andWhere('airportArrival_id = ' . $airportArrival_id)
                ->orderBy('departureDate')
                ->all();
        }

        return $this->render('select-flight', [
            'model' => $selectFlight,
            'flights' => $flights,
            'airportArrival' => Airport::findOne($airportArrival_id),
            'airportDeparture' => Airport::findOne($airportDeparture_id),
            'closestFlight' => $selectedFlight,
            'receipt_id' => $receipt_id,
        ]);
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
