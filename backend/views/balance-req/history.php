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
<a href="index">View pending</a>
<div class="balance-req-history">

    <?php
    $headers = [
        [
            'label' => '#',
            'attr' => 'id',
            'class' => 'text-start',
        ],
        [
            'label' => 'Request Date',
            'attr' => 'requestDate',
            'class' => 'text-center',
        ],
        [
            'label' => 'Amount',
            'attr' => 'amount',
            'class' => 'text-center',
            'format' => [0, '€']
        ],
        [
            'label' => 'Client',
            'attr' => 'clientName',
            'class' => 'text-center',
        ],
        [
            'label' => 'Decision Date',
            'attr' => 'decisionDate',
            'class' => 'text-center',
        ],
        [
            'label' => 'Employee',
            'attr' => 'employeeName',
            'class' => 'text-center',
        ],
        [
            'label' => 'Decision',
            'attr' => 'status',
            'class' => 'text-center',
        ],
    ];
    $tableBuilder = new TableBuilder($headers, $model);
    $tableBuilder->generate();
    ?>
</div>
