<?php

use Codeception\Attribute\Depends;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;

/** @var yii\web\View $this */
/** @var common\models\Flight $model */
/** @var yii\widgets\ActiveForm $form */
?>

<?= ''
/*todo: quando seleciono a data de partida, a data de chegada deve ser maior que a data de partida
                // e não deverá deixar selecionar uma data anterior a data de partida no calendário da data de chegada

                 'options' => [
                    'onchange' => '
                        var departureDate = $("#flight-departuredate").val();
                        var arrivalDate = $("#flight-arrivaldate").val();
                        if (departureDate > arrivalDate) {
                            alert("Arrival date must be after departure date");
                            $("#flight-arrivaldate").val("");
                        }
                    ',
                ], */ ?>

<div class="flight-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col d-flex justify-content-center">
            <?=
            $form->field($model, 'departureDate')->widget(DatePicker::classname(), [
                'language' => 'en',
                'dateFormat' => 'yyyy-MM-dd',
                'inline' => true,
                'clientOptions' => [
                    'changeMonth' => true,
                    'changeYear' => true,
                    'minDate' => date('Y-m-d'),
                    'maxDate' => '+1Y',
                ],
            ]) ?>
        </div>
        <div class="col d-flex justify-content-center">
            <?=
            $form->field($model, 'arrivalDate')->widget(DatePicker::classname(), [
                'language' => 'en',
                'dateFormat' => 'yyyy-MM-dd',
                'inline' => true,
                'clientOptions' => [
                    'changeMonth' => true,
                    'changeYear' => true,
                    'minDate' => date('Y-m-d'),
                    'maxDate' => '+1Y',
                ],
            ]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col d-flex justify-content-center">
            <?= $form->field($model, 'airportDeparture_id')->dropDownList($airports)->label('Airport Departure') ?>
        </div>
        <div class="col d-flex justify-content-center">
            <?= $form->field($model, 'airportArrival_id')->dropDownList($airports, ['prompt' => ''])->label('Airport Arrival') ?>
        </div>
    </div>
    <?= $form->field($model, 'airplane_id')->dropDownList($airplanes)->label('Airplane') ?>

    <?= $form->field($model, 'status')->hiddenInput(['value' => 'Available'])->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>