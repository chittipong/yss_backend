<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use yii\widgets\ListView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Product */

$this->title = $model->product_id;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('<i class="glyphicon glyphicon-edit"></i> Update', ['update', 'id' => $model->product_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('<i class="glyphicon glyphicon-trash"></i> Delete', ['delete', 'id' => $model->product_id], [
            'class' => 'btn btn-danger',
            'style'=>'float:right',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
        
        <?= Html::a(Yii::t('app', '<i class="glyphicon glyphicon-plus"></i>เพิ่ม Detail(ภาษาอื่น)'),['product-detail/create','id'=>$model->product_id],['class'=>'btn btn-success'])?>
    </p>

    
    <ul id="myTabs" class="nav nav-tabs" role="tablist">
      <li role="presentation" class="active"><a href="#main" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">Detail</a></li>
      <li role="presentation" class=""><a href="#productDetail" role="tab" id="profile-tab" data-toggle="tab" aria-controls="product" aria-expanded="false">Detail(ภาษาอื่น)</a></li>
      
    </ul>
    <div id="myTabContent" class="tab-content">
      <div role="tabpanel" class="tab-pane fade active in" id="main" aria-labelledby="home-tab">
          <div class="row" style="margin-top:20px;">
          <div class="col-lg-6">
          <div class="panel panel-default">
            <div class="panel-heading">ข้อมูลสินค้า</div>
            <div class="panel-body">
                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        //DISPLAY IMAGE--------------------
                        [
                          'attribute'=>'photo',
                          'value'=>$model->productDir.$model->image,
                          'format'=>['image',['width'=>'400','title'=>$model->image]]                              //Set Image Width
                        ],
                        //'product_id',
                        'code',
                        'brand.brand',
                        'type',
                        'model.model',
                        'pgroup.detail',
                        'ptype.detail',
                        'price',
                        'discount',
                        'title',
                        'detail',
                        'lang',
                    ],
                ]) ?>
            </div>
          </div>
          </div>
          
          
          <div class="col-lg-6">
          <div class="panel panel-default">
            <div class="panel-heading">ข้อมูลทางเทคนิค</div>
            <div class="panel-body">
                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        'spring',
                        'length',
                        'piston',
                        'shaft',
                        'option.detail',
                        'rebound',
                        'compression',
                        'length_adjuster',
                        'abeflag',
                        //'hyd',
                        //'emu',
                        //'res',
                        'top',
                        'bot',
                        //'image',
                        //'contenttype',
                        //'image_name',
                        //'Thumbnails',
                        //'closeflag',
                        'hydraulic',
                        'emulsion',
                        'piggy_back',
                        'on_hose',
                        'free_piston',
                        'dtg',
                        'create_by',
                        'update_by',
                        //'date_create',
                        //'date_update',
                        [
                            'attribute' => 'date_create',
                            'format' => ['date', 'php:d-M-Y h:i:s']
                        ],
                        [
                            'attribute' => 'date_update',
                            'format' => ['date', 'php:d-M-Y h:i:s']
                        ],
                    ],
                ]) ?>
            </div>
          </div>
          </div>
          </div>
          
      </div>
      <div role="tabpanel" class="tab-pane fade" id="tecnical" aria-labelledby="profile-tab">
         
      </div>
        
        
      <div role="tabpanel" class="tab-pane fade" id="productDetail" aria-labelledby="dropdown1-tab">
          <div class="panel panel-primary">
                <div class="panel-heading">Product Detail</div>
                <div class="panel-body">
                   <?= GridView::widget([
                      'dataProvider' => $prodDetail,
                      'columns' => [
                          'id',
                          [
                                  'attribute'=>'รูปภาพ',                                           //title
                                  'format' => ['image',['width'=>'60','height'=>'60']],           //Set width,height
                                  'value' => function($model){
                                        return $model->getImageUrl();                               //Get function in product model
                                  }
                           ], 
                          'lang',
                          'product_id',
                          'title',
                          'detail',
                          'keyword',
                          'main',     
                          //['class' => 'yii\grid\ActionColumn'],
                            
                                [
                                    'class' => 'yii\grid\ActionColumn',
                                    'template' => '{view} {update} {delete} {link}',
                                    'buttons' => [
                                        'view' => function ($url,$prodDetail) {
                                            $url = ['product-detail/view','id'=>$prodDetail->id];
                                            return Html::a('<span class="glyphicon glyphicon-eye-open"></span>',$url);
                                        },
                                       'update' => function ($url,$prodDetail) {
                                            $url = ['product-detail/update','id'=>$prodDetail->id];
                                            return Html::a('<span class="glyphicon glyphicon-pencil"></span>',$url);
                                        },
                                        'delete' => function ($url,$prodDetail) {
                                            $url = ['product-detail/delete','id'=>$prodDetail->id];
                                            return Html::a('<span class="glyphicon glyphicon-trash"></span>',$url);
                                        }
                                        
                                    ],
                                ],
                           

                      ],
                  ]); ?>
              </div>
              </div>
      </div>
    </div>
</div>
