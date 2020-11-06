<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Massage */

$this->title = 'Update Massage: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Massages', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="massage-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
