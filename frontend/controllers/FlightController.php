<?php

namespace frontend\controllers;

use common\models\Flight;
use common\models\Airport;
use frontend\models\SelectAirport;
use frontend\models\SelectDate;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\helpers\ArrayHelper;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * FlightController implements the CRUD actions for Flight model.
 */
class FlightController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Flight models.
     *
     * @return string
     */
    public function actionSelectAirport()
    {
        $model = new SelectAirport();
        // se esta action for chamada por post
        if ($this->request->isPost) {
            $form = $_POST['SelectAirport'];
            return $this->redirect([
                'select-date',
                'airportDeparture_id' => $form['airportDeparture_id'],
                'airportArrival_id' => $form['airportArrival_id'],

            ]);
        }

        $airports = ArrayHelper::map(Airport::find()->asArray()->all(), 'id', 'city', 'country');

        return $this->render('select-airport', [
            'model' => $model,
            'airports' => $airports,
        ]);
    }
    public function actionSelectDate($airportDeparture_id, $airportArrival_id)
    {
        $model = new SelectDate();
        $model->airportDeparture_id = $airportDeparture_id;
        $model->airportArrival_id = $airportArrival_id;
        // se esta action for chamada por post
        if ($this->request->isPost)
            if (isset($_POST['SelectDate']['airportDeparture_id'])) {
                $form = $_POST['SelectDate'];
                return $this->redirect([
                    'select-flight',
                    'airportDeparture_id' => $form['airportDeparture_id'],
                    'airportArrival_id' => $form['airportArrival_id'],
                    'departureDate' => $form['departureDate'],

                ]);
            }


        return $this->render('select-date', [
            'model' => $model,
            'airportDeparture_id' => $airportDeparture_id,
            'airportArrival_id' => $airportArrival_id,
        ]);
    }

    /**
     * Displays a single Flight model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Flight model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Flight();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Flight model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Flight model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Flight model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Flight the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Flight::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
