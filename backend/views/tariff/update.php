<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Tariff $model */

$this->title = 'Update Tariff: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Tariffs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tariff-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'flights' => $flights,
    ]) ?>

</div>
