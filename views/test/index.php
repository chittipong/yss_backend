<?php

use yii\helpers\Html;
use yii\grid\GridView;
//use kartik\grid\GridView;
use yii\bootstrap\ActiveForm;

use yii\widgets\Pjax;
use yii\bootstrap\Modal;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel app\models\TestSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Tests');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="test-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create default'), ['create'], ['class' => 'btn btn-success']) ?>
        
         <!-- Button trigger modal 1 -->
        <?= Html::button(Yii::t('app', 'Create by Modal'),
            ['value'=>Url::to('index.php?r=test/createbymodal'),
            'class' => 'btn btn-success','id'=>'modalButton-test']) ?>
        
        <!-- Button trigger modal 2 -->
        <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
          Create By Ajax
        </button>
        
        <?php 
        //Create Modal 1-----------------
            Modal::begin([
                'header'=>'<h4>Test</h4>',
                    'id'=>'modal',
                    'size'=>'modal-lg',
            ]);
            
            echo "<div id='modalContent'></div>";
            Modal::end();
        ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'uname',
            'tel',
            'email:email',
            // 'pic',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Insert</h4>
      </div>
      <div class="modal-body">
            <div class="test-form">

                <?php $form = ActiveForm::begin(['id'=>'testForm','action'=>Yii::$app->urlManager->createUrl('test/create2')]); ?>

                <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'uname')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'tel')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'pic')->textInput(['maxlength' => true]) ?>

                <div class="form-group">
                    <button type="button" class="btn btn-primary" id="submit-TestForm">Save</button>
                </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>