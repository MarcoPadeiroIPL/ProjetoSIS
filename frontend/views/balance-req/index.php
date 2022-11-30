<?php

use common\models\BalanceReq;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Balance Reqs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="balance-req-index">

    <h1>My balance: <?=  $client->balance ?>€</h1>
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


</div>
