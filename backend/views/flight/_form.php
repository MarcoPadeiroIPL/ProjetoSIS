<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Flight $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="flight-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'airplane_id')->textInput() ?>

    <?= $form->field($model, 'departureDate')->textInput() ?>

    <?= $form->field($model, 'arrivalDate')->textInput() ?>

    <?= $form->field($model, 'airportDeparture_id')->textInput() ?>

    <?= $form->field($model, 'airportArrival_id')->textInput() ?>

    <?= $form->field($model, 'status')->dropDownList([ 'Available' => 'Available', 'Unavailable' => 'Unavailable', 'Complete' => 'Complete', 'Canceled' => 'Canceled', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
