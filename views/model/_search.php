<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ModelSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="model-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'model_id') ?>

    <?= $form->field($model, 'brand_id') ?>

    <?= $form->field($model, 'model') ?>

    <?= $form->field($model, 'abeflag') ?>

    <?= $form->field($model, 'year') ?>

    <?php // echo $form->field($model, 'start') ?>

    <?php // echo $form->field($model, 'end') ?>

    <?php // echo $form->field($model, 'len') ?>

    <?php // echo $form->field($model, 'cc') ?>

    <?php // echo $form->field($model, 'Manafacturer_Code') ?>

    <?php // echo $form->field($model, 'abe') ?>

    <?php // echo $form->field($model, 'closeflag') ?>

    <?php // echo $form->field($model, 'imgpath') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
