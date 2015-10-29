<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ImporterCat */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="importer-cat-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->field($model,'lang')->dropDownList($model->getLangList())?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?php // $form->field($model, 'status')->textInput(['maxlength' => true]) ?>
    
    <?=$form->field($model,'status')->radioList(['enable'=>'Enable','disable'=>'Disable'])?>

    <?php // $form->field($model, 'lang')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'sort_order')->textInput(['type'=>'number']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
