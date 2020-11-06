<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Diary */

$this->title = '新建日记';
$this->params['breadcrumbs'][] = ['label' => '日记', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="diary-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
