<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PreloadOption */

$this->title = Yii::t('app', 'Create Preload Option');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Preload Options'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="preload-option-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
