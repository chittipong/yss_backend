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

    /**
     * Lists all Product models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProductSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

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
    public function actionView($id)
    {
        $searchModel = new ProductDetailSearch();
        //$detail = new ProductDetail();
        
        return $this->render('view', [
            'model' => $this->findModel($id),
            'searchModel' => $searchModel,
            //'detail'=> $detail->findAll(['product_id'=>$id])
        ]);
    }

    /**
     * Creates a new Product model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Product();
        $model->date_create= date("Y-m-d h:i:s");                           //Set date create
       
        if ($model->load(Yii::$app->request->post())) {
            $model->file=  UploadedFile::getInstance($model, 'file');
            $upload='';
            
            if($model->file){
                //$newName=date("Ymdhis");                                      //Generate filename from Date time
                $newName=$model->code;                                          //Set image name same Product code
                $model->file->name=$newName.'.'.$model->file->extension;        //Set filename
            
                //$imgPath='uploads/products/';                               //Image Path
                $imgPath=$model->productDir;
                $model->image=$model->file->name;                  
                $upload=1;
            }

            if($model->save()){
               $productId=Yii::$app->db->getLastInsertID();                 //Get last insert ID
               $title=$_POST['Product']['title'];
               $detail=$_POST['Product']['detail'];
               
               $this->insertDetail([
                    'product_id'=>$productId,
                    'title'=>$title,
                    'detail'=>$detail
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
        $model=new ProductDetail();
        $model->product_id=$data['product_id'];
        $model->title=$data['title'];
        $model->detail=$data['detail'];
       
        //Set default language----------
        if(empty($model->lang)){
            $model->lang='TH';                  
        }
        
        if($model->save()){
            return true;
        }else{
            return false;
        }
    }

    /**
     * Updates an existing Product model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->date_update= date("Y-m-d h:i:s");                           //Set date update

       if ($model->load(Yii::$app->request->post())) {
            $model->file=  UploadedFile::getInstance($model, 'file');
            $upload='';
            
            if($model->file){
                //$newName=date("Ymdhis");                                      //Generate filename from Date time
                $newName=$model->code;                                          //Set image name same Product code
                $model->file->name=$newName.'.'.$model->file->extension;        //Set file name
                
                $model->image=$model->file->name;                  
                $upload=1;
            }
            
            if($model->save()){
                if($upload){
                    $model->file->saveAs($model->productDir.$model->image);
                }
                
                //SET DISPLAY MESSAGE ----------
                Yii::$app->getSession()->setFlash('alert',['body'=>'แก้ไขข้อมูลเรียบร้อย','options'=>['class'=>'alert-success']]);
                
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
                 
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }
    
    
    //FUNCTION FOR DELETE IMAGE------------------
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
        Yii::$app->getSession()->setFlash('alert',['body'=>'ลบรูปภาพเรียบร้อย','options'=>['class'=>'alert-success']]);
                
        //REDIRECT PAGE-----------------
        return $this->redirect(['update','id'=>$id]);
    }//end
    

    /**
     * Deletes an existing Product model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model=new Product();
        $dir=$model->productDir;                            //Get Director image
        
        $this->actionDeleteimage($id,$dir,'image');         //Delete product image
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
