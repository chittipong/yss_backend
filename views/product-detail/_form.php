<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\ProductDetail */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="col-lg-8">
<div class="panel panel-primary">
 <div class="panel-heading"><h3><?= Html::encode($this->title) ?></h3></div>
  <div class="panel-body">
            <div class="product-detail-form">
                <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>
                <?php // $form->field($model, 'lang')->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'lang')->dropDownList($model->getLangList())?>

                <?= $form->field($model, 'product_id')->textInput() ?>

                <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'detail')->textarea(['rows' => 5]) ?>

                <?= $form->field($model, 'keyword')->textInput() ?>
                
                <?= $form->field($model, 'sort_order')->textInput(['type'=>'number']) ?>
                
                <?=$form->field($model,'main')->radioList(['Y'=>'Yes','N'=>'No'])?>

                <?=$form->field($model, 'file')->fileInput() ?>
                
                <!-- ตรวจสอบว่ามีรูปภาพหรือไม่ถ้ามีให้ดึงออกมาโชว์และมีปุ่ม delete -->
                <?php if($model->pic): ?>
                <div class="well">
                <?= Html::img(Url::to($model->detailDir.$model->pic),['class'=>'thumbnail','width'=>'300']) //แสดงรูปภาพ ?>
                <?= Html::a(
                        '<i class="glyphicon glyphicon-trash"></i>',
                        ['deleteimage','id'=>$model->id,'dir'=>$model->detailDir,'field'=>'pic'],
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
