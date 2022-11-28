<?php

use backend\models\Employee;
use yii\helpers\Html;
use yii\helpers\Url;
use backend\helpers\TableBuilder;
use yii\grid\ActionColumn;
use yii\grid\GridView;


/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Employees';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="employee-index">


    <div class="d-flex m-2 justify-content-end">
        <?= Html::a('+ Create Employee', ['create'], ['class' => 'btn btn-dark']) ?>
    </div>

    <?php
    $buttons = [
        [
            'label' => 'View',
            'class' => 'btn btn-dark mr-1',
            'href' => 'view',
            'flags' => [
                'id' => 'user_id',
            ],
        ],
        [
            'label' => 'Update',
            'class' => 'btn btn-primary mr-1',
            'href' => 'update',
            'flags' => [
                'id' => 'user_id',
            ],
        ],
        [
            'label' => 'Delete',
            'class' => 'btn btn-danger',
            'href' => 'delete',
            'flags' => [
                'id' => 'user_id',
            ],
        ],
    ];
    $headers = [
        [
            'label' => '#',
            'attr' => 'user_id',
            'class' => 'text-start',
        ],
        [
            'label' => 'Full Name',
            'attr' => [
                'fName', 'surname'
            ],
            'class' => 'text-center',
            'format' => [0, " ", 1],
        ],
        [
            'label' => 'Username',
            'attr' => 'username',
            'class' => 'text-center',
        ],
        [
            'label' => 'Email',
            'attr' => 'email',
            'class' => 'text-center',
        ],
        [
            'label' => 'Phone',
            'attr' => 'phone',
            'class' => 'text-center',
        ],
        [
            'label' => 'Gender',
            'attr' => 'gender',
            'class' => 'text-center',
        ],
        [
            'label' => 'Role',
            'attr' => 'item_name',
            'class' => 'text-center',
        ],
        [
            'label' => 'Airport',
            'attr' => [
                'country', 'city'
            ],
            'class' => 'text-center',
            'format' => [0, ' - ', 1],

        ],
    ];
    $tableBuilder = new TableBuilder($headers, $model, $buttons);
    $tableBuilder->generate();

    ?>


</div>
