<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "flights".
 *
 * @property int $id
 * @property string $departureDate
 * @property string $arrivalDate
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
            [['departureDate', 'arrivalDate', 'airplane_id', 'airportDeparture_id', 'airportArrival_id'], 'required'],
            [['departureDate', 'arrivalDate'], 'safe'],
            [['airplane_id', 'airportDeparture_id', 'airportArrival_id'], 'integer'],
            [['status'], 'string'],
            [['airplane_id'], 'exist', 'skipOnError' => true, 'targetClass' => Airplanes::class, 'targetAttribute' => ['airplane_id' => 'id']],
            [['airportArrival_id'], 'exist', 'skipOnError' => true, 'targetClass' => Airports::class, 'targetAttribute' => ['airportArrival_id' => 'id']],
            [['airportDeparture_id'], 'exist', 'skipOnError' => true, 'targetClass' => Airports::class, 'targetAttribute' => ['airportDeparture_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'departureDate' => 'Departure Date',
            'arrivalDate' => 'Arrival Date',
            'airplane_id' => 'Airplane ID',
            'airportDeparture_id' => 'Airport Departure ID',
            'airportArrival_id' => 'Airport Arrival ID',
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
        return $this->hasOne(Airplanes::class, ['id' => 'airplane_id']);
    }

    /**
     * Gets query for [[AirportArrival]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAirportArrival()
    {
        return $this->hasOne(Airports::class, ['id' => 'airportArrival_id']);
    }

    /**
     * Gets query for [[AirportDeparture]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAirportDeparture()
    {
        return $this->hasOne(Airports::class, ['id' => 'airportDeparture_id']);
    }

    /**
     * Gets query for [[Tariffs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTariffs()
    {
        return $this->hasMany(Tariffs::class, ['flight_id' => 'id']);
    }

    /**
     * Gets query for [[Tickets]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTickets()
    {
        return $this->hasMany(Tickets::class, ['flight_id' => 'id']);
    }
}
