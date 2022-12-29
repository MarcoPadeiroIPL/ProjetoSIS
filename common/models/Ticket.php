<?php

namespace common\models;

use backend\models\Employee;
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
 * @property int $tariff_id
 * @property string $tariffType
 *
 * @property Employee $checkedIn0
 * @property Client $client
 * @property Flight $flight
 * @property Config $luggage1
 * @property Config $luggage2
 * @property Receipt $receipt
 * @property Tariff $tariff
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
            [['fName', 'surname', 'gender', 'age', 'client_id', 'flight_id', 'seatLinha', 'seatCol', 'receipt_id', 'tariff_id', 'tariffType'], 'required'],
            [['gender', 'tariffType'], 'string'],
            [['age', 'checkedIn', 'client_id', 'flight_id', 'seatCol', 'luggage_1', 'luggage_2', 'receipt_id', 'tariff_id'], 'integer'],
            [['fName', 'surname'], 'string', 'max' => 25],
            [['seatLinha'], 'string', 'max' => 1],
            [['client_id'], 'exist', 'skipOnError' => true, 'targetClass' => Client::class, 'targetAttribute' => ['client_id' => 'user_id']],
            [['checkedIn'], 'exist', 'skipOnError' => true, 'targetClass' => Employee::class, 'targetAttribute' => ['checkedIn' => 'user_id']],
            [['flight_id'], 'exist', 'skipOnError' => true, 'targetClass' => Flight::class, 'targetAttribute' => ['flight_id' => 'id']],
            [['luggage_1'], 'exist', 'skipOnError' => true, 'targetClass' => Config::class, 'targetAttribute' => ['luggage_1' => 'id']],
            [['luggage_2'], 'exist', 'skipOnError' => true, 'targetClass' => Config::class, 'targetAttribute' => ['luggage_2' => 'id']],
            [['receipt_id'], 'exist', 'skipOnError' => true, 'targetClass' => Receipt::class, 'targetAttribute' => ['receipt_id' => 'id']],
            [['tariff_id'], 'exist', 'skipOnError' => true, 'targetClass' => Receipt::class, 'targetAttribute' => ['receipt_id' => 'id']],
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
            'tariff_id' => 'Tariff ID',
            'tariffType' => 'Tariff Type',
        ];
    }

    /**
     * Gets query for [[CheckedIn0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCheckedIn()
    {
        return $this->hasOne(Employee::class, ['user_id' => 'checkedIn']);
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

    public function getTariff()
    {
        return $this->hasOne(Tariff::class, ['id' => 'tariff_id']);
    }

    public function isCheckedin()
    {
        if ($this->checkedIn == null)
            return false;

        // devolve o id do employee que deu checkin
        return $this->checkedIn;
    }
    public function shred()
    {
        $receipt = Receipt::findOne($this->receipt_id);

        if ($receipt->status != "Pending")
            return false;

        return $this->delete();
    }
    public function getTicketPrice()
    {
        $tariff = Tariff::findOne([$this->tariff_id]);

        switch ($this->tariffType) {
            case 'economic':
                return $tariff->economicPrice;
            case 'normal':
                return $tariff->normalPrice;
            case 'luxury':
                return $tariff->luxuryPrice;
        }
    }
}
