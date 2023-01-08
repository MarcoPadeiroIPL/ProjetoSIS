<?php

namespace backend\controllers;

use common\models\Receipt;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

class ReceiptController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'actions' => ['index', 'update', 'view'],
                        'allow' => true,
                        'roles' => ['admin','supervisor'],
                    ],
                   
                    [
                        'actions' => ['index',  'update', 'view'],
                        'allow' => false,
                        'roles' => ['client', '?','ticketOperator'],
                    ],
                    
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        if (!\Yii::$app->user->can('listReceipt')) 
            throw new \yii\web\ForbiddenHttpException('Access denied');


        $dataProvider = new ActiveDataProvider([
            'query' => Receipt::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id)
    {
        if (!\Yii::$app->user->can('readReceipt')) 
            throw new \yii\web\ForbiddenHttpException('Access denied');


        $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionCreate()
    {
        if (!\Yii::$app->user->can('createReceipt')) 
            throw new \yii\web\ForbiddenHttpException('Access denied');

        $model = new Receipt();

        if ($this->request->isPost && $model->load(\Yii::$app->request->post())){
            if ($model->save())
                \Yii::$app->session->setFlash('success', "Receipt created successfully.");
            else
                \Yii::$app->session->setFlash('error', "Receipt not saved.");
            return $this->redirect(['index']);
        }

            $model->loadDefaultValues();
            return $this->render('create', ['model' => $model]);
    }

    public function actionUpdate($id)
    {
        if (!\Yii::$app->user->can('updateReceipt')) 
            throw new \yii\web\ForbiddenHttpException('Access denied');

        $model = $this->findModel($id);

        if ($model->load(\Yii::$app->request->post())){
            if ($model->save())
                \Yii::$app->session->setFlash('success', "Receipt updated successfully.");
            else
                \Yii::$app->session->setFlash('error', "Receipt not updated successfully.");
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    protected function findModel($id)
    {
        if (($model = Receipt::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

