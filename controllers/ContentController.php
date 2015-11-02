<?php

namespace app\controllers;

use Yii;
use app\models\Content;
use app\models\ContentSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

use app\models\User;                        //For set permission
use yii\filters\AccessControl;              //For set permission
use \app\component\AccessRule;              //For set permission

/**
 * ContentController implements the CRUD actions for Content model.
 */
class ContentController extends Controller
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
     * Lists all Content models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ContentSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Content model.
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
     * Creates a new Content model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    
    public function actionCreate($page_id=null){
        $model=new Content();
        $model->date_create= date("Y-m-d h:i:s");                           //Set date create
       
        if ($model->load(Yii::$app->request->post())) {
            $model->file=  UploadedFile::getInstance($model, 'file');
            $upload='';
            
            //UPLOAD SETUP-----------------
            if($model->file){
                $newName=date("Ymdhis");                                      //Generate filename from Date time
                //$newName=$model->code;                                          //Set image name same Product code
                $model->file->name=$newName.'.'.$model->file->extension;        //Set filename
            
                $imgPath=$model->contentDir;
                $model->pic=$model->file->name;                  
                $upload=1;
            }

            if($model->save()){
               //START UPLOAD IMAGE--------------
                if($upload){
                    $model->file->saveAs($model->contentDir.$model->pic);
                }
                
                //SET DISPLAY MESSAGE ----------
                Yii::$app->getSession()->setFlash('alert',['body'=>'บันทึกข้อมูลเรียบร้อย','options'=>['class'=>'alert-success']]);
                
                //REDIRECT PAGE-----------------
                return $this->redirect(['view','id'=>$model->id]);
            }
        }else{
            if(!empty($page_id)){            //กรณีที่กด insert จากหน้า page/view ใหเซต page_id เข้าไปทันที
                $model=new Content();
                $model->page=$page_id;
            }
                
            return $this->render('create', [
               'model' => $model,
            ]);
            
        }
    }//end***

    /**
     * Updates an existing Content model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->date_update= date("Y-m-d h:i:s");                               //Set date create
       
        if ($model->load(Yii::$app->request->post())) {
            $model->file=  UploadedFile::getInstance($model, 'file');
            $upload='';
            
            if($model->file){
                $newName=date("Ymdhis");                                        //Generate filename from Date time
                //$newName=$model->code;                                        //Set image name same Product code
                $model->file->name=$newName.'.'.$model->file->extension;        //Set filename
            
                $imgPath=$model->contentDir;
                $model->pic=$model->file->name;                  
                $upload=1;

               //DELETE OLD PICTURE***
                $this->deleteImageNoMsg($id,$imgPath,'pic');
            }

            if($model->save()){
               //UPLOAD PIC------------------
                if($upload){
                    $model->file->saveAs($model->contentDir.$model->pic);
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
     * Deletes an existing Content model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id=null)
    {        
        $model=new Content();
        $dir=$model->contentDir;                       
        
        //DELETE PIC IN FLODER------
        $this->deleteImageNoMsg($id,$dir,'pic');                            //Delete pic in floder
        $this->findModel($id)->delete();                                    //Delete news

        //SET DISPLAY MESSAGE ----------
        Yii::$app->getSession()->setFlash('alert',['body'=>'ลบข้อมูลเรียบร้อย','options'=>['class'=>'alert-success']]);
        
        //REDIRECT PAGE-----------------
        return $this->redirect(['index']);
    }//end***

    /**
     * Finds the Content model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Content the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Content::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
