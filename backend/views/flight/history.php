<?php

use common\models\BalanceReq;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Price History';
$this->params['breadcrumbs'][] = $this->title;
?>
<a href="index">Go back</a>
<div class="tariff-history">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'startDate',
            [
                'label' => 'Prices',
                'format' => 'raw',
                'value' => function ($model) {
                    return
                        '<h3><span class="badge badge-info">Economic - ' . $model->economicPrice . '€</span></h3>' .
                        '<h3><span class="badge badge-success">Normal - ' . $model->normalPrice . '€</span></h3>' .
                        '<h3><span class="badge badge-primary">Luxury - ' . $model->luxuryPrice . '€</span></h3>';
                }
            ],
            [
                'label' => 'Active',
                'format' => 'raw',
                'value' => function ($model) {
                    return $model->active ? '<h3><span class="badge badge-success">Yes</span></h3>' : '<h3><span class="badge badge-danger">No</span></h3>';
                }
            ],
            [
                'class' => ActionColumn::class,
                'template' => '{view}',
                'buttons' => [
                    'view' => function ($url, $model) {
                        return Html::a('<i class="fas fa-eye"></i>', $url, [
                            'title' => Yii::t('app', 'View'),
                            'class' => 'btn btn-sm btn-primary',
                        ]);
                    },
                ],
                'urlCreator' => function ($action, $model, $key, $index) {
                    if ($action === 'view') {
                        return Url::to(['tariff/view', 'id' => $model->id]);
                    }
                }
            ],
        ],
    ]); ?>
</div>
