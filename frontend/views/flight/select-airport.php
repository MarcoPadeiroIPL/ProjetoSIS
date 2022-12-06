<?php

use common\models\Flight;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Flights';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="flight-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <div class="row">
        <?php $form = ActiveForm::begin(); ?>
        <div class="col d-flex justify-content-center">
            <?= $form->field($model, 'airportDeparture_id')->dropDownList($airports)->label('Airport Departure') ?>
        </div>
        <div class="col d-flex justify-content-center">
            <?= $form->field($model, 'airportArrival_id')->dropDownList($airports)->label('Airport Arrival') ?>
        </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>


</div>
