<?php
/* TODO:
    -Mostrar a percentagem do aeroporto mais procurado.
    -Mostrar a percentagem dos aeroportos operacionais.
*/

use common\models\BalanceReq;
use common\models\Airport;
use yii\helpers\Url;
use yii\helpers\Html;

$this->title = 'Dashboard';
$this->params['breadcrumbs'] = [['label' => $this->title]];
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6">
            <?php if ($balanceReq['count'] == 0) { ?>
                <?= \hail812\adminlte\widgets\Alert::widget([
                    'type' => 'success',
                    'body' => '<h3>There are no Balance Requests Pending!</h3>',
                ]) ?>
            <?php } else { ?>
                <?= \hail812\adminlte\widgets\Alert::widget([
                    'type' => 'warning',
                    'body' => Html::a(
                        '<h3>' . $balanceReqCount . ' Balance Requests Pending!</h3>',
                        Url::to(['balance-req/index']),
                        ['class' => 'btn btn-warning btn-block text-decoration-none']
                    ),
                ]) ?>
            <?php } ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4 col-sm-6 col-12">

            <?= \hail812\adminlte\widgets\InfoBox::widget([
                'text' => 'Pending Balance Requests',
                'number' => $balanceReq['count'],
                'icon' => 'fas fa-comment-dollar',
            ]) ?>
        </div>
        <div class="col-md-4 col-sm-6 col-12">
            <?= \hail812\adminlte\widgets\InfoBox::widget([
                'text' => 'Bookmarks',
                'number' => '410',
                'theme' => 'success',
                'icon' => 'far fa-flag',
            ]) ?>
        </div>
        <div class="col-md-4 col-sm-6 col-12">
            <?= \hail812\adminlte\widgets\InfoBox::widget([
                'text' => 'Uploads',
                'number' => '13,648',
                'theme' => 'gradient-warning',
                'icon' => 'far fa-copy',
            ]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4 col-sm-6 col-12">
            <?= \hail812\adminlte\widgets\InfoBox::widget([
                'text' => 'Bookmarks',
                'number' => '41,410',
                'icon' => 'far fa-bookmark',
                'progress' => [
                    'width' => '70%',
                    'description' => '70% Increase in 30 Days'
                ]
            ]) ?>
        </div>
        <div class="col-md-4 col-sm-6 col-12">
            <?php if ($airports['count'] != 0) { ?>
                <?php $infoBox = \hail812\adminlte\widgets\InfoBox::begin([
                    'text' => 'Most Popular Destination',
                    'number' => $airports['mostSearched']->country . ' - ' . $airports['mostSearched']->city,
                    'theme' => 'success',
                    'icon' => 'far fa-thumbs-up',
                    'progress' => [
                        'width' => $airports['mostSearched']->search . '%',
                        'description' => 'The destination with most searches.'
                    ]
                ]) ?>
                <?= \hail812\adminlte\widgets\Ribbon::widget([
                    'id' => $infoBox->id . '-ribbon',
                    'text' => 'Popular',
                ]) ?> <?php } else { ?>
                <?php $infoBox = \hail812\adminlte\widgets\InfoBox::begin([
                            'text' => 'Most Popular Destination',
                            'number' => 'No Searches Yet',
                            'theme' => 'success',
                            'icon' => 'far fa-thumbs-up',
                            'progress' => [
                                'width' => '0%',
                                'description' => 'There are no searches yet.'
                            ]
                        ]) ?> <?php } ?>
            <?php \hail812\adminlte\widgets\InfoBox::end() ?>
        </div>
        <div class="col-md-4 col-sm-6 col-12">
            <?php if ($airports['count'] != 0) { ?>
                <?php $infoBox = \hail812\adminlte\widgets\InfoBox::begin([
                    'text' => 'Least popular Destination',
                    'number' => $airports['leastSearched']->country . ' - ' . $airports['leastSearched']->city,
                    'theme' => 'danger',
                    'icon' => 'far fa-thumbs-down',
                    'progress' => [
                        'width' => $airports['leastSearched']->search . '%',
                        'description' => 'The destination with least searches.'
                    ]
                ]) ?> <?php } else { ?>
                <?php $infoBox = \hail812\adminlte\widgets\InfoBox::begin([
                            'text' => 'Least popular Destination',
                            'number' => 'No Searches yet',
                            'theme' => 'danger',
                            'icon' => 'far fa-thumbs-down',
                            'progress' => [
                                'width' => '0%',
                                'description' => 'There are no searches yet.'
                            ]
                        ]) ?> <?php } ?>
            <?php \hail812\adminlte\widgets\InfoBox::end() ?>
        </div>

    </div>

    <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <?= \hail812\adminlte\widgets\SmallBox::widget([
                'title' => '150',
                'text' => 'New Orders',
                'icon' => 'fas fa-shopping-cart',
            ]) ?>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <?php $smallBox = \hail812\adminlte\widgets\SmallBox::begin([
                'title' => '150',
                'text' => 'New Orders',
                'icon' => 'fas fa-shopping-cart',
                'theme' => 'success'
            ]) ?>
            <?= \hail812\adminlte\widgets\Ribbon::widget([
                'id' => $smallBox->id . '-ribbon',
                'text' => 'Ribbon',
                'theme' => 'warning',
                'size' => 'lg',
                'textSize' => 'lg'
            ]) ?>
            <?php \hail812\adminlte\widgets\SmallBox::end() ?>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <?= \hail812\adminlte\widgets\SmallBox::widget([
                'title' => '44',
                'text' => 'User Registrations',
                'icon' => 'fas fa-user-plus',
                'theme' => 'gradient-success',
                'loadingStyle' => true
            ]) ?>
        </div>
    </div>
</div>
