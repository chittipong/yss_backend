<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\YssModel */

$this->title = Yii::t('app', 'Create Yss Model');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Yss Models'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="yss-model-create">

<!--    <h1><?= Html::encode($this->title) ?></h1>-->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
