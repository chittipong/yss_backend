<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Page */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Pages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('<i class="glyphicon glyphicon-edit"></i> Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('<i class="glyphicon glyphicon-trash"></i> Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'style'=>'float:right',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
        
        <?= Html::a(Yii::t('app', '<i class="glyphicon glyphicon-plus"></i>เพิ่ม Content'),['content/create','page_id'=>$model->id],['class'=>'btn btn-success'])?>
    </p>

<!-- ============PAGE===================-->
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'title',
            'sort_order',
        ],
    ]) ?>


<!-- ============CONTENT===================-->
    <?= GridView::widget([
        'dataProvider' => $content,
        //'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],
            'id',
            'lang',
            //'pic_title',
            //'refpage.title',
            'position',
            'layout',
            'title',
            'detail',
            // 'pic',
            'sort_order',
            // 'date_create',
            // 'date_update',

            //['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
