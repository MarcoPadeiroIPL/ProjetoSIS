<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Flight $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="flight-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'airportDeparture_id')->dropDownList($airports)->label('Airport Departure') ?>

    <?= $form->field($model, 'airportArrival_id')->dropDownList($airports)->label('Airport Arrival') ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
