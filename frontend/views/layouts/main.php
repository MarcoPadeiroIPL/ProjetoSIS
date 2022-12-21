<?php

/** @var \yii\web\View $this */
/** @var string $content */

use common\widgets\Alert;
use frontend\assets\AppAsset;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">
    <?php $this->head() ?>
</head>

<body>
    <?php $this->beginBody() ?>
    <div class="gtco-loader"></div>
    <div id="page">
        <!-- <div class="page-inner"> -->
        <nav class="gtco-nav bg-dark" role="navigation">
            <div class="gtco-container">

                <div class="row">
                    <div class="col-sm-4 col-xs-12">
                        <div id="gtco-logo"><?= Html::a('Airbender<em>.</em>', ['site/index']) ?></div>
                    </div>
                    <div class="col-xs-8 text-right menu-1">
                        <ul>
                            <li><?= Html::a('Flights', ['/flight/select-airport']) ?></li>
                            <li><?= Html::a('About', ['/site/about']) ?></li>
                            <li><?= Html::a('Contact', ['/site/contact']) ?></li>
                            <?php if (Yii::$app->user->isGuest) {
                                echo '<li>' . Html::a('Login', ['/site/login', '#' => 'login-section']) . '</li>';
                            } else {
                                echo '<li class="has-dropdown">
                                            <a href="#">' . Yii::$app->user->identity->username . '</a>
                                                <ul class="dropdown">
                                                    <li>' . Html::a('Profile', ['/client/index']) . '</li>
                                                    <li>' . Html::a('My balance', ['/balance-req/index']) . '</li>
                                                    <li>' . Html::a('My flights', ['/flight/view']) . '</li>
                                                    <li>' . Html::a('My receipts', ['/receipt/view']) . '</li>
                                                    <li>' . Html::beginForm(['/site/logout'], 'post')
                                    . Html::submitButton(
                                        'Logout '
                                    )
                                    . Html::endForm() . '</li>
                                                </ul>
                                        </li>
                                   ';
                            } ?>

                        </ul>
                    </div>
                </div>

            </div>
        </nav>

        <main role="main" class="flex-shrink-0">
            <div class="container">
                <?= Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ]) ?>
                <?= Alert::widget() ?>
                <?= $content ?>
            </div>
        </main>

        <footer id="gtco-footer" role="contentinfo">
            <div class="gtco-container">
                <div class="row row-p	b-md">

                    <div class="col-md-4">
                        <div class="gtco-widget">
                            <h3>About Us</h3>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore eos molestias quod sint ipsum possimus temporibus officia iste perspiciatis consectetur in fugiat repudiandae cum. Totam cupiditate nostrum ut neque ab?</p>
                        </div>
                    </div>

                    <div class="col-md-2 col-md-push-1">
                        <div class="gtco-widget">
                            <h3>Destination</h3>
                            <ul class="gtco-footer-links">
                                <li><a href="#">Europe</a></li>
                                <li><a href="#">Australia</a></li>
                                <li><a href="#">Asia</a></li>
                                <li><a href="#">Canada</a></li>
                                <li><a href="#">Dubai</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-2 col-md-push-1">
                        <div class="gtco-widget">
                            <h3>Hotels</h3>
                            <ul class="gtco-footer-links">
                                <li><a href="#">Luxe Hotel</a></li>
                                <li><a href="#">Italy 5 Star hotel</a></li>
                                <li><a href="#">Dubai Hotel</a></li>
                                <li><a href="#">Deluxe Hotel</a></li>
                                <li><a href="#">BoraBora Hotel</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-3 col-md-push-1">
                        <div class="gtco-widget">
                            <h3>Get In Touch</h3>
                            <ul class="gtco-quick-contact">
                                <li><a href="#"><i class="icon-phone"></i> +1 234 567 890</a></li>
                                <li><a href="#"><i class="icon-mail2"></i> info@freehtml5.co</a></li>
                                <li><a href="#"><i class="icon-chat"></i> Live Chat</a></li>
                            </ul>
                        </div>
                    </div>

                </div>

                <div class="row copyright">
                    <div class="col-md-12">
                        <p class="pull-left">
                            <small class="block">&copy; 2016 Free HTML5. All Rights Reserved.</small>
                            <small class="block">Designed by <a href="https://freehtml5.co/" target="_blank">FreeHTML5.co</a> Demo Images: <a href="http://unsplash.com/" target="_blank">Unsplash</a></small>
                        </p>
                        <p class="pull-right">
                        <ul class="gtco-social-icons pull-right">
                            <li><a href="#"><i class="icon-twitter"></i></a></li>
                            <li><a href="#"><i class="icon-facebook"></i></a></li>
                            <li><a href="#"><i class="icon-linkedin"></i></a></li>
                            <li><a href="#"><i class="icon-dribbble"></i></a></li>
                        </ul>
                        </p>
                    </div>
                </div>

            </div>
        </footer>
    </div>
    <div class="gototop js-top">
        <a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
    </div>

    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage();
