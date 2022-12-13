<?php

namespace backend\controllers;

use backend\models\RegisterEmployee;
use backend\models\Employee;
use common\models\User;
use common\models\Airport;

use yii\helpers\ArrayHelper;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class EmployeeController extends Controller
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
                        'actions' => ['index', 'create', 'delete', 'update', 'view'],
                        'allow' => true,
                        'roles' => ['admin'],
                    ],
                    [
                        'actions' => ['view'],
                        'allow' => true,
                        'roles' => ['supervisor', 'ticketOperator'],
                    ],
                    [
                        'actions' => ['index', 'create', 'delete', 'update', 'view'],
                        'allow' => false,
                        'roles' => ['client', '?'],
                    ],
                    [
                        'actions' => ['index', 'create', 'delete', 'update'],
                        'allow' => false,
                        'roles' => ['supervisor', 'ticketOperator'],
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
        if (!\Yii::$app->user->can('listEmployee')) {
            return;
        }

        $dataProvider = new ActiveDataProvider([
            'query' => User::find()->where('status=10')
            ->innerJoin('auth_assignment', 'auth_assignment.user_id = user.id')
            ->andWhere('auth_assignment.item_name != "client"'),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($user_id)
    {
        if (!\Yii::$app->user->can('readEmployee')) {
            return;
        }

        return $this->render('view', [
            'model' => $this->findModel($user_id),
        ]);
    }

    public function actionCreate()
    {
        if (!\Yii::$app->user->can('createEmployee')) {
            return;
        }
        $model = new RegisterEmployee();

        if (!$this->request->isPost) {
            $airports = ArrayHelper::map(Airport::find()->asArray()->all(), 'id', 'city', 'country');
            $roles = $this->filtrarRoles(\Yii::$app->authManager->getRoles());

            return $this->render('create', [
                'model' => $model,
                'airports' => $airports,
                'roles' => $roles
            ]);
        }

        if ($model->load($this->request->post()) && $model->register()) {
            return $this->redirect(['view', 'user_id' => $model->user_id]);
        }
    }

    public function actionUpdate($user_id)
    {
        if (!\Yii::$app->user->can('updateEmployee')) {
            return;
        }
        $model = new RegisterEmployee();

        if (!$this->request->isPost) {
            $airports = ArrayHelper::map(Airport::find()->asArray()->all(), 'id', 'city', 'country');
            $roles = $this->filtrarRoles(\Yii::$app->authManager->getRoles());

            return $this->render('update', [
                'model' => $model,
                'airports' => $airports,
                'roles' => $roles
            ]);
        }

        if ($model->load($this->request->post()) && $model->register()) {
            return $this->redirect(['view', 'user_id' => $model->user_id]);
        }
    }

    public function actionDelete($user_id)
    {
        if (!\Yii::$app->user->can('deleteEmployee')) {
            return;
        }

        User::findOne($user_id)->deleteUser();

        return $this->redirect(['index']);
    }

    protected function findModel($user_id)
    {
        if (($model = Employee::findOne(['user_id' => $user_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function filtrarRoles($temp)
    {
        $roles = [];

        // filtrar as roles
        foreach ($temp as $role) {
            if ($role->name != 'client') {
                $roles[$role->name] = $role->name;
            }
        }
        return $roles;
    }
}
