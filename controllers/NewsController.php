<?php
namespace app\controllers;

use Yii;
use app\models\News;
use app\models\NewsDetail;
use app\models\NewsDetailSearch;
use app\models\NewsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\data\ActiveDataProvider;
/**
 * NewsController implements the CRUD actions for News model.
 */
class NewsController extends Controller
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
     * Lists all News models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new NewsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single News model.
     * @param integer $id
     * @return mixed
     */
//    public function actionView($id)
//    {
//        return $this->render('view', [
//            'model' => $this->findModel($id),
//        ]);
//    }

    
    public function actionView($id)
    {
        $model=$this->findModel($id);
        
        $detail= NewsDetail::find()->where(['news_id'=>$id,'lang'=>'TH'])->one();       //find News detail
        if($detail){
            $model->title=$detail->title;
            $model->detail=$detail->detail;
        }
        
        //Get News Detail---------------------
        $newsDetail=NewsDetail::find()->where(['news_id'=>$id])->all();                 //find News detail
        $query=  NewsDetail::find()->where(['news_id' => $id]);
        
        $dataProvider = new ActiveDataProvider([
           'query' => $query,
        ]);
        
        
        return $this->render('view', [
            'model' =>$model,
            'newsDetail' => $dataProvider,
        ]);
    }
    
    /**
     * Creates a new News model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    
    public function actionCreate(){
        $model=new News();
        $model->date_create= date("Y-m-d h:i:s");                           //Set date create
       
        if ($model->load(Yii::$app->request->post())) {
            $model->file=  UploadedFile::getInstance($model, 'file');
            $upload='';
            
            if($model->file){
                $newName=date("Ymdhis");                                      //Generate filename from Date time
                //$newName=$model->code;                                          //Set image name same Product code
                $model->file->name=$newName.'.'.$model->file->extension;        //Set filename
            
                $imgPath=$model->newsDir;
                $model->pic=$model->file->name;                  
                $upload=1;
            }

            if($model->save()){
               $newsId=Yii::$app->db->getLastInsertID();                    //Get last insert ID
               $title=$_POST['News']['title'];
               $detail=$_POST['News']['detail'];
               
               //echo "NewsId: $newsId Title: $title Detail: $detail";  exit();
               
               $this->insertNewsDetail([
                    'news_id'=>$newsId,
                    'title'=>$title,
                    'detail'=>$detail
                ]);
               
               
                if($upload){
                    $model->file->saveAs($model->newsDir.$model->pic);
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
     * Updates an existing News model.
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
            
                $imgPath=$model->newsDir;
                $model->pic=$model->file->name;                  
                $upload=1;
            }

            if($model->save()){
               //UPDATE NEWS DETAIL----------------
               $detail= NewsDetail::find()->where(['news_id'=>$id,'lang'=>'TH'])->one();
               if($detail){
                   //Call function for update------
                    $this->updateNewsDetail([
                        'news_id'=>$id,
                        'title'=>$_POST['News']['title'],
                        'detail'=>$_POST['News']['detail']
                    ]);
               }else{
               //CREATE NEWS DETAIL WHEN THERE IS NO NEWS DETAIL--------
                    $this->insertNewsDetail([
                        'news_id'=>$id,
                        'title'=>$_POST['News']['title'],
                        'detail'=>$_POST['News']['detail']
                    ]);
               }//end***
               
               //UPLOAD PIC------------------
                if($upload){
                    $model->file->saveAs($model->newsDir.$model->pic);
                }
                
                //SET DISPLAY MESSAGE ----------
                Yii::$app->getSession()->setFlash('alert',['body'=>'บันทึกข้อมูลเรียบร้อย','options'=>['class'=>'alert-success']]);
                
                //REDIRECT PAGE-----------------
                return $this->redirect(['view','id'=>$model->id]);
            }
        }else{
            //GET NEWS DETAIL AND SET VALUE-------------------
            $detail=  NewsDetail::find()->where(['news_id'=>$id])->one();
            if($detail){
                $model->title=$detail->title;
                $model->detail=$detail->detail;
            }
            
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }
    
    
   //INSERT NEWS DETAIL----------------
    public function insertNewsDetail($data){
        $model=new NewsDetail();
        $model->news_id=$data['news_id'];
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
    }//end**
    
    //UPDATE NEWS DETAIL---------------
    public function updateNewsDetail($data){
        $model= NewsDetail::find()->where(['news_id'=>$data['news_id'],'lang'=>'TH'])->one();
        if($model){
             $model->title=$data['title'];
             $model->detail=$data['detail'];
        
            if($model->save()){
                return true;
            }else{
                return false;
            }
        }
    }//end**
    
    
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
    }//end**

    /**
     * Deletes an existing News model.
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
     * Finds the News model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return News the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = News::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
