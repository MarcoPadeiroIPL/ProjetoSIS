<?php

namespace frontend\controllers;

use yii;
use common\models\BalanceReq;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\ForbiddenHttpException;
use yii\filters\VerbFilter;
use common\models\Client;
use yii\filters\AccessControl;

class BalanceReqController extends Controller
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
                        'actions' => ['index', 'create', 'history', 'delete', 'view'],
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

    public function actionIndex()
    {
        if (!\Yii::$app->user->can('listBalanceReq')) {
            return;
        }

        $client = Client::findOne([\Yii::$app->user->getId()]);
        $dataProvider = new ActiveDataProvider([
            'query' => BalanceReq::find()
                ->where(['client_id' => \Yii::$app->user->getId()])
                ->andWhere(['status' => 'Ongoing']),
            'pagination' => [
                'pageSize' => 5
            ],
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_ASC,
                ]
            ],
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'client' => $client,
        ]);
    }

    public function actionView($id)
    {
        if (!\Yii::$app->user->can('readBalanceReq')) {
            return;
        }

        $model = $this->findModel($id);

        $userId=Yii::$app->user->id;
        
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

    public function actionDelete($id)
    {
        if (!\Yii::$app->user->can('deleteBalanceReq')) {
            return;
        }

        $this->findModel($id)->deleteBalanceReq();
        return $this->redirect(['index']);
    }

    public function actionHistory()
    {
        if (!\Yii::$app->user->can('listBalanceReq')) {
            return;
        }

        $dataProvider = new ActiveDataProvider([
            'query' => BalanceReq::find()->where('status="Accepted" OR status="Declined"'),
            'pagination' => [
                'pageSize' => 10
            ],
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_ASC,
                ]
            ],

        ]);

        return $this->render('history', [
            'dataProvider' => $dataProvider,
        ]);
    }

    protected function findModel($id)
    {
        if (($model = BalanceReq::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
