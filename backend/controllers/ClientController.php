<?php

namespace backend\controllers;

use common\models\User;
use common\models\Client;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class ClientController extends Controller
{
    public function behaviors()
    {
        return[
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['index', 'create', 'delete', 'update', 'view'],
                        'allow' => true,
                        'roles' => ['admin','supervisor'],
                    ],
                    [
                        'actions' => ['view', 'index'],
                        'allow' => true,
                        'roles' => ['ticketOperator'],
                    ],
                    [
                        'actions' => ['index', 'create', 'delete', 'update', 'view'],
                        'allow' => false,
                        'roles' => ['client', '?'],
                    ],
                    [
                        'actions' => ['create', 'delete', 'update'],
                        'allow' => false,
                        'roles' => ['ticketOperator'],
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
        if (!\Yii::$app->user->can('listClient')) {
            return;
        }

        $dataProvider = new ActiveDataProvider([
            'query' => User::find()->where('status=10 OR status=8')
            ->innerJoin('auth_assignment', 'auth_assignment.user_id = user.id')
            ->andWhere('auth_assignment.item_name = "client"'),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($user_id)
    {
        if (!\Yii::$app->user->can('readClient')) {
            return;
        }

        return $this->render('view', [
            'model' => $this->findModel($user_id),
        ]);
    }

    public function actionCreate()
    {
        if (!\Yii::$app->user->can('createClient')) {
            return;
        }

        $model = new Client();

        if (!$this->request->isPost) {
            $model->loadDefaultValues();

            return $this->render('create', [
                'model' => $model,
            ]);
        }

        if ($model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'user_id' => $model->user_id]);
        }
    }

    public function actionUpdate($user_id)
    {
        if (!\Yii::$app->user->can('updateClient')) {
            return;
        }

        $model = $this->findModel($user_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'user_id' => $model->user_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionDelete($user_id)
    {
        if (!\Yii::$app->user->can('deleteClient')) {
            return;
        }

        $this->findModel($user_id)->delete();

        return $this->redirect(['index']);
    }

    protected function findModel($user_id)
    {
        if (($model = Client::findOne(['user_id' => $user_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
