<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\EdifySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="edify-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'flag') ?>

    <?= $form->field($model, 'picurl') ?>

    <?= $form->field($model, 'orderid') ?>

    <?php // echo $form->field($model, 'posttime') ?>

    <?php // echo $form->field($model, 'checkinfo') ?>

    <?php // echo $form->field($model, 'source') ?>

    <?php // echo $form->field($model, 'author') ?>

    <?php // echo $form->field($model, 'camera') ?>

    <?php // echo $form->field($model, 'address') ?>

    <?php // echo $form->field($model, 'digest') ?>

    <?php // echo $form->field($model, 'other') ?>

    <?php // echo $form->field($model, 'hits') ?>

    <?php // echo $form->field($model, 'digestPage') ?>

    <?php // echo $form->field($model, 'px260Pic') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
