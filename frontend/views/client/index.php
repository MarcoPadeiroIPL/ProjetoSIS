<?php

use common\models\Client;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'My Profile';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="client-index">
    <div class="gtco-section">
        <div class="gtco-container">
            <div class="row">
                <div class="col-4 text-center align-self-center">
                    <i class='fas fa-fa-solid fa-user-tie'></i>

                    <?= Html::a('Create Balance Req', ['create'], ['class' => 'btn btn-success']) ?>
                </div>
                <div class="col">
                    <div class="row">
                        <div class="col-6">
                            <h2>Current balance requests</h2>
                        </div>
                        <div class=" col">
                            <h2 class="text-right"><a href="history">View history</a></h2>
                        </div>
                    </div>
                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],

                            'user_id',
                            'balance',
                            'application',
                            [
                                'class' => ActionColumn::className(),
                                'template' => '{update}',

                            ],
                        ],
                    ]); ?>

                </div>
            </div>
        </div>
    </div>

</div>