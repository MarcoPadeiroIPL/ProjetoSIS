<?php

namespace backend\modules\api\controllers;

use yii\rest\ActiveController;
use backend\modules\api\components\CustomAuth;
use common\models\Ticket;
use common\models\Flight;
use common\models\Receipt;
use common\models\Client;
use Exception;

use PhpMqtt\Client\MqttClient;

class TicketController extends ActiveController
{
    public $modelClass = 'common\models\Ticket';

    public function behaviors()
    {
        \Yii::$app->params['id'] = 0;
        \Yii::$app->params['role'] = null;
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

        unset($actions['view'], $actions['create']);

        return $actions;
    }


    public function sendTickets()
    {
        $tickets = Ticket::find()->where(['client_id' => \Yii::$app->params['id']])
            ->with('tariff')
            ->with('flight')
            ->with('flight.airplane')
            ->with('flight.airportDeparture')
            ->with('flight.airportArrival')
            ->with('receipt')
            ->all();

        return $tickets ? $tickets : throw new \yii\web\NotFoundHttpException(sprintf('No tickets were found'));
    }
    public function actionView($id)
    {
        $ticket = Ticket::find()->where(['id' => $id])
            ->with('tariff')
            ->with('flight')
            ->with('receipt')
            ->one();

        if ($ticket)
            $this->checkAccess('view', $ticket);

        return $ticket ? $ticket : throw new \yii\web\NotFoundHttpException(sprintf('No tickets were found'));
    }

    public function actionCreate()
    {
        $model = new $this->modelClass;

        $receipt = new Receipt();
        $receipt->purchaseDate = date('Y-m-d H:i:s');
        $receipt->total = 0;
        $receipt->status = 'Pending';
        $receipt->client_id = \Yii::$app->params['id'];

        if (!$receipt->save())
            throw new \yii\web\ServerErrorHttpException(sprintf('There was an unexpected error while saving'));

        if ($this->request->isPost) {
            // $model->load nao funciona por algum motivo
            $model->fName = $_POST['fName'];
            $model->surname = $_POST['surname'];
            $model->age = $_POST['age'];
            $model->gender = $_POST['gender'];
            $model->seatLinha = $_POST['seatLinha'];
            $model->seatCol = $_POST['seatCol'];
            $flight = Flight::findOne([$_POST['flight_id']]);
            $model->tariffType = $_POST['tariffType'];

            $model->flight_id = $flight->id;
            $model->tariff_id = $flight->activeTariff()->id;
            $model->receipt_id = $receipt->id;
            $model->client_id = $receipt->client_id;

            if ($flight->status != 'Available')
                throw new \yii\web\BadRequestHttpException(sprintf('Flight is not available'));

            if (!$flight->checkIfSeatAvailable($model->seatCol, $model->seatLinha))
                throw new \yii\web\BadRequestHttpException(sprintf('Seats are already taken!'));



            if ($model->save()) {
                return $this->asJson(['name' => 'Success', 'message' => 'Ticket created successfully', 'code' => 200, 'status' => 200]);
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
        } catch (Exception $ex) {
            throw new \yii\web\NotFoundHttpException(sprintf('Ticket not found'));
        }

        $this->checkAccess('pay', $model);

        $receipt = Receipt::findOne([$model->receipt_id]);
        $client = Client::findOne([\Yii::$app->params['id']]);
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

        $this->checkAccess('checkin', $model);

        if ($model->receipt->status != 'Complete')
            throw new \yii\web\ForbiddenHttpException(sprintf('Ticket not payed for yet!'));

        if ($model->checkedIn != NULL)
            throw new \yii\web\ForbiddenHttpException(sprintf('Ticket already checked in!'));

        $model->checkedIn = \Yii::$app->params['id'];

        if (!$model->save())
            throw new \yii\web\ServerErrorHttpException(sprintf('There was an error while trying to checkin!'));

        try {
            $client = new MqttClient('127.0.0.1', 1883, 'balance-req');
            $client->connect();
            $client->publish($model->client_id, 'ticket', 1);
            $client->disconnect();
        } catch (Exception $ex) {
            throw new \yii\web\ServerErrorHttpException('There was an error while sending the message');
        }
        return $this->asJson(['name' => 'Success', 'message' => 'Ticket checkedin successfully', 'code' => 200, 'status' => 200]);
    }

    public function checkAccess($action, $model = null, $params = [])
    {
        return \Yii::$app->params['role'];
        if ($action == 'checkin' && \Yii::$app->params['role'] !== 'client')
            return true;
        if ($action !== 'create' && $action !== 'index' && $model->client_id != \Yii::$app->params['id'])
            throw new \yii\web\ForbiddenHttpException(sprintf('You only can manage your tickets'));
    }
}
