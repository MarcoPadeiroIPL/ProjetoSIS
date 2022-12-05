<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\Employee $model */

$this->title = 'Update Employee: ' . $model->user_id;
$this->params['breadcrumbs'][] = ['label' => 'Employees', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->user_id, 'url' => ['view', 'user_id' => $model->user_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="employee-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'airports' => $airports,
        'roles' => $roles,
    ]) ?>

</div>
