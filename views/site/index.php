<?php
/* @var $this yii\web\View */

use yii\grid\GridView;
use yii\helpers\Html;
use yii\base\Widget;
use yii\widgets;
use yii\helpers\ArrayHelper;

//For modal----------------
use yii\helpers\Url;
use yii\bootstrap\Modal;

$this->title = 'YSS ADMINISTRATOR';
?>
<div class="site-index">
    <div>
        <h2>Product</h2>
        <?php
        //echo Yii::$app->user->isGuest;
        //echo Yii::$app->user->identity->
        ?>
        <div class="row">
            <?= Html::a('Create Product', ['product/create'], ['class' => 'btn btn-success']) ?>
            <div class="col-lg-12">
                <?=
                GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'columns' => [
                        //['class' => 'yii\grid\SerialColumn'],
                        //'product_id',
                        [
                            'attribute' => 'รูปภาพ', //title
                            'format' => ['image', ['width' => '60', 'height' => '60']], //Set width,height
                            'value' => function($model) {
                                        return $model->getImageUrl();                               //Get function in product model
                                       }
                        ],
                        /* [
                          'label' => 'Custom Link',
                          'format' => 'raw',
                          'value' => function($dataProvider) {
                          $url = ['product/view', 'id' => $dataProvider->product_id];
                          return Html::a('<button type="button" class="btn btn-i">'.$dataProvider->code.'</button>', $url, ['title' => 'Go']);
                          }
                          ], */
                        'code',
//                        [
//                          'label'=>'Product Code',
//                            'format'=>'html',
//                            'value' => function($dataProvider) {
//                                $url = ['product/view', 'id' => $dataProvider->product_id];
//                                return Html::a('<button type="button" class="btn btn-i">'.$dataProvider->code.'</button>', $url, ['title' => 'Go']);
//                            }
//                        ],
                        //'model_id',
                        [
                            'attribute' => 'model_id',
                            'value' => 'model.model',
                            'filter' => ArrayHelper::map(app\models\YssModel::find()->all(), 'model_id', 'model'),
                        ],
                        //'brand.brand',
                        [
                            'attribute' => 'brand_id',
                            'value' => 'brand.brand',
                            'filter' => ArrayHelper::map(app\models\Brand::find()->all(), 'brand_id', 'brand'),
                        ],
                        //'pgroup.group',
                        [
                            'attribute' => 'product_group',
                            'value' => 'pgroup.group',
                            'filter' => ArrayHelper::map(app\models\ProductGroup::find()->all(), 'group', 'detail'),
                        ],
                        //'ptype.type',
                        [
                            'attribute' => 'product_type',
                            'value' => 'ptype.type',
                            'filter' => ArrayHelper::map(app\models\ProductType::find()->all(), 'type', 'detail'),
                        ],
                        'abeflag',
                        //'hyd',
                        //'emu',
                        //'res',
                        //'type',
                        //'top',
                        //'bot',
                        'image',
                       //'contenttype',
                       //'image_name',
                       // 'Thumbnails',
                       // 'closeflag',
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
                         'new',
                         'hot',
                         'promotion',
                         'best_seller',
                        // 'create_by',
                        // 'update_by',
                        // 'date_create',
                        // 'date_update',
                        // 'price',
                        // 'discount',
                        //Custom Lik-------------
                        [
                            'label' => '...',
                            'format' => 'raw',
                            'value' => function($dataProvider) {
                                $url = ['product/view', 'id' => $dataProvider->product_id];
                                return Html::a('<button type="button" class="btn btn-info"><i class="glyphicon glyphicon-eye-open"></i> Detail</button>', $url, ['title' => 'Go']);
                            }
                                ],
                            //['class' => 'yii\grid\ActionColumn'],
                            ],
                        ]);
                        ?>
                    </div>
                </div>


                <div>
                    <h2>News</h2>
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
                    <?php //echo $this->render('_search', ['model' => $searchModel]); ?>
                    <?=
                    GridView::widget([
                        'dataProvider' => $newsData,
                        'filterModel' => $searchNewsModel,
                        'columns' => [
                            //['class' => 'yii\grid\SerialColumn'],
                            //'id',
                            [
                                'attribute' => 'รูปภาพ', //title
                                'format' => ['image', ['width' => '60', 'height' => '60']], //Set width,height
                                'value' => function($model) {
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
                            //Custom Lik-------------
                            [
                                'label' => '...',
                                'format' => 'raw',
                                'value' => function($dataProvider) {
                                    $url = ['news/view', 'id' => $dataProvider->id];
                                    return Html::a('<button type="button" class="btn btn-info"><i class="glyphicon glyphicon-eye-open"></i> Detail</button>', $url, ['title' => 'Go']);
                                }
                                    ],
                                // ['class' => 'yii\grid\ActionColumn'],
                                ],
                            ]);
                            ?>

        </div>

    </div>
</div>
