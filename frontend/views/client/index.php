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
                    <h3><?= $client->user->userData->fName, ' ', $client->user->userData->surname ?></h3>
                    <h3><?= $client->user->email ?></h3>
                    <h3><?= $client->user->userData->phone ?></h3>

                    <?= Html::a('Edit profile', ['create'], ['class' => 'btn btn-success']) ?>
                </div>
                <div class="col">
                    <div class="row">
                        <div class="col-6">
                            <h2>
                            </h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <h3>My flights</h3>
                        </div>
                        <div class="col">
                            <a href="../flight/">See more</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <h3>My balance</h3>
                        </div>
                        <div class="col">
                            <a href="../balance-req/">See more</a>

                        </div>
                        <h4> <?= $client->balance ?>€</h4>


                    </div>


                </div>
            </div>
        </div>
    </div>

</div>