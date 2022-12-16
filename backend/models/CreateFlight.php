<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use common\models\Flight;
use common\models\Airport;
use common\models\Airplane;
use common\models\Tariff;

/**
 * Signup form
 */
class CreateFlight extends Model
{
    public $departureDate;
    public $duration;
    public $airportDeparture_id;
    public $airportArrival_id;
    public $airplane_id;
    public $status;
    public $normalPrice = 30;

    public function rules()
    {
        return [
            ['departureDate', 'required'],
            ['duration', 'required'],
            ['airportDeparture_id', 'required'],
            ['airportArrival_id', 'required'],
            ['airplane_id', 'required'],
            ['status', 'required'],
        ];
    }

    public function save()
    {
        $flight = new Flight();
        $flight->departureDate = $this->departureDate;
        $flight->duration = $this->duration;
        $flight->airportDeparture_id = $this->airportDeparture_id;
        $flight->airportArrival_id = $this->airportArrival_id;
        $flight->airplane_id = $this->airplane_id;
        $flight->status = $this->status;

        $flight->save();

        $tariff = new Tariff();

        $airportDeparureSearch = Airport::findOne($this->airportDeparture_id)->search;
        $airportArrivalSearch = Airport::findOne($this->airportArrival_id)->search;
        $airplaneSeats = Airplane::findOne($this->airplane_id)->countTotalSeats();

        $tariff->generateFirstTariff($flight->id, $this->normalPrice, $airportDeparureSearch, $airportArrivalSearch, $airplaneSeats);

        return $tariff->save();
    }
}
