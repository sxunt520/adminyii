<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Skill */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="skill-form">

    <?php $form = ActiveForm::begin(); ?>

    
    <?= $form->field($model, 'datetime')->widget(
                \trntv\yii\datetime\DateTimeWidget::className(),
                [
                    'phpDatetimeFormat' => 'yyyy-MM-dd HH:mm:ss',
                    'phpMomentMapping' => ['yyyy-MM-dd HH:mm:ss' => 'YYYY-MM-DD HH:mm:ss'],
                    'locale' => 'zh-cn'
                ]
            ) ?>

    <?php /*  <? = $form->field($model, 'pic')->widget('yidashi\webuploader\Webuploader') ?>  */?>
    <?= $form->field($model, 'pic')->widget('yidashi\webuploader\Cropper',['options'=>['boxId' => 'picker', 'previewWidth'=>220, 'previewHeight'=>160]]) ?>
    
    <?= $form->field($model, 'tuijian')->radioList(['false'=>'否','true'=>'是']) ?>
    
    <?= $form->field($model, 'tjType')->dropDownList(['1'=>'名词解释','2'=>'器材基础','3'=>'拍摄技巧','4'=>'后期处理'], ['prompt'=>'未设置','style'=>'width:120px']) ?>

    <?= $form->field($model, 'from')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'author')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content')->widget('\kucha\ueditor\UEditor') ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '添加' : '更新', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
