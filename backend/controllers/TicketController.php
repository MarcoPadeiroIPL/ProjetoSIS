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
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['index', 'update', 'view'],
                        'allow' => true,
                        'roles' => ['admin','supervisor','ticketOperator'],
                    ],
                   
                    [
                        'actions' => ['index', 'create', 'delete', 'update', 'view'],
                        'allow' => false,
                        'roles' => ['client', '?'],
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

    public function actionIndex()
    {
        if (!\Yii::$app->user->can('listTicket')) {
            return;
        }

        $dataProvider = new ActiveDataProvider([
            'query' => Ticket::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id)
    {
        if (!\Yii::$app->user->can('readTicket')) {
            return;
        }

        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionCreate()
    {
        if (!\Yii::$app->user->can('createTicket')) {
            return;
        }

        $model = new Ticket();

        // caso nao seja post
        if (!$this->request->isPost) {
            $model->loadDefaultValues();
            return $this->render('create', [
                'model' => $model,
            ]);
        }

        // caso seja post
        if ($model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }
    }

    public function actionUpdate($id)
    {
        if (!\Yii::$app->user->can('updateTicket')) {
            return;
        }

        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionDelete($id)
    {
        if (!\Yii::$app->user->can('deleteTicket')) {
            return;
        }

        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = Ticket::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

