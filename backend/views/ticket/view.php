<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Ticket $model */

$this->title = 'Ticket #' . $model->id . ' - Airbender';
\yii\web\YiiAsset::register($this);
?>
<div class="ticket-view">

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
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
            'id',
            'fName',
            'surname',
            'gender',
            'age',
            'checkedIn',
            'client_id',
            'flight_id',
            'seatLinha',
            'seatCol',
            'luggage_1',
            'luggage_2',
            'receipt_id',
        ],
    ]) ?>

</div>
