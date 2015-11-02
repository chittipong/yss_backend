<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Content */
/* @var $form yii\widgets\ActiveForm */
?>

<!-- Modal -->
<div id="layoutGuide" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Layout Guide</h4>
      </div>
      <div class="modal-body">
          <p style="text-align: center;">
            <img src="../../images/layout-left-pic.jpg"/><br/><br/>
            <img src="../../images/layout-right-pic.jpg"/><br/><br/>
            <img src="../../images/layout-top-pic.jpg"/><br/><br/>
            <img src="../../images/layout-only-text.jpg"/>
          </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="content-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?php // $form->field($model, 'page')->textInput() ?>
    
    <?= $form->field($model, 'lang')->dropDownList($model->getLangList()) ?>
    
    <?= $form->field($model, 'specific_name')->textInput() ?>
    
    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#layoutGuide">Layout Guide / รูปแบบการจัดวาง</button>
    
    <?= $form->field($model, 'layout')->dropDownList($model->getLayoutList()) ?>

    <?= $form->field($model, 'page')->dropDownList($model->getPageList()) ?>

    <?php // $form->field($model, 'position')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'position')->dropDownList($model->getSectionList()) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'detail')->textarea(['rows' => 10]) ?>

    <?php //$form->field($model, 'pic')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sort_order')->textInput(['type' => 'number']) ?>

    <?= $form->field($model, 'file')->fileInput() ?>

    <?php // $form->field($model, 'lang')->textInput(['maxlength' => true]) ?>

    <?php // $form->field($model, 'date_create')->textInput(['maxlength' => true]) ?>

    <?php // $form->field($model, 'date_update')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'pic_title')->textInput() ?>

    <!-- ตรวจสอบว่ามีรูปภาพหรือไม่ถ้ามีให้ดึงออกมาโชว์และมีปุ่ม delete -->
    <?php if ($model->pic): ?>
        <div class="well">
            <?= Html::img(Url::to($model->contentDir . $model->pic), ['class' => 'thumbnail', 'width' => '300']) //แสดงรูปภาพ ?>
            <?=
            Html::a(
                    '<i class="glyphicon glyphicon-trash"></i>', ['deleteimage', 'id' => $model->id, 'dir' => $model->contentDir, 'field' => 'pic'], ['class' => 'btn btn-danger']
            )//แสดงปุ่ม delete
            ?>
        </div>
    <?php endif; ?>

    
    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
