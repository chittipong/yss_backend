<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\YssSlideSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Yss Slides');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="yss-slide-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Yss Slide'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute'=>'รูปภาพ',                                           //title
                'format' => ['image',['width'=>'60','height'=>'60']],         //Set width,height
                'value' => function($model){
                    return $model->getImageUrl();                               //Get function in product model
                }
            ],
            'slide_name',
            'page',
            //'pic',
            'header',
            //'title',
            'link',
            'lang',
            'sort_order',
            // 'date_create',
            // 'date_update',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
