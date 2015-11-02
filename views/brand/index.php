<?php

use yii\helpers\Html;
use yii\grid\GridView;

//For modal----------------
use yii\helpers\Url;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BrandSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Brands';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="brand-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php // Html::a('Create Brand', ['create'], ['class' => 'btn btn-success']) ?>
        
         <!-- Button Call modal-->
        <?= Html::button(Yii::t('app', 'Create Brand'),
            ['value'=>Url::to('index.php?r=news/create'),
            'class' => 'btn btn-success','id'=>'brandCreate-btn']) 
        ?>
        
        <?php 
        // Modal-----------------
            Modal::begin([
                'header'=>'<h4>Create Brand</h4>',
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
            ['class' => 'yii\grid\SerialColumn'],
            'brand_id',
            [
                'attribute'=>'รูปภาพ',                                           //title
                'format' => ['image',['width'=>'100','height'=>'100']],         //Set width,height
                'value' => function($model){
                    return $model->getImageUrl();                               //Get function in product model
                }
            ],
            'brand',
            'logo',
            'popular',
            'brand_list',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
