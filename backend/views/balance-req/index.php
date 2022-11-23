<?php

use common\models\BalanceReq;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use backend\helpers\TableBuilder;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Balance Reqs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="balance-req-index">

    <?php
    $buttons = [
        [
            'icon' => 'Accept',
            'href' => 'update',
            'flags' => [
                'id' => 'id',
                'status' => 'Accepted',
            ],
        ],
        [
            'icon' => 'Decline',
            'href' => 'update',
            'flags' => [
                'id' => 'id',
                'status' => 'Declined',
            ],
        ],
    ];
    $headers = [
        [
            'label' => '#',
            'attr' => 'id',
            'class' => 'text-start',
        ],
        [
            'label' => 'Amount',
            'attr' => 'amount',
            'class' => 'text-center',
            'format' => [0, '€']
        ],
        [
            'label' => 'Status',
            'attr' => 'status',
            'class' => 'text-center',
        ],
        [
            'label' => 'Request Date',
            'attr' => 'requestDate',
            'class' => 'text-center',
        ],
        [
            'label' => 'Decision Date',
            'attr' => 'decisionDate',
            'class' => 'text-center',
        ],
    ];
    $tableBuilder = new TableBuilder($headers, $model, $buttons);
    $tableBuilder->generate();
    ?>
</div>
