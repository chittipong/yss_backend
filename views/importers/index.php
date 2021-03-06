<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ImportersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Importers');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="importers-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Importers'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute'=>'รูปภาพ',                                           //title
                'format' => ['image',['width'=>'60','height'=>'60']],         //Set width,height
                'value' => function($model){
                    return $model->getImageUrl();                               //Get function in product model
                }
            ],
            //'import_cat_id',
            [
                'label'=>'Importer Zone',
                'value'=>'importersCat.title'
            ],
            'title',
            //'pic',
            'detail:html',
            // 'status',
            // 'sort_order',
            // 'lang',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
