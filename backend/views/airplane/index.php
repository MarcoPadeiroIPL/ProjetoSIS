<?php

use backend\helpers\TableBuilder;
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

    <?php
    $headers = [
        [
            'label' => '#',
            'attr' => 'id',
            'class' => 'text-start',
        ],
        [
            'label' => 'Luggage Capacity (Kg)',
            'attr' => 'luggageCapacity',
            'class' => 'text-center',
        ],
        [
            'label' => 'Rows',
            'attr' => ['minLinha', 'maxLinha'],
            'class' => 'text-center',
            'format' => [0, ' - ', 1]
        ],
        [
            'label' => 'Columns',
            'attr' => ['minCol', 'maxCol'],
            'class' => 'text-center',
            'format' => [0, ' - ', 1]
        ],
        [
            'label' => 'Economic',
            'attr' => ['economicStart', 'economicStop'],
            'class' => 'text-center',
            'format' => [0, ' - ', 1]
        ],
        [
            'label' => 'Normal',
            'attr' => ['normalStart', 'normalStop'],
            'class' => 'text-center',
            'format' => [0, ' - ', 1]
        ],
        [
            'label' => 'Luxury',
            'attr' => ['luxuryStart', 'luxuryStop'],
            'class' => 'text-center',
            'format' => [0, ' - ', 1]
        ],
        [
            'label' => 'Status',
            'attr' => 'status',
            'class' => 'text-center',
        ],
    ];
    $tableBuilder = new TableBuilder($headers, $model);
    $tableBuilder->generate();

    ?>


</div>
