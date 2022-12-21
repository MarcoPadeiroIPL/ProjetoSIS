<?php

use common\models\BalanceReq;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;



/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

?>
<div class="balance-req-index">
    <div class="gtco-section">
        <div class="gtco-container">
            <div class="row">
                <div class="col-4 text-center align-self-center">
                    <h1>My balance:</h1>
                    <h1><?= $client->balance ?>€</h1>
                    <?= Html::a('Create Balance Req', ['create'], ['class' => 'btn btn-success']) ?>
                </div>
                <div class="col">
                    <div class="row">
                        <div class="col-6">
                            <h2>Current balance requests</h2>
                        </div>
                        <div class=" col">
                            <h2 class="text-right"><a href="history">View history</a></h2>
                        </div>
                    </div>

<<<<<<< HEAD
    <h1>My balance: <?= $client->balance ?>€</h1>
    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a('Create Balance Req', ['create'], ['class' => 'btn btn-success']) ?>
    </p>




    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'amount',
            'status',
            'requestDate',
            'decisionDate',
            //'client_id',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, BalanceReq $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>
=======
                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],
                            'amount',
                            'status',
                            'requestDate',
                            //'client_id', 
                            [
                                'class' => ActionColumn::className(),
                                'template' => '{view} {delete}',
>>>>>>> frontend

                            ], 
                            
                           
                        ],
                    ]); ?>
                </div>
            </div>
        </div>
    </div>

</div>
</div>