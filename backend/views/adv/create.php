<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Adv */

$this->title = 'Create Adv';
$this->params['breadcrumbs'][] = ['label' => 'Advs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="adv-create">

    <?= $this->render('_form', [
        'model' => $model,
        'type_id' => $type_id,
        'adv_width' => $adv_width,
        'adv_height' => $adv_height,
    ]) ?>

</div>
