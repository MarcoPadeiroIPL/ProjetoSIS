<?php

namespace frontend\controllers;

use frontend\models\TicketBuilder;
use common\models\Ticket;
use yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\ForbiddenHttpException;
use yii\filters\VerbFilter;
use common\models\Flight;
use common\models\Config;
use common\models\Receipt;
use yii\filters\AccessControl;

class TicketController extends Controller
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
                        'actions' => ['buy-ticket', 'create', 'history', 'delete', 'view'],
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

    public function actionBuyTicket($flight_id, $passangers)
    {
        for ($i = 1; $i <= $passangers; $i++) {
            $tickets[$i] = new TicketBuilder;
        }

        $currentPassanger = 0;
        if ($this->request->isPost) {
            $currentPassanger = $_POST['TicketBuilder']['currentPassanger'];
            if ($currentPassanger == $passangers) {
                return $this->redirect(['pay']);
            }
            if ($currentPassanger == 0) {
                $receipt = new Receipt();
                $receipt->purchaseDate = date('Y/m/d H:i:s');
                $receipt->total = 0;
                $receipt->status = 'Pending';
                $receipt->save();
            } else {
                $receipt = Receipt::findOne([$_POST['TicketBuilder']['receipt_id']]);
            }
            if ($tickets[$currentPassanger + 1]->load($this->request->post()) && $tickets[$currentPassanger + 1]->generateTicket($receipt->id)) {
                $currentPassanger++;
            }
        }

        $temp = Config::find()
            ->select(['weight', 'price'])
            ->where('active = 1')
            ->all();

        foreach ($temp as $t) {
            $config[] = $t->weight . 'kg | ' . $t->price . '€';
        }
        return $this->render('passanger', [
            'ticket' => $tickets[$currentPassanger + 1],
            'config' => $config,
            'flight' => Flight::findOne([$flight_id]),
            'receipt_id' => $receipt->id,
            'currentPassanger' => $currentPassanger,
        ]);
    }




    protected function findModel($id)
    {
        if (($model = Ticket::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
