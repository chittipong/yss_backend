<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ApplicationListSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Application Lists');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="application-list-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Application List'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'brand',
            'cc',
            'model',
            'ref_no',
             'abe1',
             'year',
             'type',
             'product_code',
             'abe_shock',
             'length',
             'top',
             'bottom',
             'spring',
             'piston',
             'shaft',
             'preload',
             'rebound',
             'compression',
             'length_adjst',
             'hydraulic',
             'emulsion',
             'piggy_back',
             'on_host',
             'free_piston',
             'dtg',
             'vehicle_type',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
