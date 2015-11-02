<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\YssConfigSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="yss-config-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'company_th') ?>

    <?= $form->field($model, 'company_en') ?>

    <?= $form->field($model, 'tel1') ?>

    <?= $form->field($model, 'tel2') ?>

    <?php // echo $form->field($model, 'tel3') ?>

    <?php // echo $form->field($model, 'fax1') ?>

    <?php // echo $form->field($model, 'fax2') ?>

    <?php // echo $form->field($model, 'default_mail') ?>

    <?php // echo $form->field($model, 'admin_mail') ?>

    <?php // echo $form->field($model, 'support_mail') ?>

    <?php // echo $form->field($model, 'sale_mail') ?>

    <?php // echo $form->field($model, 'contact_mail') ?>

    <?php // echo $form->field($model, 'info_mail') ?>

    <?php // echo $form->field($model, 'address_th') ?>

    <?php // echo $form->field($model, 'address_en') ?>

    <?php // echo $form->field($model, 'district_th') ?>

    <?php // echo $form->field($model, 'district_en') ?>

    <?php // echo $form->field($model, 'province_th') ?>

    <?php // echo $form->field($model, 'province_en') ?>

    <?php // echo $form->field($model, 'zipcode') ?>

    <?php // echo $form->field($model, 'date_create') ?>

    <?php // echo $form->field($model, 'date_update') ?>

    <?php // echo $form->field($model, 'update_by') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
