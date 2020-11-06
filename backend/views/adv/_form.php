<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Adv */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="nav-tabs-custom">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">主要内容</a></li>
        <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">附加内容</a></li>
    </ul>

    <?php $form = ActiveForm::begin([
            'options' => ['class' => 'tab-content'],
        ]); ?>

    <div class="tab-pane active" id="tab_1">
    <?= $form->field($model, 'type_id')->dropDownList(\common\models\AdvType::getadvtype(), ['prompt'=>'请选择广告类型','style'=>'width:300px']) ?>
         <?php if($type_id>0){?>
                <?= $form->field($model, 'advimg')->label("封面图:<span style='color:#FE1E1E;'>{$adv_width}*{$adv_height}px</span>")->widget('yidashi\webuploader\Cropper',['options'=>['boxId' => 'picker', 'previewWidth'=>$adv_width, 'previewHeight'=>$adv_height]]) ?>
            
                <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
            
                <?= $form->field($model, 'jumpurl')->textInput(['maxlength' => true]) ?>
            
                <?= $form->field($model, 'advorder')->textInput(['value' => $model->advorder ? $model->advorder : 100]) ?>
            
                <?= $form->field($model, 'is_show')->dropDownList([ '1' => '显示', '0' => '不显示', ]) ?>
            </div>
            <div class="tab-pane" id="tab_2">
                <?= $form->field($model, 'info')->widget('kucha\ueditor\UEditor', ['options' => ['style' => 'height:200px']]) ?>
            </div>
                <div class="form-group">
                    <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                </div>
          <?php }?>
    <?php ActiveForm::end(); ?>

</div>

<script type="text/javascript">
// 	function searchAttr(type_id) {
// 	  window.location.href = "/Admin/Adv/add/type_id/"+ type_id;
// 	}
    //alert('dddddd');
	$("#adv-type_id").on("change", function(){
		  //alert("/admin/adv/create?type_id="+ $(this).val());
		  window.location.href = "/admin/adv/<?php echo Yii::$app->controller->action->id;?>?type_id="+ $(this).val();
		});
</script>