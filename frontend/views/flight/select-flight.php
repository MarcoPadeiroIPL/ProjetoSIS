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
            <div class="row" style="height: 400px;">
                <div class="col-4 shadow m-3" style="overflow-y:auto; ">
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
                            'departureDate' => $flight->departureDate,
                            'selectedFlight' => $flight->id
                        ]); ?>
                    <?php } ?>
                </div>

                <div class="col shadow m-3">
                    <div class="row w-75">
                        <div class="col-4 shadow">
                            <?= $selectedFlight->activeTariff()->economicPrice ?>
                        </div>
                        <div class="col-4 shadow">
                            <?= $selectedFlight->activeTariff()->normalPrice ?>
                        </div>
                        <div class="col shadow">
                            <?= $selectedFlight->activeTariff()->luxuryPrice ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>


</div>
