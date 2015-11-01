<?php

use yii\helpers\Html;
use yii\grid\GridView;

//For modal----------------
use yii\helpers\Url;
use yii\bootstrap\Modal;
/* @var $this yii\web\View */
/* @var $searchModel app\models\ProductDetailSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Product Details');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-detail-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Product Detail'), ['create'], ['class' => 'btn btn-success']) ?>
       
    </p>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //'id',
            [
                'attribute'=>'รูปภาพ',                                           //title
                'format' => ['image',['width'=>'60','height'=>'60']],         //Set width,height
                'value' => function($model){
                    return $model->getImageUrl();                               //Get function in product model
                }
            ],
            'product_id',
            'title',
            'detail',
            'lang',
            [
                //ดึงค่ามาตรวจสอบแล้วแสดงในแบบที่ต้องการ-------
                'label' => 'Default',
                'format' => 'text',
                'value' => function($prodDetail) {
                    if ($prodDetail->main == 'Y') {
                        return 'Yes';
                    } else {
                        return '';
                    }
                }
            ],
            // 'keyword:ntext',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>

</div>
