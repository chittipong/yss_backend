<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ApplicationList */

$this->title = Yii::t('app', 'Create Application List');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Application Lists'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="application-list-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
