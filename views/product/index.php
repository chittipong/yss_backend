<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Product', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute'=>'รูปภาพ',                                           //title
                'format' => ['image',['width'=>'60','height'=>'60']],         //Set width,height
                'value' => function($model){
                    return $model->getImageUrl();                               //Get function in product model
                }
            ],
            'product_id',
            'code',
            'brand.brand',
            'model.model',
            'pgroup.group',
            'ptype.type',
            // 'abeflag',
            // 'hyd',
            // 'emu',
            // 'res',
            // 'type',
            // 'top',
            // 'bot',
            // 'image',
            // 'contenttype',
            // 'image_name',
            // 'Thumbnails',
            // 'closeflag',
            // 'spring',
            // 'length',
            // 'piston',
            // 'shaft',
            // 'preload',
            // 'rebound',
            // 'compression',
            // 'length_adjuster',
            // 'hydraulic',
            // 'emulsion',
            // 'piggy_back',
            // 'on_hose',
            // 'free_piston',
            // 'dtg',
            // 'create_by',
            // 'update_by',
            // 'date_create',
            // 'date_update',
            // 'price',
            // 'discount',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
