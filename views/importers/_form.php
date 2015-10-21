<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Importers */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="col-lg-8">
<div class="panel panel-primary">
 <div class="panel-heading"><h3><?= Html::encode($this->title) ?></h3></div>
  <div class="panel-body">
        <div class="importers-form">

            <?php $form = ActiveForm::begin(); ?>

            <?php // $form->field($model, 'lang')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model,'lang')->dropDownList($model->getLangList())?>
            
            <?php // $form->field($model, 'import_cat_id')->textInput() ?>
            <?= $form->field($model,'import_cat_id')->dropDownList($model->getImportCatList())?>

            <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'pic')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'detil')->textarea(['rows' => 6]) ?>

            <?php // $form->field($model, 'status')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'sort_order')->textInput(['type'=>'number']) ?>

            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
  </div></div></div>
