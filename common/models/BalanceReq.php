<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "balanceReq".
 *
 * @property int $id
 * @property float $amount
 * @property string $status
 * @property string $requestDate
 * @property string|null $decisionDate
 * @property int $client_id
 *
 * @property BalanceReqEmployee $balanceReqEmployee
 * @property User $client
 */
class BalanceReq extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'balanceReq';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['amount', 'requestDate', 'client_id'], 'required'],
            [['amount'], 'number'],
            [['status'], 'string'],
            [['requestDate', 'decisionDate'], 'safe'],
            [['client_id'], 'integer'],
            [['client_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['client_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'amount' => 'Amount',
            'status' => 'Status',
            'requestDate' => 'Request Date',
            'decisionDate' => 'Decision Date',
            'client_id' => 'Client ID',
        ];
    }

    /**
     * Gets query for [[BalanceReqEmployee]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBalanceReqEmployee()
    {
        return $this->hasOne(BalanceReqEmployee::class, ['balanceReq_id' => 'id']);
    }

    /**
     * Gets query for [[Client]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getClient()
    {
        return $this->hasOne(User::class, ['id' => 'client_id']);
    }

    public function setStatus($status)
    {
        $this->status = $status;
        $this->decisionDate = date('Y-m-d H:i:s');
        return $this->save();
    }
}
