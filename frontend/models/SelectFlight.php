<?php

namespace frontend\models;

use Yii;
use yii\base\Model;

class SelectFlight extends Model
{
    public $airportDeparture_id;
    public $airportArrival_id;
    public $departureDate;
    public $flight_id;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['flight_id', 'required'],
        ];
    }
}
