<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AwardSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="award-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'title_th') ?>

    <?= $form->field($model, 'title_en') ?>

    <?= $form->field($model, 'title_l3') ?>

    <?= $form->field($model, 'title_l4') ?>

    <?php // echo $form->field($model, 'title_l5') ?>

    <?php // echo $form->field($model, 'title_l6') ?>

    <?php // echo $form->field($model, 'title_l7') ?>

    <?php // echo $form->field($model, 'title_l8') ?>

    <?php // echo $form->field($model, 'detail_th') ?>

    <?php // echo $form->field($model, 'detail_en') ?>

    <?php // echo $form->field($model, 'detail_l3') ?>

    <?php // echo $form->field($model, 'detail_l4') ?>

    <?php // echo $form->field($model, 'detail_l5') ?>

    <?php // echo $form->field($model, 'detail_l6') ?>

    <?php // echo $form->field($model, 'detail_l7') ?>

    <?php // echo $form->field($model, 'detail_l8') ?>

    <?php // echo $form->field($model, 'pic') ?>

    <?php // echo $form->field($model, 'date_create') ?>

    <?php // echo $form->field($model, 'date_update') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
