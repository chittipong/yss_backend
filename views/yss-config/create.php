<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\YssConfig */

$this->title = Yii::t('app', 'Create Yss Config');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Yss Configs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="yss-config-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
