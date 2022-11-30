<?php

namespace frontend\controllers;

use yii;
use common\models\BalanceReq;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\Client;
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
                        'actions' => ['index', 'create', 'history', 'delete'],
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

    /**
     * Lists all BalanceReq models.
     *
     * @return string
     */
    public function actionIndex()
    {
        if (\Yii::$app->user->can('listBalanceReq')) {
            $client = Client::findOne([Yii::$app->user->getId()]);
            $dataProvider = new ActiveDataProvider([
                'query' => BalanceReq::find()->where(['client_id' => Yii::$app->user->identity])->andWhere(['status' => 'Ongoing']),

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
    }

    /**
     * Displays a single BalanceReq model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new BalanceReq model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        if (\Yii::$app->user->can('createBalanceReq')) {
            $model = new BalanceReq();


            if ($this->request->isPost) {
                if ($model->load($this->request->post()) && $model->save()) {
                    return $this->redirect(['view', 'id' => $model->id]);
                }
            } else {
                $model->loadDefaultValues();
            }

            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }



    public function actionDelete($id)
    {
        if (\Yii::$app->user->can('deleteBalanceReq')) {
            $this->findModel($id)->delete();

            return $this->redirect(['index']);
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
