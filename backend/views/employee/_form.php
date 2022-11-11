<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\Employee $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="employee-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col"><?= $form->field($model, 'fName')->textInput()->label('First Name') ?></div>
        <div class="col"><?= $form->field($model, 'surname')->textInput() ?></div>
        <div class="col"><?= $form->field($model, 'email') ?></div>
    </div>
    <div class="row">
        <div class="col-2">
            <?= $form->field($model, 'gender')->dropDownList([
                'M' => 'Male',
                'F' => 'Female'
            ]) ?>
        </div>
        <div class="col"><?= $form->field($model, 'phone')->textInput() ?></div>
        <div class="col"><?= $form->field($model, 'nif')->textInput() ?></div>
        <div class="col"><?= $form->field($model, 'birthdate')->textInput() ?></div>

    </div>
    <div class="row">
        <div class="col"><?= $form->field($model, 'salary')->textInput() ?></div>
        <div class="col">
            <?= $form->field($model, 'role')->dropDownList([
                'ticketOperator' => 'Ticket Operator',
                'supervisor' => 'Supervisor',
                'admin' => 'Admin'
            ]) ?>
        </div>
        <div class="col">
            <?= $form->field($model, 'airport_id')->dropDownList($airports)->label('Airport') ?>
        </div>
    </div>

    <div class="row">
        <div class="col"><?= $form->field($model, 'username')->textInput() ?></div>
        <div class="col"><?= $form->field($model, 'password')->passwordInput() ?></div>
    </div>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
