<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProductSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'product_id') ?>

    <?= $form->field($model, 'brand_id') ?>

    <?= $form->field($model, 'model_id') ?>

    <?= $form->field($model, 'product_group') ?>

    <?= $form->field($model, 'product_type') ?>

    <?php // echo $form->field($model, 'abeflag') ?>

    <?php // echo $form->field($model, 'hyd') ?>

    <?php // echo $form->field($model, 'emu') ?>

    <?php // echo $form->field($model, 'res') ?>

    <?php // echo $form->field($model, 'code') ?>

    <?php // echo $form->field($model, 'type') ?>

    <?php // echo $form->field($model, 'top') ?>

    <?php // echo $form->field($model, 'bot') ?>

    <?php // echo $form->field($model, 'image') ?>

    <?php // echo $form->field($model, 'contenttype') ?>

    <?php // echo $form->field($model, 'image_name') ?>

    <?php // echo $form->field($model, 'Thumbnails') ?>

    <?php // echo $form->field($model, 'closeflag') ?>

    <?php // echo $form->field($model, 'spring') ?>

    <?php // echo $form->field($model, 'length') ?>

    <?php // echo $form->field($model, 'piston') ?>

    <?php // echo $form->field($model, 'shaft') ?>

    <?php // echo $form->field($model, 'preload') ?>

    <?php // echo $form->field($model, 'rebound') ?>

    <?php // echo $form->field($model, 'compression') ?>

    <?php // echo $form->field($model, 'length_adjuster') ?>

    <?php // echo $form->field($model, 'hydraulic') ?>

    <?php // echo $form->field($model, 'emulsion') ?>

    <?php // echo $form->field($model, 'piggy_back') ?>

    <?php // echo $form->field($model, 'on_hose') ?>

    <?php // echo $form->field($model, 'free_piston') ?>

    <?php // echo $form->field($model, 'dtg') ?>

    <?php // echo $form->field($model, 'create_by') ?>

    <?php // echo $form->field($model, 'update_by') ?>

    <?php // echo $form->field($model, 'date_create') ?>

    <?php // echo $form->field($model, 'date_update') ?>

    <?php // echo $form->field($model, 'price') ?>

    <?php // echo $form->field($model, 'discount') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
