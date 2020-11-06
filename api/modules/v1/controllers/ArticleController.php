<?php

namespace api\modules\v1\controllers;

use Yii;
use api\components\BaseController;
use api\models\Article;

class ArticleController extends BaseController
{
    public function init(){
        parent::init();
    }
    
    public $modelClass = 'api\models\Article';

    /**
     * 获取文章列表
     */
    public function actionList(){
         $Article_model=Article::find()
        ->andWhere(['=', 'category_id', 1])
        ->orderBy(['id' => SORT_DESC])
        ->limit(3)
        ->all();
         return $Article_model;
    }

    
}
