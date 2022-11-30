<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Flight $model */

$this->title = 'Create Flight';
$this->params['breadcrumbs'][] = ['label' => 'Flights', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="flight-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
