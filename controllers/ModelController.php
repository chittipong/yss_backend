<?php

namespace app\controllers;

use Yii;
use app\models\Model;
use app\models\ModelSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use app\models\User;                        //For set permission
use yii\filters\AccessControl;              //For set permission
use \app\component\AccessRule;              //For set permission

/**
 * ModelController implements the CRUD actions for Model model.
 */
class ModelController extends Controller
{
    //SET PERMISSION========================================
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'ruleConfig'=>[
                  'class'=>AccessRule::className(),  
                ],
                'only' => ['create', 'update', 'delete','index','view'],
                'rules' => [
                    [
                        //กำหนด User ที่สามารถทำการ Create,Update,Delete ได้
                        'actions' => ['create','update','delete','index','view'],
                        'allow' => true,
                        'roles' => [
                            User::ROLE_MANAGER,
                            User::ROLE_ADMIN,
                            //User::ROLE_USER,
                        ],
                    ],
                    [
                        //กำหนดสิทธิ์ User ที่สามารถเข้าดูข้อมูลได้ในหน้า index,view ได้เท่านั้น
                        'actions' => ['index','view'],
                        'allow' => true,
                        'roles' => [
                            User::ROLE_USER,
                        ],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }//END SET PERMISSION============================

    /**
     * Lists all Model models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ModelSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Model model.
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
     * Creates a new Model model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Model();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->model_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Model model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->model_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }
    
    //FUNCTION FOR DELETE IMAGE------------------
    public function actionDeleteimage($id,$dir,$field){
        $img=$this->findModel($id)->$field;
        if($img){
            //CHECK FILE EXISTED---------
            if(file_exists($dir.$img)){
                    if(!unlink($dir.$img)){
                        //SET DISPLAY MESSAGE ----------
                        Yii::$app->getSession()->setFlash('alert',['body'=>'ไม่สามารถลบภาพได้','options'=>['class'=>'alert-warning']]);

                        //REDIRECT PAGE-----------------
                        return $this->redirect(['update','id'=>$id]);
                    }else{ //WHEN DELETE FILE SUCCESS-------
                        $img=$this->findModel($id);
                        $img->$field=null;
                        $img->update();             //Update field

                        //SET DISPLAY MESSAGE ----------
                        Yii::$app->getSession()->setFlash('alert',['body'=>'ลบรูปภาพเรียบร้อย','options'=>['class'=>'alert-success']]);
                    }
            }else{
                $img=$this->findModel($id);
                $img->$field=null;
                $img->update();             //Update field
            }
            
            //REDIRECT PAGE-----------------
              return $this->redirect(['update','id'=>$id]);
        }
    }//end**
    
    
    //FUNCTION FOR DELETE NO DISPLAY MESSAGE------------------
    public function deleteImageNoMsg($id,$dir,$field){
        $img=$this->findModel($id)->$field;
        if($img){
            //CHECK FILE EXISTED---------
            if(file_exists($dir.$img)){
                if(!unlink($dir.$img)){
                    return false;
                }else{
                    /*$img=$this->findModel($id);
                    $img->$field=null;
                    $img->update();*/
                    return true;
                }
            }else{
                $img=$this->findModel($id);
                $img->$field=null;
                $img->update();             //Update field
            }
        }
    }//end**

    /**
     * Deletes an existing Model model.
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
     * Finds the Model model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Model the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Model::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
