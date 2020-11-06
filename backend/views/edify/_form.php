<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;
/* @var $this yii\web\View */
/* @var $model common\models\Edify */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="nav-tabs-custom">
    <ul class="nav nav-tabs">
        <li class="<?php echo $flag==0?'active':'';?>"><a href="#tab_1" data-toggle="tab" aria-expanded="<?php echo $flag==0?'true':'false';?>">主要内容</a></li>
        <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">其它</a></li>
        <?php if($id0!=''&&$model2!=''){?><li class="<?php echo $flag==1?'active':'';?>"><a href="#tab_3" data-toggle="tab" aria-expanded="<?php echo $flag==1?'true':'false';?>">画册</a></li><?php }?>
    </ul>
    <?php $form = ActiveForm::begin([
            'options' => ['class' => 'tab-content','enctype'=>'multipart/form-data']
        ]); ?>
    <div class="tab-pane <?php echo $flag==0?'active':'';?>" id="tab_1">
        <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'source')->dropDownList(['1'=>'人物写真','2'=>'风光拍摄','3'=>'纪实抓拍','4'=>'生态微距','5'=>'生活记录','6'=>'商业摄影','7'=>'其它拍摄'], ['prompt'=>'未选择','style'=>'width:120px']) ?>
    
    <?= $form->field($model, 'author')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'camera')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'px260Pic')->widget('yidashi\webuploader\Cropper',['options'=>['boxId' => 'picker', 'previewWidth'=>260, 'previewHeight'=>'auto']]) ?>
    
    <?= $form->field($model, 'digest')->textarea(['rows' => 1]) ?>
    
    <?= $form->field($model, 'digestPage')->textarea(['rows' => 3]) ?>

    <?= $form->field($model, 'flag')->dropDownList(['h'=>'头条','t'=>'推荐'], ['prompt'=>'未选择','style'=>'width:120px']) ?>
    
    <?= $form->field($model, 'picurl')->widget('yidashi\webuploader\Cropper2',['options'=>['boxId' => 'picker2', 'previewWidth'=>188, 'previewHeight'=>188]]) ?>
    
    <?= $form->field($model, 'hits')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'orderid')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'checkinfo')->dropDownList([ 'true' => '已审核', 'false' => '未审核', ], ['prompt' => '未设置']) ?>
    
    <?= $form->field($model, 'posttime')->widget(
                \trntv\yii\datetime\DateTimeWidget::className(),
                [
                    'phpDatetimeFormat' => 'yyyy-MM-dd HH:mm:ss',
                    'phpMomentMapping' => ['yyyy-MM-dd HH:mm:ss' => 'YYYY-MM-DD HH:mm:ss'],
                    'locale' => 'zh-cn'
                ]
            ) ?>
    </div>
    <div class="tab-pane" id="tab_2">
    <?= $form->field($model, 'other')->widget('kucha\ueditor\UEditor', ['options' => ['style' => 'height:200px']]) ?>
    </div>
    <?php if($id0!=''&&$model2!=''){?>
        <div class="tab-pane <?php echo $flag==1?'active':'';?>" id="tab_3">
        <?= $form->field($model2, 'edify_url')->label('渲染画册')->widget(FileInput::classname(), [
            'options' => ['multiple' => true],
              //'template' => '<img src="{image}" class="file-preview-image" style="width:auto;height:160px;">',
            'pluginOptions' => [
            // 需要预览的文件格式
            'previewFileType' => 'image',
            // 预览的文件
            //'initialPreview' => ['图片1', '图片2', '图片3'],
               'initialPreview' => $p1,
            // 需要展示的图片设置，比如图片的宽度等
            //'initialPreviewConfig' => ['width' => '120px'],
               'initialPreviewConfig' => $p2,
            // 是否展示预览图
            'initialPreviewAsData' => true,
            // 异步上传的接口地址设置
            'uploadUrl' => \yii\helpers\Url::toRoute(['async-image']),
            // 异步上传需要携带的其他参数，比如商品id等
            'uploadExtraData' => [
            'edify_id' => $id0,
            ],
            'uploadAsync' => true,
            // 最少上传的文件个数限制
            'minFileCount' => 1,
            // 最多上传的文件个数限制
            'maxFileCount' => 10,
            // 是否显示移除按钮，指input上面的移除按钮，非具体图片上的移除按钮
            'showRemove' => true,
            // 是否显示上传按钮，指input上面的上传按钮，非具体图片上的上传按钮
            'showUpload' => true,
            //是否显示[选择]按钮,指input上面的[选择]按钮,非具体图片上的上传按钮
            'showBrowse' => true,
            // 展示图片区域是否可点击选择多文件
            'browseOnZoneClick' => true,
            // 如果要设置具体图片上的移除、上传和展示按钮，需要设置该选项
            'fileActionSettings' => [
            // 设置具体图片的查看属性为false,默认为true
            'showZoom' => false,
            // 设置具体图片的上传属性为true,默认为true
            'showUpload' => true,
            // 设置具体图片的移除属性为true,默认为true
            'showRemove' => true,
            ],
            ],
            // 一些事件行为
            'pluginEvents' => [
            // 上传成功后的回调方法，需要的可查看data后再做具体操作，一般不需要设置
            "fileuploaded" => "function (event, data, id, index) {
            console.log(data);
            }",
            ],
            ]);
        ?>
        </div>
      <?php };?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
