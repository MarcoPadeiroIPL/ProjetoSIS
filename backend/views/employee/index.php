<?php

use common\models\User;
use yii\helpers\Html;
use yii\helpers\Url;
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

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            [
                'label' => 'Full Name',
                'value' => function ($model) {
                    return $model->userData->fName . '   ' . $model->userData->surname;
                }
            ],
            'email',
            'userData.phone',
            'userData.gender',
            'authAssignment.item_name',
            'employee.salary',
            [
                'label' => 'Airport',
                'value' => function ($model) {
                    return isset($model->employee->airport) ? $model->employee->airport->country . ' - ' . $model->employee->airport->city : "Not set";
                }
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, User $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'user_id' => $model->id]);
                }
            ],
        ],
    ]); ?>



</div>
