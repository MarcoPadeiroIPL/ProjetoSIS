<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <span class="brand-text font-weight-light">Airbender</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= $assetDir ?>/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?= Yii::$app->user->identity->username ?></a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <!-- href be escaped -->
        <!-- <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div> -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <?php
            echo \hail812\adminlte\widgets\Menu::widget([
                'items' => [
                    [
                        'label' => 'Dashboard',
                        'icon' => 'tachometer-alt',
                        'url' => ['site/index']
                    ],
                    ['label' => 'AIRPORTS', 'header' => true],
                    [
                        'label' => 'Employees',
                        'icon' => 'fa-solid fa-user-tie',
                        'url' => ['employee/index']
                    ],
                    [
                        'label' => 'Luggage',
                        'icon' => 'fa-solid fa-suitcase-rolling',
                    ],
                    [
                        'label' => 'Airports',
                        'icon' => 'fa-solid fa-building',
                    ],
                    [
                        'label' => 'Flights',
                        'icon' => 'fa-solid fa-plane-departure',
                    ],
                    [
                        'label' => 'Airplanes',
                        'icon' => 'fa-solid fa-plane',
                    ],
                    [
                        'label' => 'Tariffs',
                        'icon' => 'fa-solid fa-dollar-sign',
                    ],
                    ['label' => 'CUSTOMERS', 'header' => true],
                    [
                        'label' => 'Clients',
                        'icon' => 'fa-solid fa-user',
                    ],
                    [
                        'label' => 'Balance Requests',
                        'icon' => 'fa-solid fa-comment-dollar',
                    ],
                    [
                        'label' => 'Refunds',
                        'icon' => 'fa-solid fa-money-bill',
                    ],
                ],
            ]);
            ?>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
