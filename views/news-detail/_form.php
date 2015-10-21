<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\NewsDetail */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="col-lg-8">
<div class="panel panel-primary">
<div class="panel-heading"><h3><?= Html::encode($this->title) ?></h3></div>
  <div class="panel-body">
        <div class="news-detail-form">

            <?php $form = ActiveForm::begin(); ?>
            
            <?= $form->field($model,'lang')->dropDownList($model->getLangList())?>

            <?= $form->field($model, 'news_id')->textInput() ?>

            <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'detail')->textarea(['rows' => 5]) ?>

            <?= $form->field($model, 'sort_order')->textInput(['type'=>'number']) ?>

            <?php // $form->field($model, 'lang')->textInput(['maxlength' => true]) ?>

            
            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
  </div></div></div>
