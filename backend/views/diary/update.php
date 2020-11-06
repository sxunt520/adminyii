<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Diary */

$this->title = 'Update Diary: ' . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => '日记', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '更新';
?>
<div class="diary-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
