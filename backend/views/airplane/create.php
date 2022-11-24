<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Airplane $model */

$this->title = 'Create Airplane';
$this->params['breadcrumbs'][] = ['label' => 'Airplanes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="airplane-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
