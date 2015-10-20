<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Download */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="col-lg-8">
<div class="panel panel-default">
    <div class="panel-heading"><h3><?= Html::encode($this->title) ?></h3></div>
  <div class="panel-body">
<div class="download-form">

    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>

    <?php // $form->field($model, 'download_cat_id')->textInput() ?>
    <?= $form->field($model, 'download_cat_id')->dropDownList($model->getCatList(),['prompt'=>'Select Category'])?>
    
    <?php //$form->field($model, 'lang')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model,'lang')->dropDownList($model->getLangList())?>

    <?= $form->field($model, 'product_id')->textInput() ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'detail')->textarea(['rows' => 6]) ?>

    <?php // $form->field($model, 'file_folder')->textInput(['maxlength' => true]) ?>

    <?php // $form->field($model, 'file_name')->textInput(['maxlength' => true]) ?>

    <?php // $form->field($model, 'file_size')->textInput(['maxlength' => true]) ?>

    <?php // $form->field($model, 'status')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'file')->fileInput() ?>
    
    <!--CHECK FILE WHEN EDIT==================-->
    <?php if($model->file_name): ?>
    <div class="well"> <strong>Current File:</strong> <?=$model->file_name ?>
    <!--DELETE BUTTON--------!>
            <?=Html::a('<i class="glyphicon glyphicon-trash"></i>',
                   ['deleteimage','id'=>$model->id,'dir'=>$model->downloadDir,'field'=>'file_name'],//เรียกฟังชั่น delete file และส่งค่า id และ field = photo ไปด้วย
            ['class'=>'btn btn-danger'])?>
    </div>
    <?php endif; ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
    </div>
    </div>
        </div>
