<?php

namespace app\controllers;

use Yii;
use app\models\Product;
use app\models\ProductDetail;
use app\models\ProductSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use \app\models\ProductDetailSearch;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;

/**
 * ProductController implements the CRUD actions for Product model.
 */
class ProductController extends Controller
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
    
    //USER CHEK PERMISSION********
    public function checkPermission(){
        //USER PROTECTED==========================================
        if(Yii::$app->user->isGuest){
            Yii::$app->session->setFlash('error', 'You must login.');
            return $this->redirect(['site/login']);
        }
         //END USER PROTECTED=====================================
    }//end***

    /**
     * Lists all Product models.
     * @return mixed
     */
    public function actionIndex()
    {
        $this->checkPermission();                 //User check permission*****
        
        $searchModel = new ProductSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->sort->defaultOrder=['product_id'=>'DESC'];

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Product model.
     * @param integer $id
     * @return mixed
     */
    
    public function actionView($id){
        $this->checkPermission();                 //User check permission*****
        $model=$this->findModel($id);
        
        $detail= ProductDetail::find()->where(['product_id'=>$id,'main'=>'Y'])->one();       //find News detail
        if($detail){
            $model->title=$detail->title;
            $model->detail=$detail->detail;
            $model->lang=$detail->lang;
        }
        
        //Get All Product Detail---------------------
        $productDetail=  ProductDetail::find()->where(['product_id'=>$id])->all();                 //find News detail
        $query= ProductDetail::find()->where(['product_id' => $id]);
        
        $dataProvider = new ActiveDataProvider([
           'query' => $query,
        ]);
        
        
        return $this->render('view', [
            'model' =>$model,
            'prodDetail' => $dataProvider,
        ]);
    }

    /**
     * Creates a new Product model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $this->checkPermission();                 //User check permission*****
        
        $model = new Product();
        $model->date_create= date("Y-m-d h:i:s");                           //Set date create
       
        if ($model->load(Yii::$app->request->post())) {
            $model->file=  UploadedFile::getInstance($model, 'file');
            $upload='';
            
            //CHECK FILE UPLOAD-----------
            if($model->file){
                //$newName=date("Ymdhis");                                      //Generate filename from Date time
                $newName=$model->code;                                          //Set image name same Product code
                $model->file->name=$newName.'.'.$model->file->extension;        //Set filename
            
                //SET UP FOR UPLOAD---------
                $imgPath=$model->productDir;
                $model->image=$model->file->name;                  
                $upload=1;
            }

            if($model->save()){
               $productId=Yii::$app->db->getLastInsertID();                 //Get last insert ID
               $title=$_POST['Product']['title'];
               $detail=$_POST['Product']['detail'];
               //INSERT DETAIL----------
               $this->insertDetail([
                    'product_id'=>$productId,
                    'title'=>$title,
                    'detail'=>$detail,
                    'main'=>'Y'
                ]);
               
                if($upload){
                    $model->file->saveAs($model->productDir.$model->image);
                }
                
                //SET DISPLAY MESSAGE ----------
                Yii::$app->getSession()->setFlash('alert',['body'=>'บันทึกข้อมูลเรียบร้อย','options'=>['class'=>'alert-success']]);
                
                //REDIRECT PAGE-----------------
                return $this->redirect(['view','id'=>$model->product_id]);
            }
        } else {
            //SET DEFAULT VALUE FOR RADIO BUTTON ELEMENT
                 $model->abeflag=0;    
                 $model->hyd=0; 
                 $model->emu=0;
                 $model->res=0;
                 
                 $model->rebound='-';
                 $model->length_adjuster='-';
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
    }
    
    
    //Function for save product detail------
        public function insertDetail($data){
            $this->checkPermission();                 //User check permission*****
            
            $model=new ProductDetail();
            $model->product_id=$data['product_id'];
            $model->title=$data['title'];
            $model->detail=$data['detail'];
            $model->main=$data['main'];

            if($model->save()){
                return true;
            }else{
                return false;
            }
        }//end***

    /**
     * Updates an existing Product model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $this->checkPermission();                 //User check permission*****
        
        $model = $this->findModel($id);
        $model->date_update= date("Y-m-d h:i:s");                           //Set date update

       if ($model->load(Yii::$app->request->post())) {
            $model->file=  UploadedFile::getInstance($model, 'file');
            $upload='';
            
            //CHECK FIEL UPLOAD 
            if($model->file){
                //$newName=date("Ymdhis");                                      //Generate filename from Date time
                $newName=$model->code;                                          //Set image name same Product code
                $model->file->name=$newName.'.'.$model->file->extension;        //Set file name
                
                $model->image=$model->file->name;                               //Set file name to image field
                $upload=1;
                                
                //DELETE OLD PICTURE***
                $this->deleteImageNoMsg($model->product_id,$model->productDir,'image');
                
            }
            
            //echo $model->image; exit();
            
            if($model->save()){
                //UPDATE PRODUCT DETAIL----------------
               $detail= ProductDetail::find()->where(['product_id'=>$id,'main'=>'Y'])->one();
               if($detail){
                   //Call function for update------
                    $this->updateDetail([
                        'product_id'=>$id,
                        'title'=>$_POST['Product']['title'],
                        'detail'=>$_POST['Product']['detail'],
                    ]);
               }else{
               //CREATE PRODUCT DETAIL WHEN THERE IS NO PRODUCT DETAIL--------
                    $this->insertDetail([
                        'product_id'=>$id,
                        'title'=>$_POST['Product']['title'],
                        'detail'=>$_POST['Product']['detail'],
                        'main'=>'Y'
                    ]);
               }//end***
               
                //UPLOAD FILE--------------------
                if($upload){
                    $model->file->saveAs($model->productDir.$model->image);
                }
                
                //echo $model->image; exit();
                //SET DISPLAY MESSAGE ----------
                Yii::$app->getSession()->setFlash('alert',['body'=>'แก้ไขข้อมูลเรียบร้อย','options'=>['class'=>'alert-success']]);
                
                //REDIRECT PAGE-----------------
                return $this->redirect(['view','id'=>$model->product_id]);
            }
        } else {
            //GET PRODUCT DETAIL AND SET VALUE-------------------
            $detail= ProductDetail::find()->where(['product_id'=>$id,'main'=>'Y'])->one();
            if($detail){
                $model->title=$detail->title;
                $model->detail=$detail->detail;
            }
            
            //SET DEFAULT VALUE FOR RADIO BUTTON ELEMENT
                 $model->abeflag=0;    
                 $model->hyd=0; 
                 $model->emu=0;
                 $model->res=0;
                 
                 $model->rebound='-';
                 $model->length_adjuster='-';
                 $model->hydraulic='-';
                 $model->emulsion='-';
                 $model->piggy_back='-';
                 $model->on_hose='-';
                 $model->free_piston='-';
                 $model->dtg='-';
            //END---------------------------------------
                 
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }
    
    
     //Function for save product detail------
    public function updateDetail($data){
        $this->checkPermission();                 //User check permission*****
        
        $model= ProductDetail::find()->where(['product_id'=>$data['product_id'],'main'=>'Y'])->one();
        if($model){
             $model->title=$data['title'];
             $model->detail=$data['detail'];
        
            if($model->save()){
                return true;
            }else{
                return false;
            }
        }
    }
    
    //FUNCTION FOR DELETE IMAGE------------------
    public function actionDeleteimage($id,$dir,$field){
        $img=$this->findModel($id)->$field;
        if($img){
            $delImg=@unlink($dir.$img);
            if(!$delImg){
                 //SET DISPLAY MESSAGE ----------
                Yii::$app->getSession()->setFlash('alert',['body'=>'ไม่สามารถลบรูปภาพได้','options'=>['class'=>'alert-warning']]);

                //REDIRECT PAGE-----------------
                return $this->redirect(['update','id'=>$id]);
            }else{
                $img=$this->findModel($id);
                $img->$field=null;
                $img->update();

                //SET DISPLAY MESSAGE ----------
                Yii::$app->getSession()->setFlash('alert',['body'=>'ลบรูปภาพเรียบร้อย','options'=>['class'=>'alert-success']]);

                //REDIRECT PAGE-----------------
                return $this->redirect(['update','id'=>$id]);
            }
        }
    }//end
    
    
    //FUNCTION FOR DELETE IMAGE NO SHOW MESSAGE------------------
    public function deleteImageNoMsg($id,$dir,$field){
        $img=$this->findModel($id)->$field;
        if($img){
            if(!unlink($dir.$img)){
                return false;
            }else{
               /* $img=$this->findModel($id);
                $img->$field=null;
                $img->update();*/
              return true;
            }
        }
    }//end

    /**
     * Deletes an existing Product model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->checkPermission();                 //User check permission*****
        
        $model=new Product();
        $dir=$model->productDir;                            //Get Director image
        
        //DELETE IMAGE--------------
        $this->deleteImageNoMsg($id,$dir,'image');        
        
        //DELETE DATA IN TABLE
        $this->findModel($id)->delete();

        //SET DISPLAY MESSAGE ----------
        Yii::$app->getSession()->setFlash('alert',['body'=>'ลบข้อมูลเรียบร้อย','options'=>['class'=>'alert-success']]);
        
        //REDIRECT PAGE-----------------
        return $this->redirect(['index']);
    }

    /**
     * Finds the Product model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Product the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Product::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
