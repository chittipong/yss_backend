<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Award */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="award-form">
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
    <div class="col-lg-6">
        <?= $form->field($model, 'title_th')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'detail_th')->textarea(['rows' => 6]) ?>

        <?= $form->field($model, 'title_en')->textInput(['maxlength' => true]) ?>
        
        <?= $form->field($model, 'detail_en')->textarea(['rows' => 6]) ?>

        <?= $form->field($model, 'title_l3')->textInput(['maxlength' => true]) ?>
        
         <?= $form->field($model, 'detail_l3')->textarea(['rows' => 6]) ?>

        <?= $form->field($model, 'title_l4')->textInput(['maxlength' => true]) ?>
        
        <?= $form->field($model, 'detail_l4')->textarea(['rows' => 6]) ?>

    </div>

    <div class="col-lg-6">
        <?= $form->field($model, 'title_l5')->textInput(['maxlength' => true]) ?>
        
        <?= $form->field($model, 'detail_l5')->textarea(['rows' => 6]) ?>
        
        <?= $form->field($model, 'title_l6')->textInput(['maxlength' => true]) ?>
        
        <?= $form->field($model, 'detail_l6')->textarea(['rows' => 6]) ?>

        <?= $form->field($model, 'title_l7')->textInput(['maxlength' => true]) ?>
        
        <?= $form->field($model, 'detail_l7')->textarea(['rows' => 6]) ?>

        <?= $form->field($model, 'title_l8')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'detail_l8')->textarea(['rows' => 6]) ?>

        <?php // $form->field($model, 'pic')->textInput(['maxlength' => true]) ?>
        
        <?= $form->field($model, 'sort_order')->textInput(['type' => 'number']) ?>

        <?= $form->field($model, 'file')->fileInput() ?>
        <!-- ตรวจสอบว่ามีรูปภาพหรือไม่ถ้ามีให้ดึงออกมาโชว์และมีปุ่ม delete -->
        <?php if ($model->pic): ?>
            <div class="well">
                <?= Html::img(Url::to($model->awardDir . $model->pic), ['class' => 'thumbnail', 'width' => '300']) //แสดงรูปภาพ ?>
                <?=
                Html::a(
                        '<i class="glyphicon glyphicon-trash"></i>', ['deleteimage', 'id' => $model->id, 'dir' => $model->awardDir, 'field' => 'pic'], ['class' => 'btn btn-danger']
                )//แสดงปุ่ม delete
                ?>
            </div>
        <?php endif; ?>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
