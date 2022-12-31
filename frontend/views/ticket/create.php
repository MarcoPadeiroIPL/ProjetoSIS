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
        <div class="row shadow mb-4">
            <div class="col-8 p-5">
                <div class="h1 row">Ticket</div>
                <div class="row">
                    <div class="col"><?= $form->field($ticket, 'fName'); ?></div>
                    <div class="col"><?= $form->field($ticket, 'surname'); ?></div>
                </div>
                <div class="row">
                    <div class="col"><?= $form->field($ticket, 'gender')->dropDownList(['M' => 'Male', 'F' => 'Female']); ?></div>
                    <div class="col"><?= $form->field($ticket, 'age'); ?></div>
                </div>
                <div class="row mb-5">
                    <?= $form->field($ticket, 'luggage_1')->hiddenInput(['value' => "0"]) ?>
                    <div class="col shadow rounded btn border-primary" onclick="switchConfig(0, 1)" id="config0_luggage1" role="button" style="margin-left: 3%; margin-right: 3%;">
                        <div class="row d-flex justify-content-center">None</div>
                        <div class="row d-flex justify-content-center h1"><i class="fa-solid fa-ban"></i></div>
                        <div class="row d-flex justify-content-center h3">Free</div>
                    </div>
                    <?php foreach ($config as $c) { ?>
                        <div class="col shadow rounded btn opacity-50" role="button" onclick="switchConfig(<?= $c->id ?>, 1)" id="config<?= $c->id ?>_luggage1" style="margin-left: 3%; margin-right: 3%;">
                            <div class="row d-flex justify-content-center"><?= $c->weight . 'KG' ?></div>
                            <div class="row d-flex justify-content-center h1"><i class="fa-solid fa-suitcase-rolling"></i></div>
                            <div class="row d-flex justify-content-center h3"><?= $c->price . '€' ?></div>
                        </div>
                    <?php } ?>
                </div>
                <div class="row">
                    <?= $form->field($ticket, 'luggage_2')->hiddenInput(['value' => "0"]) ?>
                    <div class="col shadow rounded btn border-primary" onclick="switchConfig(0, 2)" id="config0_luggage2" role="button" style="margin-left: 3%; margin-right: 3%;">
                        <div class="row d-flex justify-content-center">None</div>
                        <div class="row d-flex justify-content-center h1"><i class="fa-solid fa-ban"></i></div>
                        <div class="row d-flex justify-content-center h3">Free</div>
                    </div>
                    <?php foreach ($config as $c) { ?>
                        <div class="col shadow rounded btn opacity-50" role="button" onclick="switchConfig(<?= $c->id ?>, 2)" id="config<?= $c->id ?>_luggage2" style="margin-left: 3%; margin-right: 3%;">
                            <div class="row d-flex justify-content-center"><?= $c->weight . 'KG' ?></div>
                            <div class="row d-flex justify-content-center h1"><i class="fa-solid fa-suitcase-rolling"></i></div>
                            <div class="row d-flex justify-content-center h3"><?= $c->price . '€' ?></div>
                        </div>
                    <?php } ?>
                </div>
                <div class="row">
                    <div class="col"><?= $form->field($ticket, 'seatCol') ?></div>
                    <div class="col"><?= $form->field($ticket, 'seatLinha') ?></div>
                    <div class="col"><?= $form->field($ticket, 'client_id')->hiddenInput(['value' => Yii::$app->user->identity->getId()])->label('') ?></div>
                </div>
            </div>
            <div class="col">
                airplanes seats lmao
            </div>
        </div>
        <div class="form-group row d-flex justify-content-center">
            <?= Html::submitButton('Next', ['class' => 'btn btn-primary mt-5 w-75']) ?>
        </div>

        <?php ActiveForm::end(); ?>


    </div>
</div>

<script>
    currentConfig = [0, 0];

    function switchConfig(config, luggage) {
        if (currentConfig[luggage - 1] != config) {
            $('#config' + config + '_luggage' + luggage).addClass('border-primary');
            $('#config' + config + '_luggage' + luggage).removeClass('opacity-50');
            $('#config' + currentConfig[luggage - 1] + '_luggage' + luggage).addClass('opacity-50');
            $('#config' + currentConfig[luggage - 1] + '_luggage' + luggage).removeClass('border-primary');
            $('#ticketbuilder-luggage_' + luggage).val("" + config);

            currentConfig[luggage - 1] = config;
        }
    }
</script>
