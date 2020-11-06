<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\AdvSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Advs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="adv-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Adv', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <div class="box box-primary">
        <div class="box-header"><h2 class="box-title">广告筛选</h2></div>
        <div class="box-body"><?php echo $this->render('_search', ['model' => $searchModel]); ?></div>
    </div>
    <div class="box box-primary">
        <div class="box-body">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                //'filterModel' => $searchModel,
        'columns' => [
                    //'id',
                    [
                    'attribute' => 'id',
                    'value' => 'id',
                    'headerOptions' => ['width' => '70'],
                    ],
                    //'type_id',
                    [
                    'label' => '广告类型',
                    'headerOptions' => ['width' => '220'],
                    'value' => function ($model) {
                        $typename=\common\models\AdvType::getTypeNameById($model->type_id);
                        return $typename;
                    }
                    ],
                    'title',
                    //'info:ntext',
                    //'advimg',
                    [
                    'label' => '缩略图片',
                    'format' => [
                        'image',
                        [
                            'width'=>'200',
                            //'height'=>'84'
                        ]
                    ],
                    'value' => function ($model) {
                        $pic=strpos($model->advimg, 'http:') === false ? (\Yii::getAlias('@static') . '/' . $model->advimg) : $model->advimg;
                        return $pic;
                        //return "http://img.sxunt.com/".$model->pic;
                    }
                    ],
                    'jumpurl:url',
                     'advorder',
                     'is_show:boolean',

                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>
        </div>
    </div>

</div>
