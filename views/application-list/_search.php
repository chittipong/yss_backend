<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ApplicationListSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="application-list-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'brand') ?>

    <?= $form->field($model, 'cc') ?>

    <?= $form->field($model, 'model') ?>

    <?= $form->field($model, 'ref_no') ?>

    <?php // echo $form->field($model, 'abe1') ?>

    <?php // echo $form->field($model, 'year') ?>

    <?php // echo $form->field($model, 'type') ?>

    <?php // echo $form->field($model, 'product_code') ?>

    <?php // echo $form->field($model, 'abe_shock') ?>

    <?php // echo $form->field($model, 'length') ?>

    <?php // echo $form->field($model, 'top') ?>

    <?php // echo $form->field($model, 'bottom') ?>

    <?php // echo $form->field($model, 'spring') ?>

    <?php // echo $form->field($model, 'piston') ?>

    <?php // echo $form->field($model, 'shaft') ?>

    <?php // echo $form->field($model, 'preload') ?>

    <?php // echo $form->field($model, 'rebound') ?>

    <?php // echo $form->field($model, 'compression') ?>

    <?php // echo $form->field($model, 'length_adjst') ?>

    <?php // echo $form->field($model, 'hydraulic') ?>

    <?php // echo $form->field($model, 'emulsion') ?>

    <?php // echo $form->field($model, 'piggy_back') ?>

    <?php // echo $form->field($model, 'on_host') ?>

    <?php // echo $form->field($model, 'free_piston') ?>

    <?php // echo $form->field($model, 'dtg') ?>

    <?php // echo $form->field($model, 'vehicle_type') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
