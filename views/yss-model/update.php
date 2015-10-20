<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\YssModel */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Yss Model',
]) . ' ' . $model->model_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Yss Models'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->model_id, 'url' => ['view', 'id' => $model->model_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="yss-model-update">

<!--    <h1><?= Html::encode($this->title) ?></h1>-->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
