<?php

namespace app\controllers;

use Yii;
use app\models\ProductDetail;
use app\models\ProductDetailSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * ProductDetailController implements the CRUD actions for ProductDetail model.
 */
class ProductDetailController extends Controller
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
     * Lists all ProductDetail models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProductDetailSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ProductDetail model.
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
     * Creates a new ProductDetail model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    
    public function actionCreate($id=null){
        $model = new ProductDetail();
        $dateNow= date("Y-m-d h:i:s");                              
       
        if ($model->load(Yii::$app->request->post())) {
            $model->file=  UploadedFile::getInstance($model, 'file');
            $upload='';
            
            //CHECK FILE UPLOAD-----------------
            if($model->file){
                $newName=date("Ymdhis");                                      //Generate filename from Date time
                //$newName=$model->code;                                          //Set image name same Product code
                $model->file->name=$newName.'.'.$model->file->extension;        //Set filename
            
                $imgPath=$model->detailDir;
                $model->pic=$model->file->name;                  
                $upload=1;
            }

            if($model->save()){
                //UPLOAD PICTURE AFTER SAVE DATA------------
                if($upload){
                    $model->file->saveAs($model->detailDir.$model->pic);
                }
                
                //SET DISPLAY SUCCESS MESSAGE ----------
                Yii::$app->getSession()->setFlash('alert',['body'=>'บันทึกข้อมูลเรียบร้อย','options'=>['class'=>'alert-success']]);
                
                if(!empty($model->product_id)){
                    //REDIRECT PAGE TO PRODUCT VIEW DETAIL-----------------
                    return $this->redirect(['product/view','id'=>$model->product_id]);
                }else{
                    //REDIRECT PAGE DEFAULT-----------------
                    return $this->redirect(['view','id'=>$model->id]);
                }
            }
        }else{
            if(!empty($id)){
                $model->product_id=$id;
            }
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }//end***

    /**
     * Updates an existing ProductDetail model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */

    
     public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        
        $dateNow= date("Y-m-d h:i:s");                              
       
        if ($model->load(Yii::$app->request->post())) {
            $model->file=  UploadedFile::getInstance($model, 'file');
            $upload='';
            
            if($model->file){
                $newName=date("Ymdhis");                                      //Generate filename from Date time
                //$newName=$model->code;                                          //Set image name same Product code
                $model->file->name=$newName.'.'.$model->file->extension;        //Set filename
            
                $imgPath=$model->detailDir;
                $model->pic=$model->file->name;                  
                $upload=1;
                
                //DELETE OLD PICTURE***
                $this->deleteImageNoMsg($model->id,$imgPath,'pic');
            }

            //UPDATE MAIN DEFAULT BEFORE UPDATE----------
            if($model->main='Y'){
                ProductDetail::updateAll(['main'=>'N'],"product_id=$model->product_id");                //ถ้ามีการกำหนด main default ใหม่จะทำการอัพเดตให้ทุก Record เป็น N ก่อน แล้วค่อนอัพเดต Reccord ที่ถูกเซตเป็น Y
            }
            
            //UPDATE DATABASE------------------
            if($model->save()){
                //UPLOAD PICTURE---------------
                if($upload){
                    $model->file->saveAs($model->detailDir.$model->pic);
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
                $img->update();

                //SET DISPLAY MESSAGE ----------
                Yii::$app->getSession()->setFlash('alert',['body'=>'ลบรูปภาพเรียบร้อย','options'=>['class'=>'alert-success']]);

                //REDIRECT PAGE-----------------
                return $this->redirect(['update','id'=>$id]);
            }
        }
    }//end**
    
    
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
     * Deletes an existing ProductDetail model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    
    public function actionDelete($id=null){
        $model=new ProductDetail();
        $dir=$model->detailDir;                              //Get Director image
        
        //DELETE PRODUCT DETAIL----------
        $this->actionDeleteimage($id,$dir,'pic');            //Delete product image
        $this->findModel($id)->delete();

        //SET DISPLAY MESSAGE ----------
        Yii::$app->getSession()->setFlash('alert',['body'=>'ลบข้อมูลเรียบร้อย','options'=>['class'=>'alert-success']]);
        
        //REDIRECT PAGE-----------------
        return $this->redirect(['index']);
    }

    /**
     * Finds the ProductDetail model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ProductDetail the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ProductDetail::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
