<?php

namespace frontend\models;

use Yii;
use yii\base\Model;

class SelectAirport extends Model
{
    public $airportDeparture_id;
    public $airportArrival_id;
    public $departureDate = null;
    public $arrivalDate = null;
    public $passangers;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['airportDeparture_id', 'required', 'message' => 'Cannot be empty'],
            ['airportArrival_id', 'required', 'message' => 'Cannot be empty'],
            ['passangers', 'required', 'message' => 'Cannot be empty'],
        ];
    }
}
