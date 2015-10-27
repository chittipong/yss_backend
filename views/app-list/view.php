<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\AppList */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'App Lists'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="app-list-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //DISPLAY IMAGE--------------------
                        [
                          'attribute'=>'Pic',
                          'value'=>$model->productDir.$model->pic,
                          'format'=>['image',['width'=>'400','title'=>$model->pic]]                              //Set Image Width
                        ],
            'id',
            'brandName.brand',
            'cc',
            'model',
            'ref_no',
            'abe1',
            'year',
            'type',
            'product_code',
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
            'vehicle.name',
            'pic',
            'date_create',
            'date_update',
        ],
    ]) ?>

</div>
