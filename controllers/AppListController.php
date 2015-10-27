<?php

namespace app\controllers;

use Yii;
use app\models\AppList;
use app\models\AppListSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;                   //For upload file

use app\models\User;                        //For set permission
use yii\filters\AccessControl;              //For set permission
use \app\component\AccessRule;              //For set permission

/**
 * AppListController implements the CRUD actions for AppList model.
 */
class AppListController extends Controller
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
     * Lists all AppList models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AppListSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->sort->defaultOrder=['id'=>'DESC'];

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single AppList model.
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
     * Creates a new AppList model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new AppList();
        $model->date_create= date("Y-m-d h:i:s");                           //Set date create
       
        if ($model->load(Yii::$app->request->post())) {
            $model->file=  UploadedFile::getInstance($model, 'file');
            $upload='';
            
            //CHECK FILE UPLOAD-----------
            if($model->file){
                //$newName=date("Ymdhis");                                      //Generate filename from Date time
                $newName=$model->product_code;                                  //Set image name same Product code
                $model->file->name=$newName.'.'.$model->file->extension;        //Set filename
            
                //SET UP FOR UPLOAD---------
                $imgPath=$model->productDir;
                $model->pic=$model->file->name;                  
                $upload=1;
            }

            if($model->save()){
                if($upload){
                    $model->file->saveAs($model->productDir.$model->pic);
                }
                
                //SET DISPLAY MESSAGE ----------
                Yii::$app->getSession()->setFlash('alert',['body'=>'บันทึกข้อมูลเรียบร้อย','options'=>['class'=>'alert-success']]);
                
                //REDIRECT PAGE-----------------
                return $this->redirect(['view','id'=>$model->id]);
            }
    }else {
            //SET DEFAULT VALUE FOR RADIO BUTTON ELEMENT
                 $model->rebound='-';
                 $model->length_adjust='-';
                 $model->hydraulic='-';
                 $model->emulsion='-';
                 $model->piggy_back='-';
                 $model->on_hose='-';
                 $model->free_piston='-';
                 $model->dtg='-';
            //END---------------------------------------
                 
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }//end***

    /**
     * Updates an existing AppList model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    
    public function actionUpdate($id=null){
        $model = $this->findModel($id);
        $model->date_update= date("Y-m-d h:i:s");                               //Set date create
       
        if ($model->load(Yii::$app->request->post())) {
            $model->file=  UploadedFile::getInstance($model, 'file');
            $upload='';
            
            if($model->file){
                //$newName=date("Ymdhis");                                        //Generate filename from Date time
                $newName=$model->product_code;                                        //Set image name same Product code
                $model->file->name=$newName.'.'.$model->file->extension;        //Set filename
            
                $imgPath=$model->productDir;
                $model->pic=$model->file->name;                  
                $upload=1;
            }

            if($model->save()){
               //UPLOAD PIC------------------
                if($upload){
                    $model->file->saveAs($model->productDir.$model->pic);
                    
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
     * Deletes an existing AppList model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model=new AppList();
        $dir=$model->productDir;                           
        
        //DELETE PIC IN FLODER------
        $this->deleteImageNoMsg($id,$dir,'pic');                            //Delete pic in floder
        
        //DELETE AppList------------
        $this->findModel($id)->delete();                                    //Delete news

        //SET DISPLAY MESSAGE ---------
        Yii::$app->getSession()->setFlash('alert',['body'=>'ลบข้อมูลเรียบร้อย','options'=>['class'=>'alert-success']]);
        
        //REDIRECT PAGE-----------------
        return $this->redirect(['index']);
    }

    /**
     * Finds the AppList model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return AppList the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AppList::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
