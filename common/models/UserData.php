<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "userData".
 *
 * @property int $user_id
 * @property string $fName
 * @property string $surname
 * @property string $birthdate
 * @property string $phone
 * @property string $nif
 * @property string $gender
 * @property string $accCreationDate
 *
 * @property User $user
 */
class UserData extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'userData';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'fName', 'surname', 'birthdate', 'phone', 'nif', 'gender', 'accCreationDate'], 'required'],
            [['user_id'], 'integer'],
            [['birthdate', 'accCreationDate'], 'safe'],
            [['gender'], 'string'],
            [['fName', 'surname'], 'string', 'max' => 25],
            [['phone', 'nif'], 'string', 'max' => 9],
            [['phone'], 'unique'],
            [['nif'], 'unique'],
            [['user_id'], 'unique'],
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
            'fName' => 'First Name',
            'surname' => 'Surname',
            'birthdate' => 'Birthdate',
            'phone' => 'Phone',
            'nif' => 'NIF',
            'gender' => 'Gender',
            'accCreationDate' => 'Acc Creation Date',
        ];
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
