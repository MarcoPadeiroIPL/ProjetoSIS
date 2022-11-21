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

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Airplane', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

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
            'label' => 'Min Linha',
            'attr' => 'minLinha',
            'class' => 'text-center',
        ],
        [
            'label' => 'Min Coluna',
            'attr' => 'minCol',
            'class' => 'text-center',
        ],
        [
            'label' => 'Max Linha',
            'attr' => 'maxLinha',
            'class' => 'text-center',
        ],
        [
            'label' => 'Max Coluna',
            'attr' => 'maxCol',
            'class' => 'text-center',
        ],
        [
            'label' => 'Economic Start',
            'attr' => 'economicStart',
            'class' => 'text-center',
        ],
        [
            'label' => 'Economic Stop',
            'attr' => 'economicStop',
            'class' => 'text-center',
        ],
        [
            'label' => 'Normal Start',
            'attr' => 'normalStart',
            'class' => 'text-center',
        ],
        [
            'label' => 'Normal Stop',
            'attr' => 'normalStop',
            'class' => 'text-center',
        ],
        [
            'label' => 'Luxury Start',
            'attr' => 'luxuryStart',
            'class' => 'text-center',
        ],
        [
            'label' => 'Luxury Stop',
            'attr' => 'luxuryStop',
            'class' => 'text-center',
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