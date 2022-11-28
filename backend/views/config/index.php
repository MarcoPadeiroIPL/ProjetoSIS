<?php

use common\models\Config;
use backend\helpers\TableBuilder;
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

    <?php
    $headers = [
        [
            'label' => '#',
            'attr' => 'id',
            'class' => 'text-start',
        ],
        [
            'label' => 'Description',
            'attr' => 'description',
            'class' => 'text-center',
        ],
        [
            'label' => 'Weight',
            'attr' => 'weight',
            'class' => 'text-center',
            'format' => [0, 'kg']
        ],
        [
            'label' => 'Price',
            'attr' => 'price',
            'class' => 'text-center',
            'format' => [0, '€']
        ],
        [
            'label' => 'Active',
            'attr' => 'active',
            'class' => 'text-center',
        ],
    ];
    $tableBuilder = new TableBuilder($headers, $model);
    $tableBuilder->generate();
    ?>


</div>
