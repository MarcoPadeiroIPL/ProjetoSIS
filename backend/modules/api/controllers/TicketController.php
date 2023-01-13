<?php

namespace backend\modules\api\controllers;

use yii\rest\ActiveController;
use backend\modules\api\components\CustomAuth;
use common\models\Receipt;
use common\models\Client;
use common\models\Flight;
use Exception;

class TicketController extends ActiveController
{
    public $modelClass = 'common\models\Ticket';

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => CustomAuth::class,
            'auth' => [$this, 'authCustom'],
        ];
        return $behaviors;
    }

    public function actions()
    {
        $actions = parent::actions();

        $actions['index']['prepareDataProvider'] = [$this, 'sendTickets'];

        unset($actions['create']);

        return $actions;
    }


    public function sendTickets()
    {
        $tickets = Client::findOne([\Yii::$app->user->id])->tickets;

        foreach($tickets as $ticket) {
            $ticket = $ticket['attributes'];
            $ticket = $ticket->flight;
        }

        return $tickets;
    }

    public function actionCreate()
    {
        $model = new $this->modelClass;

        $receipt = new Receipt();
        $receipt->purchaseDate = date('Y-m-d H:i:s');
        $receipt->total = 0;
        $receipt->status = 'Pending';
        $receipt->client_id = \Yii::$app->user->id;

        if (!$receipt->save())
            throw new \yii\web\ServerErrorHttpException(sprintf('There was an unexpected error while saving'));

        if ($this->request->isPost) {
            $model->fName = $_POST['fName'];
            $model->surname = $_POST['surname'];
            $model->age = $_POST['age'];
            $model->gender = $_POST['gender'];
            $model->seatLinha = $_POST['seatLinha'];
            $model->seatCol = $_POST['seatCol'];
            $model->flight_id = $_POST['flight_id'];
            $model->tariffType = $_POST['tariffType'];
            $model->tariff_id = Flight::findOne([$model->flight_id])->activeTariff()->id;
            $model->receipt_id = $receipt->id;
            $model->client_id = \Yii::$app->user->id;
            if ($model->save()) {
                $data = ['name' => 'Success', 'message' => 'Ticket created successfully', 'code' => 200, 'status' => 200];
                \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                \Yii::$app->response->statusCode = $data['status'];
                \Yii::$app->response->data = ['success' => true, 'data' => $data];
                return;
            } else {
                throw new \yii\web\BadRequestHttpException(sprintf('Bad request'));
            }
        } else
            throw new \yii\web\BadRequestHttpException(sprintf('Bad request'));
    }

    public function actionPay()
    {
        if (!isset($_POST['ticket_id']))
            throw new \yii\web\BadRequestHttpException(sprintf('ticket_id is neccessary!'));

        try {
            $model = $this->modelClass::findOne([$_POST['ticket_id']]);
            $this->checkAccess('pay', $model);
        } catch (Exception $ex) {
            throw new \yii\web\NotFoundHttpException(sprintf('Ticket not found'));
        }

        $receipt = Receipt::findOne([$model->receipt_id]);
        $client = Client::findOne([\Yii::$app->user->id]);
        $receipt->refreshTotal();

        // verificar se a fatura ja nao foi paga
        if ($receipt->status == "Complete")
            throw new \yii\web\ForbiddenHttpException(sprintf('Ticket already paid for'));
        if (($client->application ? $receipt->total - $receipt->total * 0.05 : $receipt->total) > $client->balance)
            throw new \yii\web\ForbiddenHttpException(sprintf('Not enough money to pay for the ticket'));


        // descontar da conta do cliente dependendo se tem aplicacao ou nao
        $client->balance -= $client->application ? $receipt->total - $receipt->total * 0.05 : $receipt->total;

        // modificar o status da fatura
        $receipt->status = "Complete";
        $receipt->purchaseDate = date('Y-m-d H:i:s');

        $receipt->updateTicketPrices();

        // avisar o cliente se conseguiu guardar ou nao 
        if (!$client->save() || !$receipt->save())
            throw new \yii\web\ServerErrorHttpException(sprintf('There was an unexpected error while saving'));

        return $this->asJson(['name' => 'Success', 'message' => 'Ticket bought successfully', 'code' => 200, 'status' => 200]);
    }

    public function actionCheckin()
    {
        if (!isset($_POST['ticket_id']))
            throw new \yii\web\BadRequestHttpException(sprintf('ticket_id is neccessary!'));

        try {
            $model = $this->modelClass::findOne([$_POST['ticket_id']]);
        } catch (Exception $ex) {
            throw new \yii\web\NotFoundHttpException(sprintf('Ticket not found'));
        }

        if (\Yii::$app->user->identity->authAssignment->item_name == 'client')
            throw new \yii\web\ForbiddenHttpException(sprintf('You cannot checkin tickets'));


        if ($model->receipt->status != 'Complete')
            throw new \yii\web\ForbiddenHttpException(sprintf('Ticket not payed for yet!'));

        $model->checkedIn = \Yii::$app->user->identity->getId();


        if (!$model->save())
            throw new \yii\web\ServerErrorHttpException(sprintf('There was an error while trying to checkin!'));

        $data = ['name' => 'Success', 'message' => 'Ticket checkedin successfully', 'code' => 200, 'status' => 200];
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        \Yii::$app->response->statusCode = $data['status'];
        \Yii::$app->response->data = ['success' => true, 'data' => $data];
        return;
    }

    public function checkAccess($action, $model = null, $params = [])
    {
        if ($action !== 'create' && $action !== 'index' && $model->client_id !== \Yii::$app->user->id)
            throw new \yii\web\ForbiddenHttpException(sprintf('You only can view your tickets'));
    }
}
