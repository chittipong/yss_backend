<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\LangSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="lang-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'abb') ?>

    <?= $form->field($model, 'lang_name') ?>

    <?= $form->field($model, 'remark') ?>

    <?= $form->field($model, 'default') ?>

    <?php // echo $form->field($model, 'sort_order') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
