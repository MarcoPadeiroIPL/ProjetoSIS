<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Airport $model */

$this->title = 'Create Airport';
$this->params['breadcrumbs'][] = ['label' => 'Airports', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="airport-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
