<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MenuSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="menu-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'specific_name') ?>

    <?= $form->field($model, 'TH') ?>

    <?= $form->field($model, 'EN') ?>

    <?= $form->field($model, 'L3') ?>

    <?php // echo $form->field($model, 'L4') ?>

    <?php // echo $form->field($model, 'L5') ?>

    <?php // echo $form->field($model, 'L6') ?>

    <?php // echo $form->field($model, 'L7') ?>

    <?php // echo $form->field($model, 'L8') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
