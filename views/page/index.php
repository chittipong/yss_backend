<?php

use yii\helpers\Html;
use yii\grid\GridView;

//For modal----------------
use yii\helpers\Url;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Pages');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php // Html::a(Yii::t('app', 'Create Page'), ['create'], ['class' => 'btn btn-success'])// Old button ?>
        
        <!-- Button Call modal-->
        <?= Html::button(Yii::t('app', 'Create'),
            ['value'=>Url::to('index.php?r=page/create'),
            'class' => 'btn btn-success','id'=>'pageCreate-btn']) 
        ?>
        
        <?php 
        // Modal-----------------
            Modal::begin([
                'header'=>'<h4>Create</h4>',
                    'id'=>'modal',
                    'size'=>'modal-lg',
            ]);
            
            echo "<div id='modalContent'></div>";
            Modal::end();
        ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'title',
            'sort_order',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
