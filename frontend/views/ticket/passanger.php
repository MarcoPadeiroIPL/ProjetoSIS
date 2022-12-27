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
<div class="flight-index">

    <div class="container mt-5">
        <?php $form = ActiveForm::begin(); ?>

        <div class="row">
        <?= $flight->airportDeparture->code . ' <i class="fa-solid fa-arrow-right"></i>  ' . $flight->airportArrival->code ?>
        </div>

        <?php $x = 1 ?>
        <?php foreach ($tickets as $ticket) { ?>
            <div class="row shadow mb-4">
                <div class="col-8 p-5">
                    <div class="h1 row">Passanger <?= $x ?></div>
                    <div class="row">
                        <div class="col"><?= $form->field($ticket, 'fName'); ?></div>
                        <div class="col"><?= $form->field($ticket, 'surname'); ?></div>
                    </div>
                    <div class="row">
                        <div class="col"><?= $form->field($ticket, 'gender'); ?></div>
                        <div class="col"><?= $form->field($ticket, 'age'); ?></div>
                    </div>
                    <div class="row">
                        <div class="col"><?= $form->field($ticket, 'luggage_1')->dropDownList($config, ['prompt' => 'Select an option']); ?></div>
                        <div class="col"><?= $form->field($ticket, 'luggage_2')->dropDownList($config, ['prompt' => 'Select an option']); ?></div>
                    </div>
                </div>
                <div class="col">
                    airplanes seats lmao
                </div>
            </div>
            <?php $x++ ?>
        <?php } ?>
        <div class="form-group row d-flex justify-content-center">
            <?= Html::submitButton('Pay', ['class' => 'btn btn-primary mt-5 w-75']) ?>
        </div>

        <?php ActiveForm::end(); ?>


    </div>
</div>
