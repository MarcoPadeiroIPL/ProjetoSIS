<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\Employee $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="employee-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($userData, 'fName')->textInput() ?>

    <?= $form->field($userData, 'surname')->textInput() ?>


    <?= $form->field($userData, 'gender')->textInput() ?>

    <?= $form->field($userData, 'phone')->textInput() ?>

    <?= $form->field($userData, 'nif')->textInput() ?>

    <?= $form->field($userData, 'birthdate')->textInput() ?>

    <?= $form->field($employee, 'salary')->textInput() ?>

    <?= $form->field($user, 'username')->textInput(['autofocus' => true]) ?>

    <?= $form->field($user, 'email') ?>

    <?= $form->field($user, 'password')->passwordInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
