<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Airplane $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Airplanes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="airplane-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'label' => 'luggageCapacity',
                'value' => function ($model) {
                    return $model->luggageCapacity . 'kg';
                }
            ],
            [
                'label' => 'Seats (Rows - Columns)',
                'value' => function ($model) {
                    return $model->minLinha . $model->minCol . ' - ' . $model->maxLinha . $model->maxCol;
                }
            ],
            [
                'label' => 'Economic',
                'value' => function ($model) {
                    return $model->economicStart . ' - ' . $model->economicStop;
                }
            ],
            [
                'label' => 'Normal',
                'value' => function ($model) {
                    return $model->normalStart . ' - ' . $model->normalStop;
                }
            ],
            [
                'label' => 'Luxury',
                'value' => function ($model) {
                    return $model->luxuryStart . ' - ' . $model->luxuryStop;
                }
            ],
            [
                'label' => 'Total Seats',
                'value' => function ($model) {
                    return $model->countTotalSeats();
                }
            ],
        ],
    ]) ?>

</div>
