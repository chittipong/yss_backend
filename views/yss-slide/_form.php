<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\YssSlide */
/* @var $form yii\widgets\ActiveForm */
?>

<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

<?= $form->field($model, 'slide_name')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'page')->textInput(['maxlength' => true]) ?>

<?php // $form->field($model, 'pic')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'header')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'link')->textInput(['maxlength' => true]) ?>

<?php // $form->field($model, 'lang')->textInput(['maxlength' => true]) ?>
<?= $form->field($model, 'lang')->dropDownList($model->getLangList())?>

<?= $form->field($model, 'sort_order')->textInput(['type'=>'number']) ?>

<?= $form->field($model, 'file')->fileInput() ?>

<!-- ตรวจสอบว่ามีรูปภาพหรือไม่ถ้ามีให้ดึงออกมาโชว์และมีปุ่ม delete -->
<?php if ($model->pic): ?>
    <div class="well">
        <?= Html::img(Url::to($model->slideDir . $model->pic), ['class' => 'thumbnail', 'width' => '300']) //แสดงรูปภาพ ?>
        <?=
        Html::a(
                '<i class="glyphicon glyphicon-trash"></i>', ['deleteimage', 'id' => $model->id, 'dir' => $model->slideDir, 'field' => 'pic'], ['class' => 'btn btn-danger']
        )//แสดงปุ่ม delete
        ?>
    </div>
<?php endif; ?>

<div class="form-group">
    <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>

</div>
