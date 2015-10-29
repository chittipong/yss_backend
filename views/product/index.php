<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;

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

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'รูปภาพ', //title
                'format' => ['image', ['width' => '60', 'height' => '60']], //Set width,height
                'value' => function($model) {
                    return $model->getImageUrl();                               //Get function in product model
                }
            ],
            
                    'product_id',
                    //Custom Lik-------------
                          /*  [
                                'label'=>'Custom Link',
                                'format'=>'raw',
                                'value' => function($dataProvider){
                                    $url = ['product/view','id'=>$dataProvider->product_id];
                                    return Html::a('Detail', $url, ['title' => 'Go']);
                                }
                            ],*/
                    'code',
                    //'model.model',
                    [
                        'attribute'=>'model_id',
                        'value'=>'model.model',
                        'filter'=> ArrayHelper::map(app\models\YssModel::find()->all(),'model_id','model'),
                     ],
                    //'brand.brand',
                    [
                        'attribute'=>'brand_id',
                        'value'=>'brand.brand',
                        'filter'=> ArrayHelper::map(app\models\Brand::find()->all(),'brand_id','brand'),
                     ],
                    //'pgroup.group',
                    [
                        'attribute'=>'product_group',
                        'value'=>'pgroup.group',
                        'filter'=> ArrayHelper::map(app\models\ProductGroup::find()->all(),'group','detail'),
                     ],
                    //'ptype.type',
                    [
                        'attribute'=>'product_type',
                        'value'=>'ptype.type',
                        'filter'=> ArrayHelper::map(app\models\ProductType::find()->all(),'type','detail'),
                     ],
                     'abeflag',
                     'hyd',
                     'emu',
                     'res',
                     'type',
                     'top',
                     'bot',
                     'image',
                     'contenttype',
                     'image_name',
                     'Thumbnails',
                     'closeflag',
                     'spring',
                     'length',
                     'piston',
                     'shaft',
                     'preload',
                     'rebound',
                     'compression',
                     'length_adjuster',
                     'hydraulic',
                     'emulsion',
                     'piggy_back',
                     'on_hose',
                     'free_piston',
                     'dtg',
                     //'create_by',
                     //'update_by',
                     //'date_create',
                     //'date_update',
                     'price',
                     'discount',
                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]);
            ?>

</div>
