<?php

use Codeception\Attribute\Depends;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use kartik\widgets\TimePicker;

/** @var yii\web\View $this */
/** @var common\models\Flight $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="flight-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col">
            <?=
            DatePicker::widget([
                'model' => $model,
                'name' => 'departureDate',
                'attribute' => 'departureDate',
                'options' => ['placeholder' => 'Select departure date ...'],
                'type' => DatePicker::TYPE_INPUT,
                'pluginOptions' => [
                    'format' => 'yyyy-mm-dd',
                    'todayHighlight' => true
                ]
            ]);
            ?>
        </div>
    </div>

    <?= $form->field($model, 'duration')->textInput()->label('Duration') ?>
    <div class="row">
        <div class="col">
            <?= $form->field($model, 'airportDeparture_id')->dropDownList($airports)->label('Airport Departure') ?>
        </div>
        <div class="col">
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