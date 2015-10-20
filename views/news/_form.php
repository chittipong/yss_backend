<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\News */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="col-lg-8">
<div class="panel panel-default">
    <div class="panel-heading"><h3><?= Html::encode($this->title) ?></h3></div>
  <div class="panel-body">
<div class="download-form">
<div class="news-form">

    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>
    
    <?= $form->field($model, 'type')->dropDownList([ 'NEWS' => 'NEWS', 'EVENT' => 'EVENT', ], ['prompt' => 'Select...']) ?>
    
    <?php // $form->field($model, 'author')->textInput(['maxlength' => true]) ?>

    <?=  $form->field($model, 'title')->textInput() ?>

    <?= $form->field($model, 'detail')->textarea(['row'=>5]) ?>
    
    <?= $form->field($model, 'sort_order')->textInput(['type'=>'number']) ?>
    
    <?php // $form->field($model, 'pic')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model,'file')->fileInput()?>
    
    <!-- ตรวจสอบว่ามีรูปภาพหรือไม่ถ้ามีให้ดึงออกมาโชว์และมีปุ่ม delete -->
                <?php if($model->pic): ?>
                <div class="well">
                <?= Html::img(Url::to($model->newsDir.$model->pic),['class'=>'thumbnail','width'=>'300']) //แสดงรูปภาพ ?>
                <?= Html::a(
                        '<i class="glyphicon glyphicon-trash"></i>',
                        ['deleteimage','id'=>$model->id,'dir'=>$model->newsDir,'field'=>'pic'],
                        ['class'=>'btn btn-danger']
                    )//แสดงปุ่ม delete
                ?>
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
</div>