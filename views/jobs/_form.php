<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Jobs */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="jobs-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'job_position')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'qty')->textInput(['type' => 'number']) ?>
    
    <?= $form->field($model, 'exp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'job_description')->textarea(['rows' => 6]) ?>

    <?php // $form->field($model, 'sex')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'sex')->dropDownList([ 'male' => 'ชาย', 'female' => 'หญิง', 'both' => 'ชาย-หญิง', ], ['prompt' => 'Select...']) ?>

    <?= $form->field($model, 'age')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'education')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'salary')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'contact_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'contact_email')->textInput(['type' => 'email']) ?>

    <?= $form->field($model, 'contact_tel')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'sort_order')->textInput(['type' => 'number']) ?>
    
    <?= $form->field($model, 'enable')->radioList(['Y' => 'Yes', '-' => 'No']) ?>

    <?php // $form->field($model, 'date_create')->textInput() ?>

    <?php // $form->field($model, 'update_date')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
