<?php

namespace frontend\controllers;

use common\models\Flight;
use common\models\Airport;
use frontend\models\SelectAirport;
use frontend\models\SelectDate;
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
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['select-airport', 'select-flight', 'view'],
                        'allow' => true,
                        'roles' => ['client', '?']
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

    public function actionSelectAirport()
    {
        $model = new SelectAirport();

        // se esta action nao for chamada por post
        if (!$this->request->isPost) {
            $airports = ArrayHelper::map(Airport::find()->asArray()->all(), 'id', 'city', 'country');

            return $this->render('select-airport', [
                'model' => $model,
                'airports' => $airports,
            ]);
        }

        // caso seja chamado por post, redireciona para o proximo passo
        $form = $_POST['SelectAirport'];
        return $this->redirect([
            'select-flight',
            'airportDeparture_id' => $form['airportDeparture_id'],
            'airportArrival_id' => $form['airportArrival_id'],
            'departureDate' => $form['departureDate'],
        ]);
    }

    public function actionSelectFlight($airportDeparture_id, $airportArrival_id, $departureDate, $selectedFlight = 0)
    {
        $model = new SelectFlight();

        // se esta action nao for chamada por post
        if (!$this->request->isPost) {
            // meter uma variavel que tem o top 3 flights para os criterios pedidos
            $airportDeparture = Airport::findOne($airportDeparture_id);
            $airportArrival = Airport::findOne($airportArrival_id);
            $flights = Flight::find()
                ->where('airportDeparture_id = ' . $airportDeparture_id)
                ->andWhere('airportArrival_id = ' . $airportArrival_id)->all();

            if ($selectedFlight == 0)
                $selectedFlight = Flight::findOne(1);
            else
                $selectedFlight = Flight::findOne($selectedFlight);

            return $this->render('select-flight', [
                'model' => $model,
                'flights' => $flights,
                'selectedFlight' => $selectedFlight,
                'airportArrival' => $airportArrival,
                'airportDeparture' => $airportDeparture,
            ]);
        }


        // caso seja chamado por post, redireciona para o proximo passo
        if (isset($_POST['SelectFlight']['flight_id'])) {
            $form = $_POST['SelectDate'];
            return $this->redirect([
                'select-luggage',
                'airportDeparture_id' => $form['airportDeparture_id'],
                'airportArrival_id' => $form['airportArrival_id'],
                'departureDate' => $form['departureDate'],
            ]);
        }
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

