<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "employees".
 *
 * @property int $user_id
 * @property float $salary
 * @property int|null $airport_id
 *
 * @property Airports $airport
 * @property Tickets[] $tickets
 * @property User $user
 */
class Employee extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'employees';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'salary'], 'required'],
            [['user_id', 'airport_id'], 'integer'],
            [['salary'], 'number'],
            [['user_id'], 'unique'],
            [['airport_id'], 'exist', 'skipOnError' => true, 'targetClass' => Airports::class, 'targetAttribute' => ['airport_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'salary' => 'Salary',
            'airport_id' => 'Airport ID',
        ];
    }

    /**
     * Gets query for [[Airport]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAirport()
    {
        return $this->hasOne(Airports::class, ['id' => 'airport_id']);
    }

    /**
     * Gets query for [[Tickets]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTickets()
    {
        return $this->hasMany(Tickets::class, ['checkedIn' => 'user_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }
}
