<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Piston */

$this->title = Yii::t('app', 'Create Piston');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Pistons'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="piston-create">

<!--    <h1><?= Html::encode($this->title) ?></h1>-->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
