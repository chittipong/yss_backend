<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Piston */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="col-lg-8">
<div class="panel panel-primary">
 <div class="panel-heading"><h3><?= Html::encode($this->title) ?></h3></div>
  <div class="panel-body">
        <div class="piston-form">

            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'size')->textInput() ?>

            <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'remark')->textInput(['maxlength' => true]) ?>

            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
  </div>
</div>
</div>