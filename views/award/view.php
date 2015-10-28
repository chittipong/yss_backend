<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Award */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Awards'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="award-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?=
        Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ])
        ?>
    </p>

    <?=
    DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            //DISPLAY IMAGE--------------------
            [
                'attribute' => 'photo',
                'value' => $model->awardDir . $model->pic,
                'format' => ['image', ['width' => '200', 'title' => $model->pic]]                              //Set Image Width
            ],
            'title_th',
            'title_en',
            'detail_th:ntext',
            'detail_en:ntext',
            'title_l3',
            'title_l4',
            'title_l5',
            'title_l6',
            'title_l7',
            'title_l8',
            'detail_l3:ntext',
            'detail_l4:ntext',
            'detail_l5:ntext',
            'detail_l6:ntext',
            'detail_l7:ntext',
            'detail_l8:ntext',
            //'pic',
            'date_create',
            'date_update',
        ],
    ])
    ?>

</div>
