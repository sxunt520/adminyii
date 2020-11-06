<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Edify */

$this->title = '添加渲染';
$this->params['breadcrumbs'][] = ['label' => '渲染列表', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="edify-create">

    <?= $this->render('_form', [
        'model' => $model,
        'model2' => '',
        'p1' => '',
        'p2' => '',
        'id0' => '',
        'flag'=>0
    ]) ?>

</div>
