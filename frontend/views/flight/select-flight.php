<?php

use common\models\Flight;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Flights';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="flight-index">
    <?php if (count($flights) == 0) { ?>
        <h1>There are no flights available from <?= $airportDeparture->city ?> to <?= $airportArrival->city ?></h1>
    <?php } else { ?>
        <h1>Select one flight!</h1>
        <div class="container">
            <div class="row" style="height: 40vh;">
                <div class="col-3 shadow m-3" style="overflow-y:auto; ">
                    <div class="row w-100 p-3">
                        <div class="col-2">ID</div>
                        <div class="col-8">Departure Date</div>
                        <div class="col-2">Price</div>
                    </div>
                    <?php Html::a('nigger', ['selectFlight']) ?>
                    <?php foreach ($flights as $flight) { ?>
                        <?= Html::a('
                        <div class="row w-100 p-3" style="cursor: pointer;">
                            <div class="col-2">' .  $flight->id  . '</div>
                            <div class="col-8">' .  $flight->departureDate  . '</div>
                            <div class="col-2">' .  $flight->activeTariff()->economicPrice  . '€</div>
                        </div>
                        ', [
                            'flight/select-flight',
                            'airportDeparture_id' => $flight->airportDeparture->id,
                            'airportArrival_id' => $flight->airportArrival->id,
                            'selectedFlight' => $flight->id
                        ]); ?>
                    <?php } ?>
                </div>

                <div class="col m-3">
                    <div class="row h2 d-flex justify-content-center">
                        <?= $selectedFlight->airportDeparture->city . " -> " . $selectedFlight->airportArrival->city . " | " . $selectedFlight->departureDate   ?>
                    </div>
                    <div class="row" style="height: 40vh;">
                        <div class="col m-5 shadow rounded bg-secondary text-white">
                            <div class="row">
                                <span class="fs-1 p-3 text-center">ECONOMIC</span>
                            </div>
                            <div class="row">
                                <ul>
                                    <li class="fs-3 text-center">Choose Economic seat</li>
                                </ul>
                            </div>
                            <div class="row d-flex justify-content-center">
                                <a class='btn border w-75 fs-1 text-white' href="ticket/chooseSeat">
                                    <?= $selectedFlight->activeTariff()->economicPrice?>€
                                </a>
                            </div>
                        </div>
                        <div class="col m-5 shadow rounded bg-info text-white">
                            <div class="row">
                                <span class="fs-1 p-3 text-center">NORMAL</span>
                            </div>
                            <div class="row">
                                <ul>
                                    <li class="fs-3 text-center">Choose Normal seat</li>
                                    <li class="fs-3 text-center">One bag of 10kg included</li>
                                    <li class="fs-3 text-center">Refundable</li>
                                </ul>
                            </div>
                            <div class="row d-flex justify-content-center">
                                <a class='btn border w-75 fs-1 text-white' href="ticket/chooseSeat">
                                    <?= $selectedFlight->activeTariff()->normalPrice ?>€
                                </a>
                            </div>
                        </div>
                        <div class="col m-5 shadow border bg-warning text-white">
                            <div class="row">
                                <span class="fs-1 p-3 text-center">LUXURY</span>
                            </div>
                            <div class="row">
                                <ul>
                                    <li class="fs-3 text-center">Choose Luxury seat</li>
                                    <li class="fs-3 text-center">One bag of 20kg included</li>
                                    <li class="fs-3 text-center">Refundable</li>
                                </ul>
                            </div>
                            <div class="row d-flex justify-content-center">
                                <a class='btn border w-75 fs-1 text-white' href="ticket/chooseSeat">
                                    <?= $selectedFlight->activeTariff()->luxuryPrice ?>€
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>


</div>
