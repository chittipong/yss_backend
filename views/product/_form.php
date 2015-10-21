<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="container">
<div class="row">
<div class="product-form">
    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>
    <div class="col-lg-4">
    <div class="panel panel-primary">
        <div class="panel-heading">DETAIL</div>
                <div class="panel-body">
                  <?= $form->field($model, 'code')->textInput(['maxlength' => true]) ?>
                    
                  <?php //$form->field($model, 'piston')->textInput(['maxlength' => true]) ?>
                  <?=$form->field($model, 'piston')->dropDownList($model->getPistonList()) ?>

                  <?php // $form->field($model, 'shaft')->textInput(['maxlength' => true]) ?>
                  <?=$form->field($model, 'shaft')->dropDownList($model->getShaftList()) ?>
                    
                 <?= $form->field($model, 'length')->textInput(['maxlength' => true]) ?>
                    
                  <?php // $form->field($model, 'preload')->textInput(['maxlength' => true]) ?>
                  <?=$form->field($model, 'preload')->dropDownList($model->getOptionList(),['prompt'=>'Select Option']) ?>
                  
                  <?php  //$form->field($model, 'compression')->textInput(['maxlength' => true]) ?>
                  <?=$form->field($model, 'compression')->dropDownList($model->getCompresList(),['prompt'=>'Select Option']) ?>
                    
                  <?php // $form->field($model, 'brand_id')->textInput() ?>
                  <?= $form->field($model, 'brand_id')->dropDownList($model->getBrandList()) ?>

                  <?php // $form->field($model, 'model_id')->textInput() ?>
                  <?=$form->field($model, 'model_id')->dropDownList($model->getModelList()) ?>

                  <?php // $form->field($model, 'product_group')->textInput(['maxlength' => true]) ?>
                  <?=$form->field($model, 'product_group')->dropDownList($model->getPgroupList()) ?>

                  <?php // $form->field($model, 'product_type')->textInput(['maxlength' => true]) ?>
                  <?=$form->field($model, 'product_type')->dropDownList($model->getPtypeList()) ?>
                    
                  <?php // $form->field($model, 'type')->textInput(['maxlength' => true]) ?>
                  <?=$form->field($model, 'type')->dropDownList($model->getTypeList()) ?>
                    
            </div>
        </div>
    </div>
    
    
    <div class="col-lg-4">
            <div class="panel panel-primary">
                <div class="panel-heading">FEATURE & OPTION</div>
                <div class="panel-body">
                    
                  <?= $form->field($model, 'top')->textInput(['maxlength' => true]) ?>

                  <?= $form->field($model, 'bot')->textInput(['maxlength' => true]) ?>
                    
                  <?= $form->field($model, 'spring')->textInput(['maxlength' => true]) ?>
                    
                  <?php // $form->field($model, 'contenttype')->textInput(['maxlength' => true]) ?>

                  <?php //  $form->field($model, 'image_name')->textInput(['maxlength' => true]) ?>

                  <?php //  $form->field($model, 'Thumbnails')->textInput(['maxlength' => true]) ?>

                  <?php // $form->field($model, 'closeflag')->textInput() ?>

                  <?php // $form->field($model, 'hyd')->textInput() ?>
                  <?php //$form->field($model, 'hyd')->radioList([1=>'Yes',0=>'No'])?>

                  <?php // $form->field($model, 'emu')->textInput() ?>
                  <?php //$form->field($model, 'emu')->radioList([1=>'Yes',0=>'No'])?>
                    
                  <?php // $form->field($model, 'res')->textInput() ?>
                  <?php //$form->field($model,'res')->radioList([1=>'Yes',0=>'No'])?>
                    
                  
                  <?php // $form->field($model, 'rebound')->textInput(['maxlength' => true]) ?>
                  <?=$form->field($model,'rebound')->radioList(['Y'=>'Yes','-'=>'No'])?>

                  <?php // $form->field($model, 'length_adjuster')->textInput(['maxlength' => true]) ?>
                  <?=$form->field($model,'length_adjuster')->radioList(['Y'=>'Yes','-'=>'No'])?>

                  <?php // $form->field($model, 'hydraulic')->textInput(['maxlength' => true]) ?>
                  <?=$form->field($model,'hydraulic')->radioList(['Y'=>'Yes','-'=>'No'])?>

                  <?php // $form->field($model, 'emulsion')->textInput(['maxlength' => true]) ?>
                  <?=$form->field($model,'emulsion')->radioList(['Y'=>'Yes','-'=>'No'])?>

                  <?php // $form->field($model, 'piggy_back')->textInput(['maxlength' => true]) ?>
                  <?=$form->field($model,'piggy_back')->radioList(['Y'=>'Yes','-'=>'No'])?>
                    
                  <?php // $form->field($model, 'on_hose')->textInput(['maxlength' => true]) ?>
                  <?=$form->field($model,'on_hose')->radioList(['Y'=>'Yes','-'=>'No'])?>
                    
                  <?php // $form->field($model, 'free_piston')->textInput(['maxlength' => true]) ?>
                  <?=$form->field($model,'free_piston')->radioList(['Y'=>'Yes','-'=>'No'])?>

                  <?php // $form->field($model, 'dtg')->textInput(['maxlength' => true]) ?>
                  <?=$form->field($model,'dtg')->radioList(['Y'=>'Yes','-'=>'No'])?>
                    
                  <?php // $form->field($model, 'abeflag')->textInput() ?>
                  <?= $form->field($model, 'abeflag')->radioList(array(1=>'Yes',0=>'No')); ?>

                  <?php //  $form->field($model, 'create_by')->textInput(['maxlength' => true]) ?>

                  <?php //  $form->field($model, 'update_by')->textInput(['maxlength' => true]) ?>

                  <?php // $form->field($model, 'date_create')->textInput() ?>

                  <?php // $form->field($model, 'date_update')->textInput() ?>

            </div>
        </div>
    </div>
    
    
    <div class="col-lg-4">
        <div class="panel panel-primary">
            <div class="panel-heading">DETAIL</div>
            <div class="panel-body">
                <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'discount')->textInput(['maxlength' => true]) ?>
                
                <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
                
                <?= $form->field($model, 'detail')->textarea(['maxlength' => true]) ?>
                    
                 <?php // $form->field($model, 'image')->textInput() ?>
                 <?=$form->field($model, 'file')->fileInput() ?>
    
                <!-- ตรวจสอบว่ามีรูปภาพหรือไม่ถ้ามีให้ดึงออกมาโชว์และมีปุ่ม delete -->
                <?php if($model->image): ?>
                <div class="well">
                <?= Html::img(Url::to($model->productDir.$model->image),['class'=>'thumbnail','width'=>'300']) //แสดงรูปภาพ ?>
                <?= Html::a(
                        '<i class="glyphicon glyphicon-trash"></i>',
                        ['deleteimage','id'=>$model->product_id,'dir'=>$model->productDir,'field'=>'image'],
                        ['class'=>'btn btn-danger']
                    )//แสดงปุ่ม delete
                ?>
                </div>
                <?php endif; ?>
                
                <div class="form-group">
                      <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                  </div>
            </div>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>
</div>
</div>