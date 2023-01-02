<?php

namespace backend\controllers;

use common\models\Refund;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

class RefundController extends Controller
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
                        'actions' => ['index', 'update', 'view'],
                        'allow' => false,
                        'roles' => ['client', '?','ticketOperator'],
                    ],
                    
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        if (!\Yii::$app->user->can('listRefund')) 
            throw new \yii\web\ForbiddenHttpException('Access denied');


        $dataProvider = new ActiveDataProvider([
            'query' => Refund::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id)
    {
        if (!\Yii::$app->user->can('readRefund')) 
            throw new \yii\web\ForbiddenHttpException('Access denied');


        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionUpdate($id)
    {
        if (!\Yii::$app->user->can('updateRefund')) 
            throw new \yii\web\ForbiddenHttpException('Access denied');


        $model = $this->findModel($id);

        if ($model->load(\Yii::$app->request->post())){
            if ($model->save())
                \Yii::$app->session->setFlash('success', "Refund updated successfully.");
            else
                \Yii::$app->session->setFlash('error', "Refund not updated successfully.");
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    protected function findModel($id)
    {
        if (($model = Refund::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

