<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\YssConfigSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Yss Configs');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="yss-config-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Yss Config'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

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

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
