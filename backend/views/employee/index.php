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
            'icon' => 'View',
            'href' => 'view',
            'user_id' => 'true'
        ],
        [
            'icon' => 'Update',
            'href' => 'update',
            'user_id' => 'true'
        ],
        [
            'icon' => 'Delete',
            'href' => 'delete',
            'user_id' => 'true'
        ],
    ];
    $headers = [
        [
            'label' => '#',
            'attr' => 'user_id',
            'class' => 'text-start',
        ],
        [
            'label' => 'First Name',
            'attr' => 'fName',
            'class' => 'text-center',
        ],
        [
            'label' => 'Surname',
            'attr' => 'surname',
            'class' => 'text-center',
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
