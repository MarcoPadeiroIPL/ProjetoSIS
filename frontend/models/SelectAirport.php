<?php

namespace frontend\models;

use Yii;
use yii\base\Model;

class SelectAirport extends Model
{
    public $airportDeparture_id;
    public $airportArrival_id;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['airportDeparture_id', 'required'],

            ['airportArrival_id', 'required'],

        ];
    }
}
