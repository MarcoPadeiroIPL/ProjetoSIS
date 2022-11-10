<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\Employee $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="employee-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'fName')->textInput() ?>

    <?= $form->field($model, 'surname')->textInput() ?>

    <?= $form->field($model, 'gender')->textInput() ?>

    <?= $form->field($model, 'phone')->textInput() ?>

    <?= $form->field($model, 'nif')->textInput() ?>

    <?= $form->field($model, 'birthdate')->textInput() ?>

    <?= $form->field($model, 'salary')->textInput() ?>

    <?= $form->field($model, 'role')->textInput() ?>

    <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

    <?= $form->field($model, 'email') ?>

    <?= $form->field($model, 'password')->passwordInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
