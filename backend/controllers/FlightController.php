<?php

namespace backend\controllers;

use common\models\Flight;
use common\models\Airport;
use common\models\Airplane;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use yii\helpers\ArrayHelper;

class FlightController extends Controller
{
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

    public function actionIndex()
    {
        if (!\Yii::$app->user->can('listFlight')) {
            return;
        }

        $dataProvider = new ActiveDataProvider([
            'query' => Flight::find(),
            'sort' => [
                'defaultOrder' => [
                    'departureDate' => SORT_ASC,
                ]
            ],
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id)
    {
        if (!\Yii::$app->user->can('readFlight')) {
            return;
        }

        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionCreate()
    {
        if (!\Yii::$app->user->can('createFlight')) {
            return;
        }
        $model = new Flight();

        // caso nao seja post
        if (!$this->request->isPost) {
            $airports = ArrayHelper::map(Airport::find()->asArray()->all(), 'id', 'city', 'country');
            $airplanes = ArrayHelper::map(Airplane::find()->asArray()->all(), 'id', 'id');
            $model->loadDefaultValues();

            return $this->render('create', [
                'model' => $model,
                'airports' => $airports,
                'airplanes' => $airplanes,
            ]);
        }

        // caso seja post
        if ($model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }
    }

    public function actionUpdate($id)
    {
        if (!\Yii::$app->user->can('updateFlight')) {
            return;
        }

        $model = $this->findModel($id);
        $airports = ArrayHelper::map(Airport::find()->asArray()->all(), 'id', 'city', 'country');
        $airplanes = ArrayHelper::map(Airplane::find()->asArray()->all(), 'id', 'id');

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'airports' => $airports,
            'airplanes' => $airplanes,
        ]);
    }

    public function actionDelete($id)
    {
        if (\Yii::$app->user->can('deleteFlight')) {
            return;
        }
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = Flight::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

