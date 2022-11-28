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

    /**
     * Lists all BalanceReq models.
     *
     * @return string
     */
    public function actionIndex()
    {
        if (\Yii::$app->user->can('listBalanceReq')) {
            $model = BalanceReq::find()->where('status="Ongoing"')->all();
        }

        return $this->render('index', [
            'model' => $model,
        ]);
    }
    public function actionHistory()
    {
        if (\Yii::$app->user->can('listBalanceReq')) {
            $model = BalanceReq::find()->where('status="Accepted" OR status="Declined"')->all();
        }

        return $this->render('history', [
            'model' => $model,
        ]);
    }

    /**
     * Displays a single BalanceReq model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        if (\Yii::$app->user->can('readBalanceReq')) {
            return $this->render('view', [
                'model' => $this->findModel($id),
            ]);
        }
    }

    public function actionAccept($id, $employee_id)
    {
        if (\Yii::$app->user->can('updateBalanceReq')) {
            $balanceReq = $this->findModel($id);
            if ($balanceReq->status == 'Ongoing') {
                if ($balanceReq->setStatus('Accepted')) {
                    // add balance to account
                    $client = Client::findOne([$balanceReq->client_id]);
                    $client->addBalance($balanceReq->amount);

                    // assign responsible employee
                    $balanceReqEmployee = new BalanceReqEmployee();
                    $balanceReqEmployee->balanceReq_id = $id;
                    $balanceReqEmployee->employee_id = $employee_id;
                    $balanceReqEmployee->save();
                } else {
                    // Error while changing in DB
                }
            } else {
                // Not allowed to change status
            }
            return $this->redirect('index');
        }
    }
    public function actionDecline($id, $employee_id)
    {
        if (\Yii::$app->user->can('updateBalanceReq')) {
            $balanceReq = $this->findModel($id);
            if ($balanceReq->status == 'Ongoing') {
                if ($balanceReq->setStatus('Declined')) {
                    // assign responsible employee
                    $balanceReqEmployee = new BalanceReqEmployee();
                    $balanceReqEmployee->balanceReq_id = $id;
                    $balanceReqEmployee->employee_id = $employee_id;
                    $balanceReqEmployee->save();
                } else {
                    // Error while changing in DB
                }
            } else {
                // Not allowed to change status
            }
            return $this->redirect('index');
        }
    }


    /**
     * Finds the BalanceReq model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return BalanceReq the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = BalanceReq::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
