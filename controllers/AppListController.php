<?php

namespace app\controllers;

use Yii;
use app\models\AppList;
use app\models\AppListSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\UploadedFile;

/**
 * AppListController implements the CRUD actions for AppList model.
 */
class AppListController extends Controller
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
            //CODE FOR PROTECTED USER==============================
            'access'=>[
                'class'=>  AccessControl::className(),
                'only'=>['index','view','create','update','delete'],             //All action in controller***
                'rules'=>[
                    [
                        //Action for ADMIN can Access---------
                        'actions'=>['index','create','update','delete'],
                        'allow'=>true,
                        'roles'=>['@']                                          // @ คือใครก็ได้ที่ผ่านการ login เข้ามา
                    ],
                    [
                        //Action for Guest can Access---------
                        'actions'=>['index','view'],
                        'allow'=>true,
                        'roles'=>['?','@']                                      //? คือใครก็ได้ที่ไม่ได้ login ดังนั้นต้องใส่ @ เข้าไปด้วย
                    ]
                ]
            ],//end code for protect user===========================
        ];
    }

    /**
     * Lists all AppList models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AppListSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

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
//    public function actionUpdate($id)
//    {
//        $model = $this->findModel($id);
//        $dateNow= date("Y-m-d h:i:s");                           //Set date create
//        $model->date_update=$dateNow;
//
//        if ($model->load(Yii::$app->request->post()) && $model->save()) {
//            return $this->redirect(['view', 'id' => $model->id]);
//        } else {
//            return $this->render('update', [
//                'model' => $model,
//            ]);
//        }
//    }
    
    public function actionUpdate($id=null){
        $model = $this->findModel($id);
        $model->date_update= date("Y-m-d h:i:s");                               //Set date create
       
        if ($model->load(Yii::$app->request->post())) {
            $model->file=  UploadedFile::getInstance($model, 'file');
            $upload='';
            
            if($model->file){
                $newName=date("Ymdhis");                                        //Generate filename from Date time
                //$newName=$model->code;                                        //Set image name same Product code
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

                        //REDIRECT PAGE-----------------
                        return $this->redirect(['update','id'=>$id]);
                    }
            }else{
                $img=$this->findModel($id);
                $img->$field=null;
                $img->update();             //Update field
            }
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
