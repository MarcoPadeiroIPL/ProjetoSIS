<?php

namespace frontend\controllers;

use frontend\models\TicketBuilder;
use common\models\Ticket;
use yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\ForbiddenHttpException;
use yii\filters\VerbFilter;
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
                        'actions' => ['index', 'create', 'delete', 'view'],
                        'allow' => true,
                        'roles' => ['client'],
                    ],
                    [
                        'actions' => ['index', 'create', 'delete', 'view'],
                        'allow' => false,
                        'roles' => ['admin', 'supervisor', '?', 'ticketOperator'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function getReceipt($receipt_id)
    {
        // caso ja exista a fatura vai buscar a existente
        if (!is_null($receipt_id))
            return Receipt::findOne([$receipt_id]);

        $receipt = new Receipt();
        $receipt->purchaseDate = date('Y/m/d H:i:s');
        $receipt->total = 0;
        $receipt->status = 'Pending';
        $receipt->save();
        return $receipt->save() ? $receipt : $receipt->save();
    }

    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Ticket::find()->where(['client_id' => \Yii::$app->user->identity->getId()])
            /*
            'pagination' => [
                'pageSize' => 50
            ],
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC,
                ]
            ],
            */
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id)
    {
        $ticket = Ticket::findOne([$id]);
        if (!$ticket->client_id == \Yii::$app->user->identity->getId()) {
            \Yii::$app->session->setFlash('error', "Not your ticket!");
        }

        return $this->render('view', ['model' => $ticket]);
    }

    public function actionCreate($flight_id, $tariffType, $receipt_id = null)
    {
        $flight = Flight::findOne([$flight_id]);
        $ticket = new TicketBuilder;

        if ($this->request->isPost) {
            $receipt = $this->getReceipt($receipt_id);
            // caso consiga criar o bilhete incrementa o current passanger
            if ($ticket->load($this->request->post()) && $ticket->generateTicket($receipt->id, $flight, $tariffType)) {
                return $this->redirect(['receipt/pay', 'id' => $receipt->id]);
            }

            // caso nao crie o bilhete apaga a fatura se nao tiver mais nenhum bilhete associado
            if ($receipt->tickets == null)
                $receipt->delete();
        }

        $config = Config::find()->orderBy('price')->all();

        return $this->render('create', [
            'ticket' => $ticket,
            'config' => $config,
            'flight' => $flight,
            'tariffType' => $tariffType,
        ]);
    }

    public function actionDelete($id)
    {
        $ticket = Ticket::findOne([$id]);
        if ($ticket->shred && $ticket->client_id == \Yii::$app->user->identity->getId()) {
            // sucesso
        } else {
            // error
        }
    }

    protected function findModel($id)
    {
        if (($model = Ticket::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
