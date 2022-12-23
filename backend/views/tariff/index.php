<?php

use common\models\Tariff;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Tariffs | Flight ' . $flight->airportDeparture->city . ' -> ' . $flight->airportArrival->city . ' at ' . $flight->departureDate;
?> 

<div class="tariff-index">
<?= Html::a('Go back', ['flight/index']); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'startDate',
            [
                'label' => 'Economic Price',
                'format' => 'raw',
                'value' => function ($model) {
                    return 
                        '<h3><span class="badge badge-info">' .$model->economicPrice . '€</span></h3>';
                }
            ],
            [
                'label' => 'Normal Price',
                'format' => 'raw',
                'value' => function ($model) {
                    return 
                        '<h3><span class="badge badge-success">' .$model->normalPrice . '€</span></h3>';
                }
            ],
            [
                'label' => 'Luxury Price',
                'format' => 'raw',
                'value' => function ($model) {
                    return 
                        '<h3><span class="badge badge-primary">' .$model->luxuryPrice . '€</span></h3>';
                }
            ],
            [
                'label' => 'Active',
                'format' => 'raw',
                'value' => function ($model) {
                    return $model->active ? '<h3><span class="badge badge-success">Yes</span></h3>' : '<h3><span class="badge badge-danger">No</span></h3>';
                }
            ],
        ],
    ]); ?>

</div>
