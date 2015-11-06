<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\YssFeatureSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="yss-feature-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'feature') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'description_th') ?>

    <?= $form->field($model, 'description_en') ?>

    <?php // echo $form->field($model, 'remark') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
