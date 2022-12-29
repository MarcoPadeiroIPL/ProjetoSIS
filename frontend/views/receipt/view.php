<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use kartik\date\DatePicker;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

?>
<div class="receipt-pay">
    <div class="row mt-5">
        <div class="col m-3 shadow">
            <div class="row h1 m-5">
                <div class="col-6">Receipt #<?= $receipt->id ?></div>
                <div class="col-6 text-end">Total: <?= $receipt->total ?>€</div>
            </div>
            <?php foreach ($receipt->tickets as $ticket) { ?>
                <div class="row border-top" style="margin-left: 3%; margin-right: 3%;">
                    <div class="col-10 fw-light mt-3 mb-3" style="margin-left: 3%;">
                        <div class="row fs-3"><?= $ticket->fName . ' ' . $ticket->surname ?></div>
                        <div class="row fs-5">
                            <div class="col">Duration: <?= date('g\hi', strtotime($ticket->flight->duration)) ?></div>
                            <div class="col">Date: <?= date('d/m/y', strtotime($ticket->flight->departureDate)) ?></div>
                            <div class="col"><?= $ticket->flight->airportDeparture->city . '->' . $ticket->flight->airportArrival->city ?> </div>
                            <div class="col">Seat: <?= $ticket->seatLinha . '-' . $ticket->seatCol ?></div>
                            <div class="col">Type: <?= $ticket->tariffType ?></div>
                            <div class="col">Status: <?= $ticket->checkedIn == null ? 'Waiting checkin' : 'Checked in'?></div> 
                        </div>
                    </div>
                    <div class="col d-flex align-items-center justify-content-center">
                        <div class="col">
                            <?= Html::a('<i class="fas fa-eye" aria-hidden="true"></i>', ['ticket/view', 'id' => $ticket->id], ['class' => 'btn btn-sm p-3 btn-primary']) ?>
                            <?= Html::a('<i class="fas fa-qrcode" aria-hidden="true"></i>', ['ticket/checkin', 'id' => $ticket->id], ['class' => 'btn p-3 btn-info']) ?>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
