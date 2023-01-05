<?php

use common\models\Ticket;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Tickets - Airbender';
?>
<div class="ticket-index">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'label' => 'Full name',
                'value' => function ($model) {
                    return $model->fName . ' ' . $model->surname;
                }
            ],
            'fName',
            'surname',
            'gender',
            'age',
            'checkedIn',
            [
                'label' => 'Client',
                'format' => 'raw',
                'value' => function ($model) {
                    return Html::a($model->client->user->username, ['client/view', 'id' => $model->client->user->id]);
                }
            ],
            [
                'label' => 'Flight',
                'format' => 'raw',
                'value' => function ($model) {
                    return Html::a($model->flight->airportDeparture->code . ' - ' . $model->flight->airportArrival->code, ['flight/view', 'id' => $model->flight->id]);
                }
            ],
            [
                'label' => 'Seat',
                'value' => function ($model) {
                    return $model->seatLinha . '-' . $model->seatCol;
                }
            ],
            [
                'label' => 'Luggage 1',
                'format' => 'raw',
                'value' => function ($model) {
                    return is_null($model->luggageOne) ? 'None' : Html::a($model->luggageOne->description, ['config/view', 'id' => $model->luggageOne->id]);
                }
            ],
            [
                'label' => 'Luggage 2',
                'format' => 'raw',
                'value' => function ($model) {
                    return is_null($model->luggageTwo) ? 'None' : Html::a($model->luggageTwo->description, ['config/view', 'id' => $model->luggageTwo->id]);
                }
            ],
            'receipt_id',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Ticket $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>


</div>
