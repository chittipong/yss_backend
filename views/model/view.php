<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Model */

$this->title = $model->model_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Models'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="model-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->model_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->model_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'model_id',
            'brand_id',
            'model',
            'abeflag',
            'year',
            'start',
            'end',
            'len',
            'cc',
            'Manafacturer_Code',
            'abe',
            'closeflag',
            'imgpath',
        ],
    ]) ?>

</div>
