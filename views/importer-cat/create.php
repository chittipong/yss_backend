<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ImporterCat */

$this->title = Yii::t('app', 'Create Importer Cat');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Importer Cats'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="importer-cat-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
