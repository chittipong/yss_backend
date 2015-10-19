<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\YssModelSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Yss Models');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="yss-model-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Yss Model'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'model_id',
            'brand_id',
            'model',
            'abeflag',
            'year',
            // 'start',
            // 'end',
            // 'len',
            // 'cc',
            // 'Manafacturer_Code',
            // 'abe',
            // 'closeflag',
            // 'imgpath',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
