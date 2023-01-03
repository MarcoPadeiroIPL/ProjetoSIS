<?php

namespace frontend\controllers;

use yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\Receipt;
use common\models\Client;
use yii\filters\AccessControl;
use common\models\BalanceReq;

class ReceiptController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'actions' => ['index', 'view', 'pay', 'update', 'delete', 'ask'],
                        'allow' => true,
                        'roles' => ['client'],
                        'matchCallback' => function ($rule, $action) {
                            return Yii::$app->user->identity->status == 10;
                        }
                    ],
                    [
                        'allow' => false,
                        'actions' => ['index', 'view', 'pay', 'update', 'delete', 'ask'],
                        'matchCallback' => function ($rule, $action) {
                            return Yii::$app->user->identity->status == 8;
                        },
                        'denyCallback' => function ($rule, $action) {
                            \Yii::$app->session->setFlash('error', 'You do not have sufficient permissions to perform this action');
                            \Yii::$app->response->redirect(['site/fill']);
                        },
                    ],
                    [
                        'actions' => ['index', 'view', 'pay', 'update', 'delete'],
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


    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Receipt::find()->where(['client_id' => \Yii::$app->user->identity->getId()])
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
        return $this->render('view', [
            'receipt' => $this->findModel($id),
        ]);
    }



    public function actionDelete($id)
    {
        if ($this->findModel($id)->shred())
            \Yii::$app->session->setFlash('success', "Receipt deleted successfully!");
        else
            \Yii::$app->session->setFlash('error', "The receipt couldn't be deleted because it's already completed.");

        return $this->redirect(['index']);
    }
    public function actionPay($id)
    {
        $receipt = $this->findModel($id);
        $client = Client::findOne([\Yii::$app->user->identity->getId()]);
        $receipt->refreshTotal();

        if ($this->request->isPost) {
            if ($receipt->status == "Complete") {
                \Yii::$app->session->setFlash('error', "This receipt is already completed");
                return $this->redirect(['index']);
            }
            if ($client->balance >= $receipt->total) {
                $client->balance -= $receipt->total;
                $receipt->status = "Complete";
                $receipt->purchaseDate = date('Y-m-d H:i:s');
                if ($client->save() && $receipt->save()) {
                    \Yii::$app->session->setFlash('success', "Purchase completed successfully!");
                    return $this->redirect(['index']);
                } else
                    \Yii::$app->session->setFlash('error', "There was an error while completing the payment, please try again later.");
            } else
                \Yii::$app->session->setFlash('error', "You don't have enough balance");
        }
        return $this->render('pay', [
            'receipt' => $receipt,
            'client' => $client,
        ]);
    }
    public function actionAsk($id)
    {
        $receipt = $this->findModel($id);
        $client = Client::findOne([$receipt->client_id]);

        $req = new BalanceReq();
        $req->client_id = $receipt->client_id;
        $req->amount = $receipt->total - $client->balance;
        $req->requestDate = date('Y-m-d H:i:s');
        if ($req->save())
            \Yii::$app->session->setFlash('success', "Successfully requested " . $req->amount . "€");
        else
            \Yii::$app->session->setFlash('error', "There was an error while completing the balance request, please try again later.");

        return $this->redirect(['pay', 'id' => $receipt->id]);
    }
    protected function findModel($id)
    {
        if (($model = Receipt::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
