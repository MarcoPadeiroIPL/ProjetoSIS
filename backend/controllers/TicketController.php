<?php

namespace backend\controllers;

use common\models\Ticket;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

class TicketController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'actions' => ['index', 'update', 'view'],
                        'allow' => true,
                        'roles' => ['admin', 'supervisor', 'ticketOperator'],
                    ],

                    [
                        'actions' => ['index', 'update', 'view'],
                        'allow' => false,
                        'roles' => ['client', '?'],
                    ],

                ],
            ],
        ];
    }

    public function actionIndex($flight_id)
    {
        if (!\Yii::$app->user->can('listTicket'))
            throw new \yii\web\ForbiddenHttpException('Access denied');


        $dataProvider = new ActiveDataProvider([
            'query' => Ticket::find()->where(['flight_id' => $flight_id]),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id)
    {
        if (!\Yii::$app->user->can('readTicket'))
            throw new \yii\web\ForbiddenHttpException('Access denied');


        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionUpdate($id)
    {
        if (!\Yii::$app->user->can('updateTicket'))
            throw new \yii\web\ForbiddenHttpException('Access denied');


        $model = $this->findModel($id);

        if ($model->load(\Yii::$app->request->post())) {
            if ($model->save())
                \Yii::$app->session->setFlash('success', "Ticket updated successfully.");
            else
                \Yii::$app->session->setFlash('error', "Ticket not updated successfully.");
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    protected function findModel($id)
    {
        if (($model = Ticket::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
