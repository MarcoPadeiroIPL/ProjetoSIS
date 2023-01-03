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
                        'actions' => ['index', 'view', 'pay', 'update', 'delete','ask'],
                        'allow' => true,
                        'roles' => ['client'],
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
        $balancereq = new BalanceReq();
        $finalamount = $receipt->total - $client->balance;
        $balancereq->client_id = $receipt->client_id;
        $balancereq->amount = $finalamount;
        $balancereq->requestDate = date('Y-m-d H:i:s');
        if($balancereq->save())        
            \Yii::$app->session->setFlash('success', "Balance request created successfully!");
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
