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

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Employee', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php
    var_dump($model);
    $headers = [
        [
            'label' => '#',
            'attr' => 'id',
            'class' => 'col-1 text-start',
        ],
        [
            'label' => 'First Name',
            'attr' => 'fName',
            'class' => 'col text-center',
        ],
        [
            'label' => 'Surname',
            'attr' => 'surname',
            'class' => 'col text-center',
        ],
        [
            'label' => 'Username',
            'attr' => 'username',
            'class' => 'col text-center',
        ],
        [
            'label' => 'Email',
            'attr' => 'email',
            'class' => 'col-3 text-center',
        ],
        [
            'label' => 'Phone',
            'attr' => 'phone',
            'class' => 'col text-center',
        ],
        [
            'label' => 'Gender',
            'attr' => 'gender',
            'class' => 'col text-center',
        ],
        [
            'label' => 'Role',
            'attr' => 'role',
            'class' => 'col text-center',
        ],
        [
            'label' => 'Airport',
            'attr' => 'airport_id',
            'class' => 'col text-end',
        ],
    ];
    $tableBuilder = new TableBuilder($headers, $model);
    $tableBuilder->generate();

    ?>


</div>
