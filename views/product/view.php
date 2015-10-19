<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Product */

$this->title = $model->product_id;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->product_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->product_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

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
            'model.model',
            'pgroup.detail',
            'ptype.detail',
            'price',
            'discount',
            'abeflag',
            //'hyd',
            //'emu',
            //'res',
            'type',
            'top',
            'bot',
            //'image',
            //'contenttype',
            //'image_name',
            //'Thumbnails',
            //'closeflag',
            'spring',
            'length',
            'piston',
            'shaft',
            'option.detail',
            'rebound',
            'compression',
            'length_adjuster',
            'hydraulic',
            'emulsion',
            'piggy_back',
            'on_hose',
            'free_piston',
            'dtg',
            'create_by',
            'update_by',
            'date_create',
            'date_update',
        ],
    ]) ?>

</div>
