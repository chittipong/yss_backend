<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\NewsDetail */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'News Detail',
]) . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'News Details'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id, 'news_id' => $model->news_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="news-detail-update">

<!--    <h1><?= Html::encode($this->title) ?></h1>-->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
