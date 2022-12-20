<?php

use common\models\Flight;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use kartik\date\DatePicker;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

?>
<div class="flight-index">

<div class="container shadow">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col">
            <?= $form->field($model, 'airportDeparture_id')->dropDownList($airports)->label('Airport Departure') ?>
        </div>
        <div class="col">
            <?= $form->field($model, 'airportArrival_id')->dropDownList($airports)->label('Airport Arrival') ?>
        </div>
    </div>
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
    <div class="form-group">
        <?= Html::submitButton('Save', ['class'=> 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>


    </div>
</div>