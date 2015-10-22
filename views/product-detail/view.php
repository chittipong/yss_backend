<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ProductDetail */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Product Details'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-detail-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', '<i class="glyphicon glyphicon-edit"></i> Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', '<i class="glyphicon glyphicon-trash"></i> Delete'), ['delete', 'id' => $model->id],[
            'class' => 'btn btn-danger',
            'style'=>'float:right',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
              'attribute'=>'photo',
              'value'=>$model->detailDir.$model->pic,
              'format'=>['image',['width'=>'400','title'=>$model->pic]]                              //Set Image Width
            ],
            'product_id',
            'title',
            'detail',
            'lang',
            'keyword:ntext',
            'main',
            'sort_order'
        ],
    ]) ?>

</div>
