<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Test */
/* @var $form yii\widgets\ActiveForm */
?>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Insert</h4>
      </div>
      <div class="modal-body">
            <div class="test-form">

                <?php $form = ActiveForm::begin(['id'=>$model->formName()]); ?>

                <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'uname')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'tel')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'pic')->textInput(['maxlength' => true]) ?>

                <div class="form-group">
                    <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
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

<?php
    $script = <<< JS
            $('form#{$model->formName()}').on('beforeSubmit',function(e){
            var \$form=$(this);
            $.post(
            \$form.attr("action"),
            \$form.serialize()
            )
            .done(function(result){
            if(result.message=='Success'){
                $(document).find('#secondmodal').modal('hide');
                $.pjax.reload({container:'#commodity-grid'});
            }else{
                $(\$form).trigger("reset");
                $("#message").html(result.message);
            }
            }).fail(function(){
                console.log("Server error");
            });
            return false;
        });
        
    JS;
    $this->registerJs($script);
?>