<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\News */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'News'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-view">

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
        <?= Html::a(Yii::t('app', 'Insert Detail'),['news-detail/create','id'=>$model->id],['class'=>'btn btn-success'])?>
    </p>
    
<div class="panel panel-primary">
  <div class="panel-heading">News Detail</div>
  <div class="panel-body">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
              'attribute'=>'photo',
              'value'=>$model->newsDir.$model->pic,
              'format'=>['image',['width'=>'400','title'=>$model->pic]]                              //Set Image Width
            ],
            'type',
            //'pic',
            'author',
            'sort_order',
            'title',
            'detail',
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

<div class="panel panel-primary">
  <div class="panel-heading">News Detail</div>
  <div class="panel-body">
     <?= GridView::widget([
        'dataProvider' => $newsDetail,
        'columns' => [
            'id',
            'news_id',
            'title',
            'detail',
            'sort_order',
            'lang',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
</div>
