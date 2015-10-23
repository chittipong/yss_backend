<?php

namespace app\controllers;

use Yii;
use app\models\NewsDetail;
use app\models\NewsDetailSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * NewsDetailController implements the CRUD actions for NewsDetail model.
 */
class NewsDetailController extends Controller
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
     * Lists all NewsDetail models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new NewsDetailSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single NewsDetail model.
     * @param integer $id
     * @param integer $news_id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new NewsDetail model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id=null)
    {
        $model = new NewsDetail();
        $dateNow= date("Y-m-d h:i:s");                                          //Set date create
        
        if(!empty($id)){
            $model->news_id=$id;
        }
        
        if ($model->load(Yii::$app->request->post())) {
            $model->file=  UploadedFile::getInstance($model, 'file');
            $upload='';

            //UPLOAD SETUP-----------------
            if($model->file){
                $newName=date("Ymdhis");                                      //Generate filename from Date time
                //$newName=$model->code;                                          //Set image name same Product code
                $model->file->name=$newName.'.'.$model->file->extension;        //Set filename
            
                $imgPath=$model->newsDetailDir;
                $model->pic=$model->file->name;                  
                $upload=1;
            }

           // echo "File name is: ".$model->pic; exit();
            
            //SAVE DATA TO DATABASE---------------
             if($model->save()){
                //UPLOAD FILE---
                 if($upload){
                    $model->file->saveAs($model->newsDetailDir.$model->pic);
                }
                
                //SET DISPLAY MESSAGE ----------
                Yii::$app->getSession()->setFlash('alert',['body'=>'บันทึกข้อมูลเรียบร้อย','options'=>['class'=>'alert-success']]);
                
                //REDIRECT------
                return $this->redirect(['view','id'=>$model->id]);
            }
            
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing NewsDetail model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @param integer $news_id
     * @return mixed
     */
    
    public function actionUpdate($id=null){
        $model = $this->findModel($id);
        $dateNow= date("Y-m-d h:i:s");                               //Set date create
       
        if ($model->load(Yii::$app->request->post())) {
            $model->file=  UploadedFile::getInstance($model, 'file');
            $upload='';
            
            if($model->file){
                $newName=date("Ymdhis");                                        //Generate filename from Date time
                //$newName=$model->code;                                        //Set image name same Product code
                $model->file->name=$newName.'.'.$model->file->extension;        //Set filename
            
                $imgPath=$model->newsDetailDir;
                $model->pic=$model->file->name;                  
                $upload=1;
                
                //DELETE OLD PICTURE***
                $this->deleteImageNoMsg($id,$imgPath,'pic');
            }

            if($model->save()){
               //UPLOAD PIC------------------
                if($upload){
                    $model->file->saveAs($model->newsDetailDir.$model->pic);
                }
                
                //SET DISPLAY MESSAGE ----------
                Yii::$app->getSession()->setFlash('alert',['body'=>'บันทึกข้อมูลเรียบร้อย','options'=>['class'=>'alert-success']]);
                
                //REDIRECT PAGE-----------------
                return $this->redirect(['view','id'=>$model->id]);
            }
         }else{
                return $this->render('update', [
                    'model' => $model,
                ]);
         }
    }//end***
    
     //FUNCTION FOR DELETE IMAGE------------------
    public function actionDeleteimage($id,$dir,$field){
        $img=$this->findModel($id)->$field;
        if($img){
            if(!unlink($dir.$img)){
                //SET DISPLAY MESSAGE ----------
                Yii::$app->getSession()->setFlash('alert',['body'=>'ไม่สามารถลบรูปภาพได้','options'=>['class'=>'alert-warning']]);

                //REDIRECT PAGE-----------------
                return $this->redirect(['update','id'=>$id]);
            }else{
                 $img=$this->findModel($id);
                $img->$field=null;
                $img->update();             //Update field

                //SET DISPLAY MESSAGE ----------
                Yii::$app->getSession()->setFlash('alert',['body'=>'ลบรูปภาพเรียบร้อย','options'=>['class'=>'alert-success']]);

                //REDIRECT PAGE-----------------
                return $this->redirect(['update','id'=>$id]);
            }
        }
    }//end**

    //FUNCTION FOR DELETE NO DISPLAY MESSAGE------------------
    public function deleteImageNoMsg($id,$dir,$field){
        $img=$this->findModel($id)->$field;
        if($img){
            if(!unlink($dir.$img)){
                return false;
            }else{
                /*$img=$this->findModel($id);
                $img->$field=null;
                $img->update();*/
                return true;
            }
        }
    }//end**
    
    
    /**
     * Deletes an existing NewsDetail model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @param integer $news_id
     * @return mixed
     */

    public function actionDelete($id=null){
        $model=new NewsDetail();
        $dir=$model->newsDetailDir;                            //Get Director image
        
        //DELETE IMAGE--------------
        $this->deleteImageNoMsg($id,$dir,'pic');        
        
        //DELETE DATA IN TABLE
        $this->findModel($id)->delete();

        //SET DISPLAY MESSAGE ----------
        Yii::$app->getSession()->setFlash('alert',['body'=>'ลบข้อมูลเรียบร้อย','options'=>['class'=>'alert-success']]);
        
        //REDIRECT PAGE-----------------
        return $this->redirect(['index']);
    }//end***

    /**
     * Finds the NewsDetail model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @param integer $news_id
     * @return NewsDetail the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = NewsDetail::findOne(['id' => $id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
