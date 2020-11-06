<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\AdvType */

$this->title = 'Create Adv Type';
$this->params['breadcrumbs'][] = ['label' => 'Adv Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="adv-type-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
