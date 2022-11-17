<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Ticket $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="ticket-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'fName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'surname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'gender')->dropDownList([ 'M' => 'M', 'F' => 'F', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'age')->textInput() ?>

    <?= $form->field($model, 'checkedIn')->textInput() ?>

    <?= $form->field($model, 'client_id')->textInput() ?>

    <?= $form->field($model, 'flight_id')->textInput() ?>

    <?= $form->field($model, 'seatLinha')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'seatCol')->textInput() ?>

    <?= $form->field($model, 'luggage_1')->textInput() ?>

    <?= $form->field($model, 'luggage_2')->textInput() ?>

    <?= $form->field($model, 'receipt_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
