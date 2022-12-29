<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use common\models\Ticket;
use common\models\Receipt;

/**
 * Signup form
 */
class TicketBuilder extends Model
{

    public $fName;
    public $surname;
    public $gender;
    public $age;
    public $client_id;
    public $receipt_id;
    public $seatLinha;
    public $seatCol;
    public $luggage_1;
    public $luggage_2;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fName', 'surname', 'gender', 'age', 'client_id', 'seatLinha', 'seatCol'], 'required'],
        ];
    }

    public function generateTicket($receipt_id, $flight, $tariffType)
    {
        if (!$this->validate()) {
            return false;
        }

        $ticket = new Ticket();
        $ticket->fName = $this->fName;
        $ticket->surname = $this->surname;
        $ticket->gender = $this->gender;
        $ticket->age = $this->age;
        $ticket->checkedIn = null;
        $ticket->client_id = $this->client_id;
        $ticket->flight_id = $flight->id;
        $ticket->seatLinha = $this->seatLinha;
        $ticket->seatCol = $this->seatCol;
        $ticket->luggage_1 = $this->luggage_1;
        $ticket->luggage_2 = $this->luggage_2;
        $ticket->tariff_id = $flight->activeTariff()->id;
        $ticket->tariffType = $tariffType;
        $ticket->receipt_id = $receipt_id;

        $receipt = Receipt::findOne([$receipt_id]);

        return $ticket->save() && $receipt->refreshTotal();
    }
}
