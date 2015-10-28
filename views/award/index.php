<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AwardSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Awards');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="award-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Award'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'รูปภาพ', //title
                'format' => ['image', ['width' => '60', 'height' => '60']], //Set width,height
                'value' => function($model) {
                    return $model->getImageUrl();                               //Get function in product model
                }
            ],
            'title_th',
            'title_en',
            //'title_l3',
            //'title_l4',
            // 'title_l5',
            // 'title_l6',
            // 'title_l7',
            // 'title_l8',
             'detail_th:ntext',
             'detail_en:ntext',
            // 'detail_l3:ntext',
            // 'detail_l4:ntext',
            // 'detail_l5:ntext',
            // 'detail_l6:ntext',
            // 'detail_l7:ntext',
            // 'detail_l8:ntext',
            // 'pic',
            'sort_order',
            // 'date_create',
            // 'date_update',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
