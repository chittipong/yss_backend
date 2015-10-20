<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Brand */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="col-lg-8">
<div class="panel panel-default">
 <div class="panel-heading"><h3><?= Html::encode($this->title) ?></h3></div>
  <div class="panel-body">
        <div class="brand-form">

        <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>

        <?= $form->field($model, 'brand')->textInput(['maxlength' => true]) ?>

        <?php // $form->field($model, 'logo')->textInput(['maxlength' => true]) ?>
        <?=$form->field($model,'file')->fileInput()?>

        <!-- ตรวจสอบว่ามีรูปภาพหรือไม่ถ้ามีให้ดึงออกมาโชว์และมีปุ่ม delete -->
                    <?php if($model->logo): ?>
                    <div class="well">
                    <?= Html::img(Url::to($model->brandDir.$model->logo),['class'=>'thumbnail','width'=>'300']) //แสดงรูปภาพ ?>
                    <?= Html::a(
                            '<i class="glyphicon glyphicon-trash"></i>',
                            ['deleteimage','id'=>$model->brand_id,'dir'=>$model->brandDir,'field'=>'logo'],
                            ['class'=>'btn btn-danger']
                        )//แสดงปุ่ม delete
                    ?>
                    </div>
                    <?php endif; ?>

        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
  </div>
</div>
