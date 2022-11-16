<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tariffs".
 *
 * @property int $id
 * @property string $startDate
 * @property float $economicPrice
 * @property float $normalPrice
 * @property float $luxuryPrice
 * @property int $flight_id
 * @property int $active
 *
 * @property Flights $flight
 */
class Tariff extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tariffs';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['startDate', 'economicPrice', 'normalPrice', 'luxuryPrice', 'flight_id', 'active'], 'required'],
            [['startDate'], 'safe'],
            [['economicPrice', 'normalPrice', 'luxuryPrice'], 'number'],
            [['flight_id', 'active'], 'integer'],
            [['flight_id'], 'exist', 'skipOnError' => true, 'targetClass' => Flights::class, 'targetAttribute' => ['flight_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'startDate' => 'Start Date',
            'economicPrice' => 'Economic Price',
            'normalPrice' => 'Normal Price',
            'luxuryPrice' => 'Luxury Price',
            'flight_id' => 'Flight ID',
            'active' => 'Active',
        ];
    }

    /**
     * Gets query for [[Flight]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFlight()
    {
        return $this->hasOne(Flights::class, ['id' => 'flight_id']);
    }
}
