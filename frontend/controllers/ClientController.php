<?php

namespace frontend\controllers;

use yii;
use common\models\Client;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class ClientController extends Controller
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
        if (!\Yii::$app->user->can('readClient')) {
            return;
        }

        $client = Client::findOne([\Yii::$app->user->getId()]);
        return $this->render('index', [
            'client' => $client,
        ]);
    }

    public function actionUpdate($user_id)
    {
        if (!\Yii::$app->user->can('updateClient')) {
            return;
        }

        $model = $this->findModel($user_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'user_id' => $model->user_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionDelete($user_id)
    {
        if (!\Yii::$app->user->can('updateClient')) {
            return;
        }

        $this->findModel($user_id)->delete();

        return $this->redirect(['index']);
    }

    protected function findModel($user_id)
    {
        if (($model = Client::findOne(['user_id' => $user_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

