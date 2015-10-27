<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Word */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="word-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'TH')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'EN')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'L3')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'L4')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'L5')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'L6')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'L7')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'L8')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
