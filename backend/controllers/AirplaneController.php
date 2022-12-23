<?php

namespace backend\controllers;

use common\models\Airplane;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class AirplaneController extends Controller
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
                        'actions' => ['view', 'index'],
                        'allow' => true,
                        'roles' => ['supervisor', 'ticketOperator'],
                    ],
                    [
                        'actions' => ['index', 'create', 'delete', 'update', 'view'],
                        'allow' => false,
                        'roles' => ['client', '?'],
                    ],
                    [
                        'actions' => ['create', 'delete', 'update'],
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
        if (!\Yii::$app->user->can('listAirplane')) {
            return;
        }


        $dataProvider = new ActiveDataProvider([
            'query' => Airplane::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id)
    {
        if (!\Yii::$app->user->can('readAirplane')) {
            return;
        }

        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionCreate()
    {
        if (!\Yii::$app->user->can('createAirplane')) {
            return;
        }

        $model = new Airplane();

        // caso nao seja post redireciona para o formulario
        if (!$this->request->isPost) {
            $model->loadDefaultValues();
            return $this->render('create', [
                'model' => $model,
            ]);
        }

        // caso seja post guarda
        if ($model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }
    }

    public function actionUpdate($id)
    {
        if (!\Yii::$app->user->can('updateAirplane')) {
            return;
        }

        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionDelete($id)
    {
        if (!\Yii::$app->user->can('deleteAirplane')) {
            return;
        }

        $model = $this->findModel($id);
        $model->status = $model->status == "Active" ? "Not working" : "Active";
        $model->save();

        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = Airplane::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
