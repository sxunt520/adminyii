<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Adv */

$this->title = 'Update Adv: ' . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Advs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="adv-update">

    <?= $this->render('_form', [
        'model' => $model,
        'type_id' => $type_id,
        'adv_width' => $adv_width,
        'adv_height' => $adv_height,
    ]) ?>

</div>
