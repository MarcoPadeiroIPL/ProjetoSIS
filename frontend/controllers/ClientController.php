<?php

namespace frontend\controllers;

use yii;
use common\models\Client;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\ForbiddenHttpException;
use yii\filters\VerbFilter;
use common\models\UserData;


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
        $userId = Yii::$app->user->id;
        if ($user_id != $userId) {
            throw new ForbiddenHttpException('You are not allowed to view this profile.');
        }

        $model =UserData::findOne($user_id);

        if (!$this->request->isPost) {
            $model->loadDefaultValues();
            return $this->render('update', [
                'model' => $model,
            ]);
        }

        if ($model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }
       
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
