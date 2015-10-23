<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Content */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="content-form">

    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>

    <?php // $form->field($model, 'page')->textInput() ?>
    
    <?= $form->field($model,'page')->dropDownList($model->getPageList())?>

    <?= $form->field($model, 'position')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'detail')->textarea(['row' =>6]) ?>

    <?php //$form->field($model, 'pic')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model,'lang')->dropDownList($model->getLangList())?>
    
    <?=$form->field($model, 'file')->fileInput() ?>

    <?php // $form->field($model, 'lang')->textInput(['maxlength' => true]) ?>

    <?php // $form->field($model, 'date_create')->textInput(['maxlength' => true]) ?>

    <?php // $form->field($model, 'date_update')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
