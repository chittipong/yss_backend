<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\AppList */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="row">
        <div class="app-list-form">
            <div class="col-lg-4">

            <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>
                
            <?= $form->field($model, 'product_code')->textInput(['maxlength' => true]) ?>

            <?php // $form->field($model, 'brand')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model,'brand')->dropDownList($model->getBrandList()) ?>

            <?= $form->field($model, 'cc')->textInput() ?>

            <?php // $form->field($model, 'model')->textInput(['maxlength' => true]) ?>
            <?=$form->field($model, 'model')->dropDownList($model->getModelList()) ?>

            <?php // $form->field($model, 'vehicle_type')->textInput(['maxlength' => true]) ?>
            <?=$form->field($model, 'vehicle_type')->dropDownList($model->getVehicleList()) ?>

            <?= $form->field($model, 'ref_no')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'year')->textInput(['maxlength' => true]) ?>

            <?php // $form->field($model, 'type')->textInput(['maxlength' => true]) ?>
            <?=$form->field($model, 'type')->dropDownList($model->getTypeList()) ?>

            <?= $form->field($model, 'length')->textInput() ?>

            <?= $form->field($model, 'top')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'bottom')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'spring')->textInput(['maxlength' => true]) ?>
                
            <?php // $form->field($model, 'abe1')->textInput(['maxlength' => true]) ?>
            <?=$form->field($model,'abe1')->radioList(['ABE'=>'Yes','-'=>'No'])?>
                
            <?php // $form->field($model, 'abe_shock')->textInput(['maxlength' => true]) ?>
            <?=$form->field($model,'abe_shock')->radioList(['ABE'=>'Yes','-'=>'No'])?>

        </div>

        <div class="col-lg-4">
            <?=$form->field($model, 'piston')->dropDownList($model->getPistonList()) ?>

            <?=$form->field($model, 'shaft')->dropDownList($model->getShaftList()) ?>

            <?php // $form->field($model, 'piston')->textInput() ?>

            <?php // $form->field($model, 'shaft')->textInput() ?>

            <?=$form->field($model, 'preload')->dropDownList($model->getOptionList(),['prompt'=>'Select Option']) ?>

            <?php // $form->field($model, 'compression')->textInput(['maxlength' => true]) ?>
            <?=$form->field($model, 'compression')->dropDownList($model->getCompresList(),['prompt'=>'Select Option']) ?>

            <?php // $form->field($model, 'preload')->textInput(['maxlength' => true]) ?>

            <?php // $form->field($model, 'rebound')->textInput(['maxlength' => true]) ?>

            <?php // $form->field($model, 'rebound')->textInput(['maxlength' => true]) ?>
            <?=$form->field($model,'rebound')->radioList(['Y'=>'Yes','-'=>'No'])?>

            <?php // $form->field($model, 'length_adjust')->textInput(['maxlength' => true]) ?>
            <?=$form->field($model,'length_adjust')->radioList(['Y'=>'Yes','-'=>'No'])?>

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

            <?php //$form->field($model, 'pic')->textInput(['maxlength' => true]) ?>

            <?php //$form->field($model, 'date_create')->textInput() ?>

            <?php //$form->field($model, 'date_update')->textInput() ?>

            <?php // $form->field($model, 'image')->textInput() ?>

            <?= $form->field($model,'file')->fileInput()?>

            <!-- ตรวจสอบว่ามีรูปภาพหรือไม่ถ้ามีให้ดึงออกมาโชว์และมีปุ่ม delete -->
                        <?php if($model->pic): ?>
                        <div class="well">
                        <?= Html::img(Url::to($model->productDir.$model->pic),['class'=>'thumbnail','width'=>'300']) //แสดงรูปภาพ ?>
                        <?= Html::a(
                                '<i class="glyphicon glyphicon-trash"></i>',
                                ['deleteimage','id'=>$model->id,'dir'=>$model->productDir,'field'=>'pic'],
                                ['class'=>'btn btn-danger']
                            )//แสดงปุ่ม delete
                        ?>
                        </div>
                        <?php endif; ?>

                    <div class="form-group">
                        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                    </div>
           </div>
        </div>
            
            <?php ActiveForm::end(); ?>

        </div>
</div>