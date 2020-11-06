<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\AdvType */

$this->title = 'Update Adv Type: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Adv Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="adv-type-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
