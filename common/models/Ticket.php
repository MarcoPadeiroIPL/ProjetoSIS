<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tickets".
 *
 * @property int $id
 * @property string $fName
 * @property string $surname
 * @property string $gender
 * @property int $age
 * @property int|null $checkedIn
 * @property int $client_id
 * @property int $flight_id
 * @property string $seatLinha
 * @property int $seatCol
 * @property int|null $luggage_1
 * @property int|null $luggage_2
 * @property int $receipt_id
 *
 * @property Employees $checkedIn0
 * @property Clients $client
 * @property Flights $flight
 * @property Configs $luggage1
 * @property Configs $luggage2
 * @property Receipts $receipt
 */
class Ticket extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tickets';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fName', 'surname', 'gender', 'age', 'client_id', 'flight_id', 'seatLinha', 'seatCol', 'receipt_id'], 'required'],
            [['gender'], 'string'],
            [['age', 'checkedIn', 'client_id', 'flight_id', 'seatCol', 'luggage_1', 'luggage_2', 'receipt_id'], 'integer'],
            [['fName', 'surname'], 'string', 'max' => 25],
            [['seatLinha'], 'string', 'max' => 1],
            [['client_id'], 'exist', 'skipOnError' => true, 'targetClass' => Clients::class, 'targetAttribute' => ['client_id' => 'user_id']],
            [['checkedIn'], 'exist', 'skipOnError' => true, 'targetClass' => Employees::class, 'targetAttribute' => ['checkedIn' => 'user_id']],
            [['flight_id'], 'exist', 'skipOnError' => true, 'targetClass' => Flights::class, 'targetAttribute' => ['flight_id' => 'id']],
            [['luggage_1'], 'exist', 'skipOnError' => true, 'targetClass' => Configs::class, 'targetAttribute' => ['luggage_1' => 'id']],
            [['luggage_2'], 'exist', 'skipOnError' => true, 'targetClass' => Configs::class, 'targetAttribute' => ['luggage_2' => 'id']],
            [['receipt_id'], 'exist', 'skipOnError' => true, 'targetClass' => Receipts::class, 'targetAttribute' => ['receipt_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fName' => 'F Name',
            'surname' => 'Surname',
            'gender' => 'Gender',
            'age' => 'Age',
            'checkedIn' => 'Checked In',
            'client_id' => 'Client ID',
            'flight_id' => 'Flight ID',
            'seatLinha' => 'Seat Linha',
            'seatCol' => 'Seat Col',
            'luggage_1' => 'Luggage 1',
            'luggage_2' => 'Luggage 2',
            'receipt_id' => 'Receipt ID',
        ];
    }

    /**
     * Gets query for [[CheckedIn0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCheckedIn0()
    {
        return $this->hasOne(backend\models\Employee::class, ['user_id' => 'checkedIn']);
    }

    /**
     * Gets query for [[Client]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getClient()
    {
        return $this->hasOne(Client::class, ['user_id' => 'client_id']);
    }

    /**
     * Gets query for [[Flight]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFlight()
    {
        return $this->hasOne(Flight::class, ['id' => 'flight_id']);
    }

    /**
     * Gets query for [[Luggage1]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLuggage1()
    {
        return $this->hasOne(Config::class, ['id' => 'luggage_1']);
    }

    /**
     * Gets query for [[Luggage2]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLuggage2()
    {
        return $this->hasOne(Config::class, ['id' => 'luggage_2']);
    }

    /**
     * Gets query for [[Receipt]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReceipt()
    {
        return $this->hasOne(Receipt::class, ['id' => 'receipt_id']);
    }
}
