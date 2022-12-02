<?php

namespace backend\controllers;

use common\models\LoginForm;
use Yii;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use common\models\BalanceReq;
use common\models\Airport;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
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
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['index'],
                        'allow' => true,
                        'roles' => ['admin', 'supervisor', 'ticketOperator'],
                    ],
                    [
                        'actions' => ['index'],
                        'allow' => false,
                        'roles' => ['client', '?'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */

    public function actions()
    {
        return [
            'error' => [
                'class' => \yii\web\ErrorAction::class,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $airportCount = Airport::find()->count();

        $mostSearchedAirport = Airport::find()->orderBy(['search' => SORT_DESC])->one();
        if(!is_null($mostSearchedAirport)) 
            $mostSearchedAirportPercentage = $mostSearchedAirport->search;
        else 
            $mostSearchedAirportPercentage = 0;

        $leastSearchedAirport = Airport::find()->orderBy(['search' => SORT_ASC])->one();
        if(!is_null($leastSearchedAirport)) 
            $leastSearchedAirportPercentage = $leastSearchedAirport->search;
        else 
        $leastSearchedAirportPercentage = 0;

        $balanceReqCount = BalanceReq::find()->where(['status' => 'Ongoing'])->count();

        return $this->render('index', [
            'balanceReqCount' => $balanceReqCount,
            'mostSearchedAirport' => $mostSearchedAirport,
            'mostSearchedAirportPercentage' => $mostSearchedAirportPercentage,
            'leastSearchedAirport' => $leastSearchedAirport,
            'leastSearchedAirportPercentage' => $leastSearchedAirportPercentage,
            'airportCount' => $airportCount,
        ]);
    }

    /**
     * Login action.
     *
     * @return string|Response
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $this->layout = 'blank';

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';

        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
