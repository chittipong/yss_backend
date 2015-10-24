<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\YssSlide */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Yss Slide',
]) . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Yss Slides'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id, 'slide_name' => $model->slide_name]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="yss-slide-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
