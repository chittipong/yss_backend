<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ApplicationList */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="application-list-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'brand')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cc')->textInput() ?>

    <?= $form->field($model, 'model')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ref_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'abe1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'year')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'product_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'abe_shock')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'length')->textInput() ?>

    <?= $form->field($model, 'top')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bottom')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'spring')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'piston')->textInput() ?>

    <?= $form->field($model, 'shaft')->textInput() ?>

    <?= $form->field($model, 'preload')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rebound')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'compression')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'length_adjst')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hydraulic')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'emulsion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'piggy_back')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'on_host')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'free_piston')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dtg')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'vehicle_type')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
