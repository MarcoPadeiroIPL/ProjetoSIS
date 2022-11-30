<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Tariff $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="tariff-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'startDate')->textInput() ?>

    <?= $form->field($model, 'economicPrice')->textInput() ?>

    <?= $form->field($model, 'normalPrice')->textInput() ?>

    <?= $form->field($model, 'luxuryPrice')->textInput() ?>

    <?= $form->field($model, 'flight_id')->textInput() ?>

    <?= $form->field($model, 'active')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
