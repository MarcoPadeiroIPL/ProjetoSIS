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

    <div class="d-flex m-2 justify-content-end">
        <?= Html::a('+ Create Flight', ['create'], ['class' => 'btn btn-dark']) ?>
    </div>

    <?php
    $headers = [
        [
            'label' => '#',
            'attr' => 'id',
            'class' => 'text-start',
        ],
        [
            'label' => 'Airplane Id',
            'attr' => 'airplane_id',
            'class' => 'text-center',
        ],
        [
            'label' => 'Departure Date',
            'attr' => 'departureDate',
            'class' => 'text-center',
        ],
        [
            'label' => 'Arrival Date',
            'attr' => 'arrivalDate',
            'class' => 'text-center',
        ],
        [
            'label' => 'Airport Departure Id',
            'attr' => 'airportDeparture_id',
            'class' => 'text-center',
        ],
        [
            'label' => 'Airport Arrival',
            'attr' => 'airportArrival_id',
            'class' => 'text-center',
        ],
        [
            'label' => 'Status',
            'attr' => 'status',
            'class' => 'text-center',
        ],
    ];
    $tableBuilder = new TableBuilder($headers, $model);
    $tableBuilder->generate();

    ?>


</div>
