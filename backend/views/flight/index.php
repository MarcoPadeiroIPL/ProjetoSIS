<?php

use common\models\Flight;
use backend\helpers\TableBuilder;
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

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Flight', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php
    $header = [
        'nome' => 'Nome',
        'dorme' => 'Dorme',
        'home' => 'Home',
        'fome' => 'Fome',
    ];
    $array = [
        [
            'nome' => 'arroz',
            'dorme' => 'asd',
            'fome' => 'asd',
            'come' => 'asdasd',
        ],
        [
            'nome' => 'skalfh',
            'dorme' => 'adsf',
            'fome' => 'asd',
            'come' => 'asd',
        ],
        [
            'nome' => 'skalfh',
            'dorme' => 'adsf',
            'fome' => 'asd',
            'come' => 'asd',
        ],
    ];
    $tableBuilder = new TableBuilder($header, $array);
    $tableBuilder->generate();


    ?>
    <!--
    GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'departureDate',
            'arrivalDate',
            'airplane_id',
            'airportDeparture_id',
            //'airportArrival_id',
            //'status',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Flight $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
        ],
    ]);
-->


</div>
