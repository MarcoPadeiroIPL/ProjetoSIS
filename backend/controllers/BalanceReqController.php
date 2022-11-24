<?php

namespace backend\controllers;

use common\models\BalanceReq;
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
                        'actions' => ['index', 'update', 'view'],
                        'allow' => true,
                        'roles' => ['admin', 'supervisor'],
                    ],
                    [
                        'actions' => ['index', 'update', 'view'],
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
            $model = BalanceReq::find()->all();
        }

        return $this->render('index', [
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

    public function actionUpdate($id, $status)
    {
        if (\Yii::$app->user->can('updateBalanceReq')) {
            $model = $this->findModel($id);
            if ($model->status == 'Ongoing') {
                if ($model->setStatus($status)) {
                    
                   /* $user = User::findModel($model->client_id);
                    if($user->validateAuthKey("client"))
                    {
                        $client = Client::findModel($model->client_id);
                        $client->addBalance($model->amount);
                    }
                    */
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
