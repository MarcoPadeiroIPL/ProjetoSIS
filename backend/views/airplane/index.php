<?php

use common\models\Airplane;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Airplanes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="airplane-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Airplane', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'luggageCapacity',
            'minLinha',
            'minCol',
            'maxLinha',
            //'maxCol',
            //'economicStart',
            //'economicStop',
            //'normalStart',
            //'normalStop',
            //'luxuryStart',
            //'luxuryStop',
            //'status',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Airplane $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
