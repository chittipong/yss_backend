<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\YssFeature */

$this->title = Yii::t('app', 'Create Yss Feature');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Yss Features'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="yss-feature-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
