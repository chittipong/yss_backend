<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\NewsDetail */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'News Details'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-detail-view">

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
            'id',
            [
                        'attribute' => 'pic',
                        'value' => $model->newsDetailDir . $model->pic,
                        'format' => ['image', ['width' => '400', 'title' => $model->pic]]                              //Set Image Width
                    ],
            'news_id',
            'title',
            'detail',
            'sort_order',
            'lang',
            'main',
        ],
    ]) ?>

</div>
