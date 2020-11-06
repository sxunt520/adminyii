<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Edify */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => '渲染列表', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="edify-view">

    <p>
        <?= Html::a('更新', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('删除', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('添加画册', ['update', 'id' => $model->id,'flag'=>1], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'flag',
            'picurl:url',
            'orderid',
            'posttime',
            'checkinfo',
            'source',
            'author',
            'camera',
            'address',
            'digest:ntext',
            'other:ntext',
            'hits',
            'digestPage:ntext',
            'px260Pic',
        ],
    ]) ?>

</div>
