<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\DiarySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Diaries';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="diary-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Diary', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <div class="box box-primary">
        <div class="box-body">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
        'columns' => [
                    'id',
                    //'cid',
                    [
                    'attribute' => 'cid',
                    'value' => function ($model) {
                        $arr = ['6'=>'夜景','7'=>'山水','8'=>'夕阳','9'=>'日落','10'=>'美女','11'=>'小孩','12'=>'老人','14'=>'美食','15'=>'街拍','16'=>'旅游','17'=>'身边','18'=>'周围','19'=>'远方','20'=>'帅哥','21'=>'大人','22'=>'生态微距','24'=>'其它拍摄'];
                        return $arr[$model->cid];
                    },
                    ],
                    //'pic',
                    [
                    'label' => '缩略图',
                    'format' => [
                        'image',
                        [
                            'width'=>'180',
                            //'height'=>'84'
                        ]
                    ],
                    'value' => function ($model) {
                        $pic=strpos($model->pic, 'http:') === false ? (\Yii::getAlias('@static') . '/' . $model->pic) : $model->pic;
                        return $pic;
                        //return "http://img.sxunt.com/".$model->pic;
                    }
                    ],
                    //'weather',
                    'date_time',
                    // 'address',
                     'people',
                     'title',
                    // 'content:ntext',
                     'author',
                    // 'keyword',
                    // 'description',

                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>
        </div>
    </div>

</div>
