<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\YssSlide */

$this->title = Yii::t('app', 'Create Yss Slide');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Yss Slides'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="yss-slide-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
