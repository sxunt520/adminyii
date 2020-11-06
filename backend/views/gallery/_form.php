<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Gallery */
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

    <?= $form->field($model, 'cid')->dropDownList(['6'=>'夜景','7'=>'山水','8'=>'夕阳','9'=>'日落','10'=>'美女','11'=>'小孩','12'=>'老人','14'=>'美食','15'=>'街拍','16'=>'旅游','17'=>'身边','18'=>'周围','19'=>'远方','20'=>'帅哥','21'=>'大人','22'=>'生态微距','24'=>'其它拍摄'], ['prompt'=>'未选择','style'=>'width:120px']) ?>

    <?= $form->field($model, 'picsrc')->widget('yidashi\webuploader\Cropper',['options'=>['boxId' => 'picker', 'previewWidth'=>320, 'previewHeight'=>'auto']]) ?>

    <?= $form->field($model, 'piclink')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'show')->dropDownList([ '1' => '显示', '0' => '不显示', ]) ?>
    
    <?= $form->field($model, 'date_time')->widget(
                \trntv\yii\datetime\DateTimeWidget::className(),
                [
                    'phpDatetimeFormat' => 'yyyy-MM-dd HH:mm:ss',
                    'phpMomentMapping' => ['yyyy-MM-dd HH:mm:ss' => 'YYYY-MM-DD HH:mm:ss'],
                    'locale' => 'zh-cn'
                ]
            ) ?>
    </div>
    <div class="tab-pane" id="tab_2">
    <?= $form->field($model, 'describe')->widget('kucha\ueditor\UEditor', ['options' => ['style' => 'height:200px']]) ?>
    </div>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
