<?php

use yii\helpers\Html;
use yii\grid\GridView;

use yii\helpers\Url;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $searchModel app\models\JobsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Jobs');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jobs-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php // Html::a(Yii::t('app', 'Create Jobs'), ['create'], ['class' => 'btn btn-success']) ?>
         <!-- Button Call modal-->
        <?= Html::button(Yii::t('app', 'Create Job'),
            ['value'=>Url::to('index.php?r=jobs/create'),
            'class' => 'btn btn-success','id'=>'jobsCreate-btn']) 
        ?>
        
        <?php 
        // Modal-----------------
            Modal::begin([
                'header'=>'<h4>Create Job</h4>',
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
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'job_position',
            'qty',
           // 'job_description:ntext',
            'sex',
            'age',
             'education',
             'salary',
             'contact_name',
             'contact_email:email',
             'contact_tel',
            'sort_order',
            'enable',
            // 'date_create',
            // 'update_date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
