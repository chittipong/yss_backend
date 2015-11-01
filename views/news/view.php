<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;

//For modal----------------
use yii\helpers\Url;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $model app\models\News */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'News'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a('<i class="glyphicon glyphicon-edit"></i> Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?=
        Html::a('<i class="glyphicon glyphicon-trash"></i> Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'style' => 'float:right',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ])
        ?>

<?php // Html::a(Yii::t('app', '<i class="glyphicon glyphicon-plus"></i>เพิ่ม Detail(ภาษาอื่น)'), ['news-detail/create', 'id' => $model->id], ['class' => 'btn btn-success']) ?>
    <!-- Button Call modal-->
        <?= Html::button(Yii::t('app', 'Create News Detail'),
            ['value'=>Url::to('index.php?r=news-detail/create'),
            'class' => 'btn btn-success','id'=>'newsdetailCreate-btn']) 
        ?>
        
        <?php 
        // Modal-----------------
            Modal::begin([
                'header'=>'<h4>Create News Detail</h4>',
                    'id'=>'modal',
                    'size'=>'modal-lg',
            ]);
            
            echo "<div id='modalContent'></div>";
            Modal::end();
        ?>
    
    </p>

    <div class="panel panel-primary">
        <div class="panel-heading">News Detail</div>
        <div class="panel-body">
            <?=
            DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'id',
                    [
                        'attribute' => 'photo',
                        'value' => $model->newsDir . $model->pic,
                        'format' => ['image', ['width' => '400', 'title' => $model->pic]]                              //Set Image Width
                    ],
                    'type',
                    //'pic',
                    'author',
                    'sort_order',
                    'title',
                    'detail',
                    [
                        'attribute' => 'date_create',
                        'format' => ['date', 'php:d-M-Y h:i:s']
                    ],
                    [
                        'attribute' => 'date_update',
                        'format' => ['date', 'php:d-M-Y h:i:s']
                    ],
                ],
            ])
            ?>
        </div>
    </div>
</div>

<div class="panel panel-primary">
    <div class="panel-heading">News Detail</div>
    <div class="panel-body">
        <?=
        GridView::widget([
            'dataProvider' => $newsDetail,
            'columns' => [
                'id',
                'news_id',
                'title',
                'detail',
                'sort_order',
                'lang',
                //['class' => 'yii\grid\ActionColumn'],
                [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{view} {update} {delete} {link}',
                    'buttons' => [
                        'view' => function ($url, $newsDetail) {
                            $url = ['news-detail/view', 'id' => $newsDetail->id];
                            return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url);
                        },
                                'update' => function ($url, $newsDetail) {
                            $url = ['news-detail/update', 'id' => $newsDetail->id];
                            return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url);
                        },
                                'delete' => function ($url, $newsDetail) {
                            $url = ['news-detail/delete', 'id' => $newsDetail->id,'news_id'=>$newsDetail->news_id];
                            return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url);
                        }
                            ],
                        ],
                    ],
                ]);
                ?>
    </div>
</div>
