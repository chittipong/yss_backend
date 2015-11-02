<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Content */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Contents'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="content-view">

<!--    <h1><?= Html::encode($this->title) ?></h1>-->

    <p>
        <?= Html::a(Yii::t('app', '<i class="glyphicon glyphicon-edit"></i> Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?=
        Html::a(Yii::t('app', '<i class="glyphicon glyphicon-trash"></i> Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'style'=>'float:right',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ])
        ?>
        
    </p>
    
    <h4><i class="glyphicon glyphicon-eye-open"></i> Frontend View  Layout: <?php echo $model->layout ?></h4>
    <hr/>
    
    <?php 
        if($model->layout=="LEFT_PIC"){ 
    ?>
        <div class="panel-body">
            <h2><?php echo $model->title ?></h2>
            <div class="wp-caption alignleft" style="width:350px;">
                 <img src="../../images/contents/<?php echo $model->pic ?>" width="350" height="215" alt="">
             <p class="wp-caption-text"><?php echo $model->pic_title ?></p>
            </div>
           <?php echo $model->detail ?>
        </div>
    <?php
        }else if($model->layout=="RIGHT_PIC"){ 
    ?>
        <div class="panel-body">
            <h2><?php echo $model->title ?></h2>
            <div class="wp-caption alignright" style="width:350px;">
                 <img src="../../images/contents/<?php echo $model->pic ?>" width="350" height="215" alt="">
             <p class="wp-caption-text"><?php echo $model->pic_title ?></p>
            </div>
            <p><?php echo $model->detail ?></p>
        </div>
    <?php
        }if($model->layout=="TOP_PIC"){ 
    ?>
        <div class="panel-body">
            <h2><?php echo $model->title ?></h2>
            <div class="wp-caption">
                 <img src="../../images/contents/<?php echo $model->pic ?>" width="100%" height="300" alt="">
             <p class="wp-caption-text"><?php echo $model->pic_title ?></p>
            </div>
            <p><?php echo $model->detail ?></p>
        </div>
    <?php
        }if($model->layout=="ONLY_TEXT"){ 
    ?>
        <div class="panel-body">
            <h2><?php echo $model->title ?></h2>
            <p><?php echo $model->detail ?></p>
        </div>
    <?php
        }
    ?>
 
    <hr/>
    <div class="well">
            <h4><i class="glyphicon glyphicon-list"></i> Content Info</h4>
            <?=
            DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'id',
                    'sort_order',
                    'lang',
                    'layout',
                    [
                        'attribute' => 'photo',
                        'value' => $model->contentDir . $model->pic,
                        'format' => ['image', ['width' => '400', 'title' => $model->pic]]                              //Set Image Width
                    ],
                    'pic_title',
                    'refpage.title',
                    'position',
                    'title',
                    'detail',
                    //'pic',
                    'date_create',
                    'date_update',
                ],
            ])
            ?>
    </div>
</div>
