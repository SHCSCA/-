<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p><?php echo isset(\Yii::$app->user->identity->username)?\Yii::$app->user->identity->username:'未登入';?></p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => '后台菜单', 'options' => ['class' => 'header', 'style' => 'font-size: 18px; color: #ccc;']],
//                    ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii']],
//                    ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug']],
//                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                    [
                        'label' => '管理菜单',
                        'icon' => 'share',
                        'url' => '#',
                        'items' => [
                            // ['label' => '管理员', 'icon' => 'file-code-o', 'url' => ['/adminuser'],],
                            // ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug'],],
                            [
                                'label' => '系统管理',
                                'icon' => 'circle-o',
                                'url' => '#',
                                'items' => [
                                    ['label' => '添加管理员', 'icon' => 'file-code-o', 'url' => ['/user-backend/create'],],
                                    ['label' => '管理员管理', 'icon' => 'file-code-o', 'url' => ['/user-backend/index'],],
                                    ['label' => '角色管理', 'icon' => 'file-code-o', 'url' => '#',],
                            
                                ],
                            ],
                            [
                                'label' => '博客文章管理',
                                'icon' => 'circle-o',
                                'url' => '#',
                                'items' => [
                                    ['label' => '评论列表', 'icon' => 'dashboard', 'url' => ['/blog/index'],],
                                ],
                            ],
                        ],
                    ],
                ],
            ]
        ) ?>

    </section>

</aside>
