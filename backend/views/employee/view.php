<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var backend\models\Employee $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Employees', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="employee-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'user_id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'user_id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'label' => 'Full Name',
                'value' => function ($model) {
                    return (isset($model->userData->fName) ? $model->userData->fName : 'Not set') . '   ' . (isset($model->userData->surname) ? $model->userData->surname : 'Not set');
                }
            ],
            [
                'label' => 'Email',
                'value' => function ($model) {
                    return isset($model->email) ? $model->email : "Not set";
                }
            ],
            [
                'label' => 'Phone',
                'value' => function ($model) {
                    return isset($model->userData->phone) ? $model->userData->phone : "Not set";
                }
            ],
            [
                'label' => 'Gender',
                'value' => function ($model) {
                    return isset($model->userData->gender) ? ($model->userData->gender = 'M' ? 'Male' : 'Female') : "Not set";
                }
            ],
            [
                'label' => 'Role',
                'value' => function ($model) {
                    return isset($model->authAssignment->item_name) ? $model->authAssignment->item_name : "Not set";
                }
            ],
            [
                'label' => 'Salary',
                'value' => function ($model) {
                    return isset($model->employee->salary) ? $model->employee->salary . '€' : "Not set";
                }
            ],
            [
                'label' => 'Airport',
                'value' => function ($model) {
                    return isset($model->employee->airport) ? $model->employee->airport->country . ' - ' . $model->employee->airport->city : "Not set";
                }
            ],
        ]
    ]) ?>

</div>
