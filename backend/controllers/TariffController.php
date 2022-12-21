<?php

namespace backend\controllers;

use common\models\Tariff;
use common\models\Flight;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

class TariffController extends Controller
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
        if (!\Yii::$app->user->can('listTariff')) {
            return;
        }

        $dataProvider = new ActiveDataProvider([
            'query' => Tariff::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id)
    {
        if (!\Yii::$app->user->can('readTariff')) {
            return;
        }

        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionCreate()
    {
        if (!\Yii::$app->user->can('createTariff')) {
            return;
        }

        $model = new Tariff();

        // caso nao seja post
        if (!$this->request->isPost) {
            $flights = ArrayHelper::map(Flight::find()->asArray()->all(), 'id', 'id');
            $model->loadDefaultValues();
            return $this->render('create', [
                'model' => $model,
                'flights' => $flights,
            ]);
        }

        // caso seja post
        if ($model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }
    }

    public function actionUpdate($id)
    {
        if (!\Yii::$app->user->can('updateTariff')) {
            return;
        }

        $model = $this->findModel($id);

        if (!$this->request->isPost || !$model->load($this->request->post()) || !$model->save()) {
            $flights = ArrayHelper::map(Flight::find()->asArray()->all(), 'id', 'id');
            return $this->render('update', [
                'model' => $model,
                'flights' => $flights,
            ]);
        }

        return $this->redirect(['view', 'id' => $model->id]);
    }

    public function actionDelete($id)
    {
        if (!\Yii::$app->user->can('deleteTariff')) {
            return;
        }

        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = Tariff::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

