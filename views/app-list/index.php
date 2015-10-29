<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AppListSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'App Lists');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="app-list-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
    <p>
        <?= Html::a(Yii::t('app', 'Create App List'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
           // ['class' => 'yii\grid\SerialColumn'],

            'id',
            'product_code',
            'brandName.brand',
            [
              'attribute'=>'brand',
                'value'=>'brandName.brand',
                'filter'=> ArrayHelper::map(app\models\Brand::find()->all(),'brand_id','brand'),
            ],
            'cc',
            'model',
            'ref_no',
             'abe1',
             'year',
             'type',
             'abe_shock',
             'length',
             'top',
             'bottom',
             'spring',
             'piston',
             'shaft',
             'preload',
             'rebound',
             'compression',
             'length_adjust',
             'hydraulic',
             'emulsion',
             'piggy_back',
             'on_hose',
             'free_piston',
             'dtg',
             //'vehicle_type',
             //'vehicle.name',
            [
              'attribute'=>'vehicle_type',
                'value'=>'vehicle.name',
                'filter'=> ArrayHelper::map(app\models\Vehicle::find()->all(),'id','name'),
            ],
             'pic',
            [
                'attribute' => 'รูปภาพ', //title
                'format' => ['image', ['width' => '60', 'height' => '60']], //Set width,height
                'value' => function($model) {
                    return $model->getImageUrl();                               //Get function in product model
                }
            ],
             'date_create',
             'date_update',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
