<?php

use common\models\Tariff;
use backend\helpers\TableBuilder;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Tariffs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tariff-index">

    <div class="d-flex m-2 justify-content-end">
        <?= Html::a('+ Create Tariff', ['create'], ['class' => 'btn btn-dark']) ?>
    </div>

    <?php
    $headers = [
        [
            'label' => '#',
            'attr' => 'id',
            'class' => 'text-start',
        ],
        [
            'label' => 'Start-Date',
            'attr' => 'startDate',
            'class' => 'text-center',
        ],
        [
            'label' => 'Economic Price',
            'attr' => 'economicPrice',
            'class' => 'text-center',
        ],
        [
            'label' => 'Normal Price',
            'attr' => 'normalPrice',
            'class' => 'text-center',
        ],
        [
            'label' => 'Luxury Price',
            'attr' => 'luxuryPrice',
            'class' => 'text-center',
        ],
    ];
    $tableBuilder = new TableBuilder($headers, $model);
    $tableBuilder->generate();
    ?>


</div>
