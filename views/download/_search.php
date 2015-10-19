<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DownloadSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="download-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'product_id') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'detail') ?>

    <?= $form->field($model, 'file_type') ?>

    <?php // echo $form->field($model, 'category') ?>

    <?php // echo $form->field($model, 'lang') ?>

    <?php // echo $form->field($model, 'sort_order') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
