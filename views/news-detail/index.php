<?php

use yii\helpers\Html;
use yii\grid\GridView;
//For modal----------------
use yii\helpers\Url;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $searchModel app\models\NewsDetailSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'News Details');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-detail-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]);  ?>

    <p>
        <?php // Html::a(Yii::t('app', 'Create News Detail'), ['create'], ['class' => 'btn btn-success'])  ?>


        <!-- Button Call modal-->
        <?=
        Html::button(Yii::t('app', 'Create News Detail'), ['value' => Url::to('index.php?r=news-detail/create'),
            'class' => 'btn btn-success', 'id' => 'newsdetailCreate-btn'])
        ?>

        <?php
        // Modal-----------------
        Modal::begin([
            'header' => '<h4>Create News Detail</h4>',
            'id' => 'modal',
            'size' => 'modal-lg',
        ]);

        echo "<div id='modalContent'></div>";
        Modal::end();
        ?>
    </p>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            [
                'attribute' => 'รูปภาพ', //title
                'format' => ['image', ['width' => '60', 'height' => '60']], //Set width,height
                'value' => function($model) {
            return $model->getImageUrl();                               //Get function in product model
        }
            ],
            'news_id',
            'title',
            'detail',
            //'main',
            'sort_order',
            'lang',
            [
                //ดึงค่ามาตรวจสอบแล้วแสดงในแบบที่ต้องการ-------
                'label' => 'Default',
                'format' => 'text',
                'value' => function($dataProvider) {
                    if ($dataProvider->main == 'Y') {
                        return 'Yes';
                    } else {
                        return '';
                    }
                }
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>

</div>
