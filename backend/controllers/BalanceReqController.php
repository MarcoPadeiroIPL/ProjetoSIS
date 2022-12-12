<?php

namespace backend\controllers;

use common\models\BalanceReq;
use common\models\BalanceReqEmployee;
use common\models\Client;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * BalanceReqController implements the CRUD actions for BalanceReq model.
 */
class BalanceReqController extends Controller
{
    /**
     * @inheritDoc
     */
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
                        'actions' => ['index', 'history', 'accept', 'decline', 'view'],
                        'allow' => true,
                        'roles' => ['admin', 'supervisor'],
                    ],
                    [
                        'actions' => ['index', 'accept', 'history', 'decline', 'view'],
                        'allow' => false,
                        'roles' => ['ticketOperator', 'client'],
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
        if (!\Yii::$app->user->can('listBalanceReq')) {
            return;
        }

        $dataProvider = new ActiveDataProvider([
            'query' => BalanceReq::find()->where('status="Ongoing"'),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionHistory()
    {
        if (!\Yii::$app->user->can('listBalanceReq')) {
            return;
        }

        $dataProvider = new ActiveDataProvider([
            'query' => BalanceReq::find()->where('status="Accepted" OR status="Declined"'),
        ]);

        return $this->render('history', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id)
    {
        if (!\Yii::$app->user->can('readBalanceReq')) {
            return;
        }

        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionAccept($id)
    {
        if (!\Yii::$app->user->can('updateBalanceReq')) {
            return;
        }

        $balanceReq = $this->findModel($id);

        if ($balanceReq->status != 'Ongoing') {
            // Not allowed to change status of not ongoing balance req
            return;
        }

        $employee_id = \Yii::$app->user->getId();

        // add balance to account
        $client = Client::findOne(['user_id' => $balanceReq->client_id]);
        $client->addBalance($balanceReq->amount);

        // assign responsible employee
        $balanceReqEmployee = new BalanceReqEmployee($id, $employee_id);
        $balanceReqEmployee->save();

        $balanceReq->setStatus('Accepted');
        $client->save();

        return $this->redirect('index');
    }
    public function actionDecline($id)
    {
        if (!\Yii::$app->user->can('updateBalanceReq')) {
            return;
        }

        $balanceReq = $this->findModel($id);

        if ($balanceReq->status != 'Ongoing') {
            // Not allowed to change status of not ongoing balance req
            return;
        }

        $employee_id = \Yii::$app->user->getId();

        // assign responsible employee
        $balanceReqEmployee = new BalanceReqEmployee($id, $employee_id);
        $balanceReqEmployee->save();

        $balanceReq->setStatus('Declined');

        return $this->redirect('index');
    }


    protected function findModel($id)
    {
        if (($model = BalanceReq::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}