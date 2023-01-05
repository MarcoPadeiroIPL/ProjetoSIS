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
?>
<div class="flight-index mt-5">
    <?= Html::a('<i class="fa-solid fa-arrow-left"></i> Go back', ['flight/select-airport']) ?>
    <?php if (count($flights) == 0) { ?>
        <h1>There are no flights available from <?= $airportDeparture->city ?> to <?= $airportArrival->city ?></h1>
    <?php } else { ?>
        <h1>Select one flight!</h1>
        <div class="container">
            <div class="row" style="height: 40vh;">
                <div class="col-3 shadow m-3" style="overflow-y:auto; ">
                    <div class="row w-100 p-3">
                        <div class="col-8">Departure Date</div>
                        <div class="col"></div>
                        <div class="col">Price</div>
                    </div>
                    <?php foreach ($flights as $flight) { ?>
                        <div class="row w-100 p-3" style="cursor: pointer;" id="select<?= $flight->id ?>" onclick="changeActive(<?= $flight->id . ', ' . $flight->activeTariff()->economicPrice . ', ' . $flight->activeTariff()->normalPrice . ', ' . $flight->activeTariff()->luxuryPrice ?>)">
                            <div class="col-8"><?= $flight->departureDate ?></div>
                            <div class="col"></div>
                            <div class="col"><?= $flight->activeTariff('economic') ?>€</div>
                        </div>
                    <?php } ?>
                </div>

                <div class="col m-3">
                    <div class="row" style="height: 40vh;">
                        <div class="col m-5 shadow rounded bg-secondary text-white">
                            <div class="row">
                                <span class="fs-1 p-3 text-center">ECONOMIC</span>
                            </div>
                            <div class="row m-4">
                                <ul>
                                    <li class="fs-3">Choose Economic seat</li>
                                </ul>
                            </div>
                            <div class="row d-flex align-items-end justify-content-center">
                                <?= Html::a('€', ['/ticket/create', 'flight_id' => $flights[0]->id, 'tariffType' => 'economic', 'receipt_id' => $receipt_id], ['id' => 'economicPrice', 'class' => 'btn border w-75 fs-1 text-white']); ?>
                            </div>
                        </div>
                        <div class="col m-5 shadow rounded bg-info text-white">
                            <div class="row">
                                <span class="fs-1 p-3 text-center">NORMAL</span>
                            </div>
                            <div class="row m-4">
                                <ul>
                                    <li class="fs-3">Choose Normal seat</li>
                                    <li class="fs-3">One bag of 10kg included</li>
                                    <li class="fs-3">Refundable</li>
                                </ul>
                            </div>
                            <div class="row d-flex justify-content-center">
                                <?= Html::a('€', ['/ticket/create', 'flight_id' => $flights[0]->id, 'tariffType' => 'normal', 'receipt_id' => $receipt_id], ['id' => 'normalPrice', 'class' => 'btn border w-75 fs-1 text-white']); ?>
                            </div>
                        </div>
                        <div class="col m-5 shadow border bg-warning text-white">
                            <div class="row">
                                <span class="fs-1 p-3 text-center">LUXURY</span>
                            </div>
                            <div class="row m-4">
                                <ul>
                                    <li class="fs-3">Choose Luxury seat</li>
                                    <li class="fs-3">One bag of 20kg included</li>
                                    <li class="fs-3">Refundable</li>
                                </ul>
                            </div>
                            <div class="row d-flex justify-content-center">
                                <?= Html::a('€', ['/ticket/create', 'flight_id' => $flights[0]->id, 'tariffType' => 'luxury', 'receipt_id' => $receipt_id], ['id' => 'luxuryPrice', 'class' => 'btn border w-75 fs-1 text-white']); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>


        </div>
        <script>
            oldSelect = null;
            function changeActive(flight_id, economicPrice, normalPrice, luxuryPrice) {
                $("#economicPrice").text(economicPrice + '€');
                $("#economicPrice").attr('href', '../ticket/buy-ticket?flight_id=' + flight_id + '&tariff=economic');
                $("#normalPrice").text(normalPrice + '€');
                $("#normalPrice").attr('href', '../ticket/buy-ticket?flight_id=' + flight_id + '&tariff=normal');
                $("#luxuryPrice").text(luxuryPrice + '€');
                $("#luxuryPrice").attr('href', '../ticket/buy-ticket?flight_id=' + flight_id + '&tariff=luxury');
                $('#select' + flight_id).addClass('bg-info text-white');
                $('#select' + oldSelect).removeClass('bg-info text-white');
                oldSelect = flight_id;
            }
            window.onload = function() {
                changeActive(<?= $closestFlight->id . ', ' . $closestFlight->activeTariff('economic') . ', ' . $closestFlight->activeTariff('normal') . ', ' . $closestFlight->activeTariff('luxury') ?>);
            }
        </script>
