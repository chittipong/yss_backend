<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\YssConfig */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Yss Configs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="yss-config-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'company_th',
            'company_en',
            'tel1',
            'tel2',
            'tel3',
            'fax1',
            'fax2',
            'default_mail',
            'admin_mail',
            'support_mail',
            'sale_mail',
            'contact_mail',
            'info_mail',
            'address_th',
            'address_en',
            'district_th',
            'district_en',
            'province_th',
            'province_en',
            'zipcode',
            'country_th',
            'country_en',
            'work_hour_th',
            'work_hour_en',
            'date_create',
            'date_update',
            'update_by',
        ],
    ]) ?>

</div>
