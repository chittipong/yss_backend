<?php

use yii\helpers\Html;
use yii\grid\GridView;

//For modal----------------
use yii\helpers\Url;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $searchModel app\models\NewsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'News');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php // Html::a(Yii::t('app', 'Create News'), ['create'], ['class' => 'btn btn-success']) //Old button ?>
        
        <!-- Button Call modal-->
        <?= Html::button(Yii::t('app', 'Create News'),
            ['value'=>Url::to('index.php?r=news/create'),
            'class' => 'btn btn-success','id'=>'newsCreate-btn']) 
        ?>
        
        <?php 
        // Modal-----------------
            Modal::begin([
                'header'=>'<h4>Create News</h4>',
                    'id'=>'modal',
                    'size'=>'modal-lg',
            ]);
            
            echo "<div id='modalContent'></div>";
            Modal::end();
        ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            //'id',
            [
                'attribute'=>'รูปภาพ',                                           //title
                'format' => ['image',['width'=>'60','height'=>'60']],         //Set width,height
                'value' => function($model){
                    return $model->getImageUrl();                               //Get function in product model
                }
            ],
            //'pic',
            'title',
            'type',
            'author',
            'sort_order',
            // 'date_update',
            'date_create',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
