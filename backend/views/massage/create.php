<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Massage */

$this->title = 'Create Massage';
$this->params['breadcrumbs'][] = ['label' => 'Massages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="massage-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
