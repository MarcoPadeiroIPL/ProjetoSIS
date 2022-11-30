<?php

use common\models\Airplane;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Airplanes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="airplane-index">

    <div class="d-flex m-2 justify-content-end">
        <?= Html::a('+ Create Airplane', ['create'], ['class' => 'btn btn-dark']) ?>
    </div>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'luggageCapacity',
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
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Airplane $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>

</div>
