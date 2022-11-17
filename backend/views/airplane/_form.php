<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Airplane $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="airplane-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'luggageCapacity')->textInput() ?>

    <?= $form->field($model, 'minLinha')->textInput() ?>

    <?= $form->field($model, 'minCol')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'maxLinha')->textInput() ?>

    <?= $form->field($model, 'maxCol')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'economicStart')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'economicStop')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'normalStart')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'normalStop')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'luxuryStart')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'luxuryStop')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->dropDownList([ 'Active' => 'Active', 'Not working' => 'Not working', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
