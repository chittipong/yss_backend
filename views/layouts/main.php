<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

use yii\helpers\ArrayHelper;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
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
                ],
            ],
            ['label' => 'User', 'url' => ['/users/index']],
            Yii::$app->user->isGuest ?
                ['label' => 'Login', 'url' => ['/site/login']] :
                [
                    'label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                    'url' => ['/site/logout'],
                    'linkOptions' => ['data-method' => 'post']
                ],
        ],
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <div id="myMsg-cn">
               <!--############For Display Flash Message#########################-->
                <?php if(Yii::$app->session->hasFlash('alert')):?>
                <?= \yii\bootstrap\Alert::widget([
                'body'=>ArrayHelper::getValue(Yii::$app->session->getFlash('alert'), 'body'),
                'options'=>ArrayHelper::getValue(Yii::$app->session->getFlash('alert'), 'options'),
                ])?>
                <?php endif; ?>
             <!--############End Display Flash Message#########################-->
        </div>
        
        <?= $content ?>
        
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; YSS CO.,LTD. <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
