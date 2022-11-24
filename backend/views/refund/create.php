<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Refund $model */

$this->title = 'Create Refund';
$this->params['breadcrumbs'][] = ['label' => 'Refunds', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="refund-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
