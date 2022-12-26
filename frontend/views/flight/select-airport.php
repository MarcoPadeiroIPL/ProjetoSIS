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

<div class="container mt-5" style="width:35%">
    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col btn btn-primary" id="bothWays" onClick="bothWays()">
            Both ways 
        </div>
        <div class="col btn btn-secondary" id="oneWay" onClick="oneWay()">
            One Way
        </div>
    </div>
    <div class="row">
        <div class="col">
            <?= $form->field($model, 'airportDeparture_id')->dropDownList($airports, ['prompt' => 'From'])->label('') ?>
        </div>
        <div class="col-1 d-flex justify-content-center align-items-center">
            <i class="fa-solid fa-plane"></i>
        </div>
        <div class="col">
            <?= $form->field($model, 'airportArrival_id')->dropDownList($airports, ['prompt' => 'To'])->label('') ?>
        </div>
    </div>
    <div class="row">
        <div class="col-1 d-flex justify-content-center align-items-center">
            <i class="fa-solid fa-plane-departure"></i>
        </div>
        <div class="col">
            <?=
            DatePicker::widget([
                'model' => $model,
                'name' => 'departureDate',
                'attribute' => 'departureDate',
                'options' => ['placeholder' => 'Departure date'],
                'type' => DatePicker::TYPE_INPUT,
                'pluginOptions' => [
                    'format' => 'yyyy-mm-dd',
                    'todayHighlight' => true
                ]
            ]);
            ?>
        </div>
        <div class="col-1 d-flex justify-content-center align-items-center">
            <i class="fa-solid fa-plane-arrival"id="arrivalIcon"></i>
        </div>
        <div class="col" id="arrivalDate">
            <?=
            DatePicker::widget([
                'model' => $model,
                'name' => 'arrivalDate',
                'attribute' => 'arrivalDate',
                'options' => ['placeholder' => 'Arrival date'],
                'type' => DatePicker::TYPE_INPUT,
                'pluginOptions' => [
                    'format' => 'yyyy-mm-dd',
                    'todayHighlight' => true
                ]
            ]);
            ?>
        </div>
    </div>
    <div class="row">
        <div class="col-1 d-flex justify-content-center align-items-center">
            <i class="fa-solid fa-user"></i>
        </div>
        <div class="col-2">
            <?= $form->field($model, 'passangers')->dropDownList(range(1, 9))->label('') ?>
        </div>
    </div>
    <div class="form-group row d-flex justify-content-center">
        <?= Html::submitButton('Search', ['class'=> 'btn btn-primary mt-5 w-75']) ?>
    </div>

    <?php ActiveForm::end(); ?>


    </div>
</div>

<script>
    function oneWay() {
        $("#oneWay").addClass("btn-primary").removeClass("btn-secondary");
        $("#bothWays").addClass("btn-secondary").removeClass("btn-primary");
        $("#arrivalDate").fadeOut();
        $("#arrivalIcon").fadeOut();
        $("#selectairport-arrivaldate").val("");
    }
    function bothWays() {
        $("#bothWays").addClass("btn-primary").removeClass("btn-secondary");
        $("#oneWay").addClass("btn-secondary").removeClass("btn-primary");
        $("#arrivalDate").fadeIn();
        $("#arrivalIcon").fadeIn();
    }
</script>
