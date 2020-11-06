<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Edify */

$this->title = '修改渲染: ' . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => '渲染列表', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '更新';
?>
<div class="edify-update">

    <?= $this->render('_form', [
        'model' => $model,
        'model2' => $model2,
        'p1' => $p1,
        'p2' => $p2,
        'id0' => $id0,
        'flag'=>$flag
    ]) ?>

</div>
