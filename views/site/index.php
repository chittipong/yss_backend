<?php

/* @var $this yii\web\View */
use yii\grid\GridView;
use yii\helpers\Html;
use yii\base\Widget;
use yii\widgets;

$this->title = 'YSS ADMINISTRATOR';
?>
<div class="site-index">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><h4>Products</h4></div>
                     <div class="panel-body">
                            <?= GridView::widget([
                                'dataProvider' => $dataProvider,
                                'filterModel' => $searchModel,
                                'columns' => [
                                    //['class' => 'yii\grid\SerialColumn'],
                                    //'product_id',
                                    /*[
                                        'attribute'=>'รูปภาพ',                                           //title
                                        'format' => ['image',['width'=>'60','height'=>'60']],           //Set width,height
                                        'value' => function($model){
                                            return $model->getImageUrl();                               //Get function in product model
                                        }
                                    ],*/
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
                                     'preload',
                                     'rebound',
                                     'compression',
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

                                    //['class' => 'yii\grid\ActionColumn'],
                                ],
                            ]); ?>
                     </div></div>
            </div>
        </div>
    </div>
</div>
