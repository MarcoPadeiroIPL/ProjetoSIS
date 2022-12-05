<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;

/** @var yii\web\View $this */
/** @var common\models\Tariff $model */
/** @var yii\widgets\ActiveForm $form */
?>
<?= ''
//TODO: Timepicker para selecionar as horas
?>
<div class="tariff-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-0">
            <?=
            $form->field($model, 'startDate')->widget(DatePicker::classname(), [
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
        <div class="col">
            <?= $form->field($model, 'economicPrice')->textInput() ?>
            <?= $form->field($model, 'normalPrice')->textInput() ?>
            <?= $form->field($model, 'luxuryPrice')->textInput() ?>
        </div>
    </div>

    <div class="col">
        <?= $form->field($model, 'flight_id')->dropDownList($flights) ?>
        <?= $form->field($model, 'active')->checkbox() ?>
    </div>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>