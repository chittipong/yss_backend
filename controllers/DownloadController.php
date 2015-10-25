<?php

namespace app\controllers;

use Yii;
use app\models\Download;
use app\models\DownloadSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\helpers\Url;

/**
 * DownloadController implements the CRUD actions for Download model.
 */
class DownloadController extends Controller
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

    /**
     * Lists all Download models.
     * @return mixed
     */
    public function actionIndex()
    {
        //USER PROTECTED==========================================
        if(Yii::$app->user->isGuest){
            Yii::$app->session->setFlash('error', 'You must login.');
            return $this->redirect(['site/login']);
        }
         //END USER PROTECTED=====================================
        
        $searchModel = new DownloadSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Download model.
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
     * Creates a new Download model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    
    /*public function actionCreate()
    {
        $model = new Download();
        $model->date_create= date("Y-m-d h:i:s");                           //Set date create

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }*/
    
    public function actionCreate()
    {
       $model = new Download();
        $model->date_create= date("Y-m-d h:i:s");                           //Set date create
       
        if ($model->load(Yii::$app->request->post())) {
            $model->file=  UploadedFile::getInstance($model, 'file');
            $upload='';
            
            
            if($model->file){
                $newName=date("Ymdhis");                                      //Generate filename from Date time
               //$newName=$model->code;                                          //Set image name same Product code
                $model->file->name=$newName.'.'.$model->file->extension;        //Set filename
                //$model->file_size=$model->file->size;
            
                //$imgPath='uploads/products/';                               //file Path
                $imgPath=$model->downloadDir;
                $model->file_name=$model->file->name;                  
                $upload=1;
            }
            
            if($model->save()){
                if($upload){
                    $model->file->saveAs($model->downloadDir.$model->file_name);
                }
                
                //SET DISPLAY MESSAGE ----------
                Yii::$app->getSession()->setFlash('alert',['body'=>'บันทึกข้อมูลเรียบร้อย','options'=>['class'=>'alert-success']]);
                
                //REDIRECT PAGE-----------------
                return $this->redirect(['view','id'=>$model->id]);
            }
        }else{
            return $this->render('create', [
                'model' => $model,
            ]);
        }

    }


    /**
     * Updates an existing Download model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->date_create= date("Y-m-d h:i:s");                           //Set date create
       
        if ($model->load(Yii::$app->request->post())) {
            $model->file=  UploadedFile::getInstance($model, 'file');
            $upload='';
            
            
            if($model->file){
                $newName=date("Ymdhis");                                      //Generate filename from Date time
               //$newName=$model->code;                                          //Set image name same Product code
                $model->file->name=$newName.'.'.$model->file->extension;        //Set filename
                //$model->file_size=$model->file->size;
            
                //$imgPath='uploads/products/';                               //file Path
                $imgPath=$model->downloadDir;
                $model->file_name=$model->file->name;                  
                $upload=1;
            }
            
            if($model->save()){
                if($upload){
                    $model->file->saveAs($model->downloadDir.$model->file_name);
                }
                
                //SET DISPLAY MESSAGE ----------
                Yii::$app->getSession()->setFlash('alert',['body'=>'แก้ไขข้อมูลเรียบร้อย','options'=>['class'=>'alert-success']]);
                
                //REDIRECT PAGE-----------------
                return $this->redirect(['view','id'=>$model->id]);
            }
        }else{
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }
    
    //FUNCTION FOR DELETE FILE------------------
    public function actionDeleteimage($id,$dir,$field){
        $img=$this->findModel($id)->$field;
        if($img){
            if(!unlink($dir.$img)){
                return false;
            }
        }
        
        $img=$this->findModel($id);
        $img->$field=null;
        $img->update();
        
        //SET DISPLAY MESSAGE ----------
        Yii::$app->getSession()->setFlash('alert',['body'=>'ลบไฟล์เรียบร้อย','options'=>['class'=>'alert-success']]);
                
        //REDIRECT PAGE-----------------
        return $this->redirect(['update','id'=>$id]);
    }//end

    /**
     * Deletes an existing Download model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model=new Download();
        $dir=$model->downloadDir;                               //Get Director image
        
        //DELETE FILE------------------
        $this->actionDeleteimage($id,$dir,'file_name');  
        
        //DELETE DATA IN TABLE---------
        $this->findModel($id)->delete();

        //DISPLAY MESSAGE -------------
        Yii::$app->getSession()->setFlash('alert',['body'=>'ลบข้อมูลเรียบร้อย','options'=>['class'=>'alert-success']]);
        
        //REDIRECT PAGE-----------------
        return $this->redirect(['index']);
    }

    /**
     * Finds the Download model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Download the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Download::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
