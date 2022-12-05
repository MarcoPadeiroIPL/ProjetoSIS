<?php

use common\models\Config;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Configs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="config-index">

    <div class="d-flex m-2 justify-content-end">
        <?= Html::a('+ Create Config', ['create'], ['class' => 'btn btn-dark']) ?>
    </div>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'description',
            [
                'label' => 'Weight',
                'value' => function ($model) {
                    return $model->weight . 'kg';
                }
            ],
            [
                'label' => 'Price',
                'value' => function ($model) {
                    return $model->price . '€';
                }
            ],
            [
                'label' => 'Active',
                'format' => 'raw',
                'value' => function ($model) {
                    return $model->active ? '<span class="badge badge-success">Yes</span>' : '<span class="badge badge-danger">No</span>';
                }
            ],
            [
                'class' => ActionColumn::class,
                'template' => '{view} {update} {delete}',
                'buttons' => [
                    'view' => function ($url, $model) {
                        return Html::a('<i class="fas fa-eye"></i>', $url, [
                            'title' => Yii::t('app', 'View'),
                            'class' => 'btn btn-sm btn-primary',
                        ]);
                    },
                    'update' => function ($url, $model) {
                        return Html::a('<i class="fas fa-edit"></i>', $url, [
                            'title' => Yii::t('app', 'Update'),
                            'class' => 'btn btn-sm btn-primary',
                        ]);
                    },
                    'delete' => function ($url, $model) {
                        return Html::a('<i class="fas fa-trash"></i>', $url, [
                            'title' => Yii::t('app', 'Delete'),
                            'class' => 'btn btn-sm btn-danger',
                            'data' => [
                                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                                'method' => 'post',
                            ],
                        ]);
                    },
                ],
                'urlCreator' => function ($action, $model, $key, $index) {
                    if ($action === 'view') {
                        return Url::to(['view', 'id' => $model->id]);
                    }
                    if ($action === 'update') {
                        return Url::to(['update', 'id' => $model->id]);
                    }
                    if ($action === 'delete') {
                        return Url::to(['delete', 'id' => $model->id]);
                    }
                }
            ],
        ],
    ]); ?>

</div>