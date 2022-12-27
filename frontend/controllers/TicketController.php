<?php

namespace frontend\controllers;

use frontend\models\TicketBuilder;
use yii;
use common\models\BalanceReq;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\ForbiddenHttpException;
use yii\filters\VerbFilter;
use common\models\Client;
use common\models\Flight;
use common\models\Config;
use common\models\Receipt;
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
                        'actions' => ['buy-ticket', 'create', 'history', 'delete', 'view'],
                        'allow' => true,
                        'roles' => ['client'],
                    ],
                    [
                        'actions' => ['index', 'create', 'history', 'delete'],
                        'allow' => false,
                        'roles' => ['admin', 'supervisor', '?', 'ticketOperator'],
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

    public function actionBuyTicket($flight_id, $passangers)
    {
        for ($i = 1; $i <= $passangers; $i++) {
            $tickets[$i] = new TicketBuilder;
        }
        $temp = Config::find()
        ->select(['weight', 'price'])
        ->where('active = 1')
        ->all();

        foreach($temp as $t) {
            $config[] = $t->weight . 'kg | ' . $t->price . '€';
        }
        if (!$this->request->isPost) {
            return $this->render('passanger', [
                'tickets' => $tickets,
                'config' => $config,
                'flight' => Flight::findOne([$flight_id]),
            ]);
        }

        $receipt = new Receipt();
        $receipt->purchaseDate = date('Y/m/d H:i:s');
        $receipt->total = 0;
        $receipt->status = 'Pending';
        $receipt->save();

        for ($i = 1; $i <= $passangers; $i++) {
            if (!$tickets[$i]->load($this->request->post()) || !$tickets[$i]->generateTicket($receipt->id)) {
                return false;
            }
        }

        return $this->redirect(['index']);
    }

    public function actionView($id)
    {
        if (!\Yii::$app->user->can('readBalanceReq')) {
            return;
        }

        $model = $this->findModel($id);

        $userId = Yii::$app->user->id;

        if ($model->client_id != $userId) {
            throw new ForbiddenHttpException('You are not allowed to view this balance request.');
        }

        return $this->render('view', [
            'model' => $model,
        ]);
    }

    public function actionCreate()
    {
        if (!\Yii::$app->user->can('createBalanceReq')) {
            return;
        }

        $model = new BalanceReq();

        if (!$this->request->isPost) {
            $model->loadDefaultValues();
            return $this->render('create', [
                'model' => $model,
            ]);
        }

        if ($model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }
    }



    protected function findModel($id)
    {
        if (($model = BalanceReq::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
