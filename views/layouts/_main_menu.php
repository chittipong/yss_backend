<?php echo app\models\User::ROLE_ADMIN; ?>
    <?php
        if(Yii::$app->user->isGuest){
    ?>
    <?php
            NavBar::begin([
                'brandLabel' => 'ADMINISTRATOR',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => [
                    ['label' => 'Signup', 'url' => ['/site/signup']],
                    ['label' => 'Login', 'url' => ['/site/login']],
                ],
            ]);
            NavBar::end();
            ?>
    <?php }else{ ?>
    
    <?php
    NavBar::begin([
        'brandLabel' => 'ADMINISTRATOR',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Home', 'url' => ['/site/index']],
            [
                'label' => 'Product',
                'items' => [
                     ['label' => 'Product', 'url' => ['/product/index']],
                     ['label' => 'Product Detail', 'url' => ['/product-detail/index']],
                     ['label' => 'Product Gallery', 'url' => ['/product-gallery/index']],
                     ['label' => 'Product Review', 'url' => ['/product-review/index']],
                ],
            ],
            ['label' => 'News',
                'items'=>[
                    ['label'=>'News','url'=>['/news/index']],
                    ['label'=>'News Detail','url' => ['/news-detail/index']],
                ]
            ],
            ['label' => 'Content',
                'items'=>[
                    ['label'=>'Menu','url' => ['/menu/index']],
                    ['label'=>'Page','url' => ['/page/index']],
                    ['label'=>'Slide','url' => ['/yss-slide/index']],
                    ['label'=>'Content','url'=>['/content/index']],
                ]
            ],
            ['label' => 'Download', 'url' => ['/download/index']],
            ['label' => 'Importers', 'url' => ['/importers/index']],
            //['label' => 'Contact', 'url' => ['/site/contact']],
            [
                'label' => 'Config',
                'items' => [
                    ['label' => 'Language', 'url' => ['/lang/index']],
                    ['label' => 'Product Group', 'url' => ['/product-group/index']],
                    ['label' => 'Product Type', 'url' => ['/product-type/index']],
                    ['label' => 'Brand', 'url' => ['/brand/index']],
                    ['label' => 'Model', 'url' => ['/yss-model/index']],
                    ['label' => 'Piston', 'url' => ['/piston/index']],
                    ['label' => 'Shaft', 'url' => ['/shaft/index']],
                    ['label' => 'Preload Option', 'url' => ['/preload-option/index']],
                    ['label' => 'Importers Category', 'url' => ['/importer-cat/index']],
                    ['label' => 'Vehicle Type', 'url' => ['/vehicle/index']],
                    ['label' => 'App List', 'url' => ['/app-list/index']],
                ],
            ],
            Yii::$app->user->isGuest ?
                ['label' => 'Login', 'url' => ['/site/login']] :
                /*[
                    'label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                    'url' => ['/site/logout'],
                    'linkOptions' => ['data-method' => 'post']
                ],*/
                ['label'=>'User','items'=>[
                    ['label' => 'Profile', 'url' => ['/user/view','id'=>Yii::$app->user->identity->id]],
                    ['label' => 'User', 'url' => ['/user/index']],
                    ['label'=>'Logout(' . Yii::$app->user->identity->username . ')',
                        'url' => ['/site/logout'],
                        'linkOptions' => ['data-method' => 'post']
                    ]
                ]]
        
        ],
    ]);
    NavBar::end();
    ?>
    <?php } ?>