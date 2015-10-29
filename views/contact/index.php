<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ContactSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Contacts');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contact-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Contact'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'specific_name',
            'title',
            'address',
            'district',
            // 'province',
            // 'zipcode',
            // 'phone1',
            // 'phone2',
            // 'phone3',
            // 'fax1',
            // 'fax2',
            // 'fax3',
            // 'default_mail',
            // 'support_mail',
            // 'sale_mail',
            // 'description',
            'lang',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
