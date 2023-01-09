<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Ticket $model */

$this->title = 'Ticket #' . $model->id . ' - Airbender';
\yii\web\YiiAsset::register($this);
?>
<div class="ticket-view">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
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
