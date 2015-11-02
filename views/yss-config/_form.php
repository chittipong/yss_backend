<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\YssConfig */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="yss-config-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php  // $form->field($model, 'id')->textInput() ?>

    <?= $form->field($model, 'company_th')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'company_en')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tel1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tel2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tel3')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fax1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fax2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'default_mail')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'admin_mail')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'support_mail')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sale_mail')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'contact_mail')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'info_mail')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address_th')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address_en')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'district_th')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'district_en')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'province_th')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'province_en')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'zipcode')->textInput() ?>
    
    <?= $form->field($model, 'country_th')->textInput() ?>
    
    <?= $form->field($model, 'country_en')->textInput() ?>
    
    <?= $form->field($model, 'work_hour_th')->textInput() ?>
    
    <?= $form->field($model, 'work_hour_en')->textInput() ?>

    <?php // $form->field($model, 'date_create')->textInput() ?>

    <?php // $form->field($model, 'date_update')->textInput() ?>

    <?php // $form->field($model, 'update_by')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
