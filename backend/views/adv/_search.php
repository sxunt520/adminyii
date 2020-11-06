<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\AdvSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="adv-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => ['class' => 'form-inline'],
    ]); ?>

    <?= $form->field($model, 'id')->textInput(['style'=>'width:50px']) ?>

    <?php // $form->field($model, 'type_id') ?>
    <?= $form->field($model, 'type_id')->dropDownList(\common\models\AdvType::getadvtype(), ['prompt'=>'全部类型','style'=>'width:260px']) ?>

    <?= $form->field($model, 'title')->textInput(['style'=>'width:260px']) ?>

    <?php //$form->field($model, 'info') ?>

    <?php // $form->field($model, 'advimg') ?>

    <?php // echo $form->field($model, 'jumpurl') ?>

    <?php // echo $form->field($model, 'advorder') ?>

    <?php  echo $form->field($model, 'is_show')->dropDownList([ '1' => '显示', '0' => '不显示', ], ['prompt'=>'全部类型']) ?>

    <div class="form-group" style="float:right;">
        <?= Html::submitButton('搜索', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('重置', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
