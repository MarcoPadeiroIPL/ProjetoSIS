<?php

use common\models\Airport;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use backend\helpers\TableBuilder;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Airports';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="airport-index">

    <div class="d-flex m-2 justify-content-end">
        <?= Html::a('+ Create Airport', ['create'], ['class' => 'btn btn-dark']) ?>
    </div>

    <?php
    $headers = [
        [
            'label' => '#',
            'attr' => 'id',
            'class' => 'text-start',
        ],
        [
            'label' => 'Country',
            'attr' => 'country',
            'class' => 'text-center',
        ],
        [
            'label' => 'Code',
            'attr' => 'code',
            'class' => 'text-center',
        ],
        [
            'label' => 'City',
            'attr' => 'city',
            'class' => 'text-center',
        ],
        [
            'label' => 'Search',
            'attr' => 'search',
            'class' => 'text-center',
        ],
    ];
    $tableBuilder = new TableBuilder($headers, $model);
    $tableBuilder->generate();
    ?>



</div>
