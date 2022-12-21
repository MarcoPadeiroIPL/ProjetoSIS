<?php

namespace common\models;

use Yii;
use common\models\Airport;
use common\models\Airplane;

/**
 * This is the model class for table "flights".
 *
 * @property int $id
 * @property string $departureDate
 * @property string $duration
 * @property int $airplane_id
 * @property int $airportDeparture_id
 * @property int $airportArrival_id
 * @property string|null $status
 *
 * @property Airplanes $airplane
 * @property Airports $airportArrival
 * @property Airports $airportDeparture
 * @property Tariffs[] $tariffs
 * @property Tickets[] $tickets
 */
class Flight extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'flights';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['departureDate', 'duration', 'airplane_id', 'airportDeparture_id', 'airportArrival_id'], 'required'],
            [['departureDate', 'duration'], 'safe'],
            [['airplane_id', 'airportDeparture_id', 'airportArrival_id'], 'integer'],
            [['status'], 'string'],
            [['airplane_id'], 'exist', 'skipOnError' => true, 'targetClass' => Airplane::class, 'targetAttribute' => ['airplane_id' => 'id']],
            [['airportArrival_id'], 'exist', 'skipOnError' => true, 'targetClass' => Airport::class, 'targetAttribute' => ['airportArrival_id' => 'id']],
            [['airportDeparture_id'], 'exist', 'skipOnError' => true, 'targetClass' => Airport::class, 'targetAttribute' => ['airportDeparture_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Flight ID',
            'airplane.id' => 'Airplane ID',
            'airportDeparture.country' => 'Departure',
            'airportArrival.country' => 'Destination',
            'departureDate' => 'Departure Date',
            'Duration' => 'Duration',
            'status' => 'Status',
        ];
    }

    /**
     * Gets query for [[Airplane]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAirplane()
    {
        return $this->hasOne(Airplane::class, ['id' => 'airplane_id']);
    }

    /**
     * Gets query for [[AirportArrival]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAirportArrival()
    {
        return $this->hasOne(Airport::class, ['id' => 'airportArrival_id']);
    }

    /**
     * Gets query for [[AirportDeparture]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAirportDeparture()
    {
        return $this->hasOne(Airport::class, ['id' => 'airportDeparture_id']);
    }

    /**
     * Gets query for [[Tariff]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTariff()
    {
        return $this->hasMany(Tariff::class, ['flight_id' => 'id']);
    }

    /**
     * Gets query for [[Ticket]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTicket()
    {
        return $this->hasMany(Ticket::class, ['flight_id' => 'id']);
    }
    public function activeTariff()
    {
        if (is_null($this->tariff)) {
            return null;
        }

        foreach ($this->tariff as $t) {
            if ($t->active) {
                return $t;
            }
        }
    }
    public function getAvailableSeats()
    {
    }
}
