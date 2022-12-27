<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use common\models\User;
use common\models\Client;
use common\models\Ticket;

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
    public $flight_id;
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
            [['fName', 'surname', 'gender', 'age', 'client_id', 'flight_id', 'seatLinha', 'seatCol'], 'required'],
        ];
    }

    /**
     * Signs user up.
     *
     * @return bool whether the creating new account was successful and email was sent
     */
    public function generateTicket($receipt_id)
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
        $ticket->flight_id = $this->flight_id;
        $ticket->seatLinha = $this->seatLinha;
        $ticket->seatCol = $this->seatCol;
        $ticket->luggage_1 = $this->luggage_1;
        $ticket->luggage_2 = $this->luggage_2;
        $ticket->receipt_id = $receipt->id;
        

        return $ticket->save();
    }
}
