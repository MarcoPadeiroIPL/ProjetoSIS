<?php

use common\models\Flight;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Flights';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="flight-index">

    <div class="d-flex m-2 justify-content-end">
        <?= Html::a('+ Create Flight', ['create'], ['class' => 'btn btn-dark']) ?>
    </div>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'airplane.id',
            [
                'label' => 'Departure',
                'value' => function ($model) {
                    return $model->airportDeparture->city . ' - '. '(' . $model->airportDeparture->country . ')';
                }
            ],
            [
                'label' => 'Destination',
                'value' => function ($model) {
                    return $model->airportArrival->city . ' - '. '(' . $model->airportArrival->country . ')';
                }
            ],
            'departureDate',
            'arrivalDate',
            'status',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Flight $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>


</div>
