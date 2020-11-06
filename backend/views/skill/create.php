<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Skill */

$this->title = 'Create Skill';
$this->params['breadcrumbs'][] = ['label' => 'Skills', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="skill-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
