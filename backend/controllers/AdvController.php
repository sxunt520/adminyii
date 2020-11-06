<?php

namespace backend\controllers;

use Yii;
use common\models\Adv;
use backend\models\AdvSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\AdvType;

/**
 * AdvController implements the CRUD actions for Adv model.
 */
class AdvController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }
    
    public function actions()
    {
        return [
            'upload' => [
                'class' => 'kucha\ueditor\UEditorAction',
                'config' => [
                    'imageUrlPrefix' => \Yii::getAlias('@static').'/', //图片访问路径前缀
                    'imagePathFormat' => 'upload/image/{yyyy}{mm}{dd}/{time}{rand:6}', //上传保存路径
                ],
            ],
            'webupload' => 'yidashi\webuploader\Action'
        ];
    }

    /**
     * Lists all Adv models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AdvSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Adv model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Adv model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($type_id=0)
    {
        $model = new Adv();
        
        $model->type_id=$type_id;
        $advtype_model=AdvType::findOne($type_id);
        if($advtype_model){
            $adv_width=$advtype_model->width;
            $adv_height=$advtype_model->height;
        }else{
            $adv_width=0;
            $adv_height=0;
        }
        
        //echo $advtype_model->width;echo '---------';echo $advtype_model->height;
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'type_id' => $type_id,
                'adv_width' => $adv_width,
                'adv_height' => $adv_height,
            ]);
        }
    }

    /**
     * Updates an existing Adv model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {   
        $model = $this->findModel($id);
        
        $type_id=$model->type_id;
        $advtype_model=AdvType::findOne($type_id);
        if($advtype_model){
            $type_id=$model->type_id;
            $adv_width=$advtype_model->width;
            $adv_height=$advtype_model->height;
        }else{
            $type_id=0;
            $adv_width=0;
            $adv_height=0;
        }
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'type_id' => $type_id,
                'adv_width' => $adv_width,
                'adv_height' => $adv_height,
            ]);
        }
    }

    /**
     * Deletes an existing Adv model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Adv model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Adv the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Adv::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
