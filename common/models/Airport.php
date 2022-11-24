<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "airports".
 *
 * @property int $id
 * @property string $country
 * @property string $code
 * @property string $city
 * @property int $search
 * @property string $status
 *
 * @property Employees[] $employees
 * @property Flights[] $flights
 * @property Flights[] $flights0
 */
class Airport extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'airports';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['country', 'code', 'city', 'search', 'status'], 'required'],
            [['search'], 'integer'],
            [['status'], 'string'],
            [['country', 'city'], 'string', 'max' => 50],
            [['code'], 'string', 'max' => 2],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'country' => 'Country',
            'code' => 'Code',
            'city' => 'City',
            'search' => 'Search',
            'status' => 'Status',
        ];
    }

    /**
     * Gets query for [[Employees]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEmployees()
    {
        return $this->hasMany(Employees::class, ['airport_id' => 'id']);
    }

    /**
     * Gets query for [[Flights]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFlights()
    {
        return $this->hasMany(Flights::class, ['airportArrival_id' => 'id']);
    }

    /**
     * Gets query for [[Flights0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFlights0()
    {
        return $this->hasMany(Flights::class, ['airportDeparture_id' => 'id']);
    }
}
