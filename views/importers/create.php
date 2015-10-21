<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Importers */

$this->title = Yii::t('app', 'Create Importers');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Importers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="importers-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
