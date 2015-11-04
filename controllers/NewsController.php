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
use yii\web\UploadedFile;                   //For upload file
use yii\data\ActiveDataProvider;
use yii\db\ActiveQuery;

use app\models\User;                        //For set permission
use yii\filters\AccessControl;              //For set permission
use \app\component\AccessRule;              //For set permission
/**
 * NewsController implements the CRUD actions for News model.
 */
class NewsController extends Controller
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
     * Lists all News models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new NewsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->sort->defaultOrder=['sort_order'=>'ASC'];

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
    
    public function actionView($id)
    {
        $model=$this->findModel($id);
        
        $detail= NewsDetail::find()->where(['news_id'=>$id,'main'=>'Y'])->one();       //find News detail
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
            
            //UPLOAD SETUP-----------------
            if($model->file){
                $newName=date("Ymdhis");                                      //Generate filename from Date time
                //$newName=$model->code;                                          //Set image name same Product code
                $model->file->name=$newName.'.'.$model->file->extension;        //Set filename
            
                $imgPath=$model->newsDir;
                $model->pic=$model->file->name;                  
                $upload=1;
            }

            if($model->save()){
               //NEWS DETAIL SETUP--------------------
               $newsId=Yii::$app->db->getLastInsertID();                    //Get last insert ID
               $title=$_POST['News']['title'];
               $detail=$_POST['News']['detail'];
               
               //echo "NewsId: $newsId Title: $title Detail: $detail";  exit();
              
               //INSERT NEWS DETAIL---------------
               $this->insertNewsDetail([
                    'news_id'=>$newsId,
                    'title'=>$title,
                    'detail'=>$detail,
                    'main'=>'Y'
                ]);
               
               //START UPLOAD IMAGE--------------
                if($upload){
                    $model->file->saveAs($model->newsDir.$model->pic);
                }
                
                //SET DISPLAY MESSAGE ----------
                Yii::$app->getSession()->setFlash('alert',['body'=>'บันทึกข้อมูลเรียบร้อย','options'=>['class'=>'alert-success']]);
                
                //REDIRECT PAGE-----------------
                return $this->redirect(['view','id'=>$model->id]);
            }
        }else{
            return $this->renderAjax('create', [
                'model' => $model,
            ]);
        }
    }//end***
    
    

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
               $detail= NewsDetail::find()->where(['news_id'=>$id,'main'=>'Y'])->one();
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
                        'detail'=>$_POST['News']['detail'],
                        'main'=>'Y'
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
        $model->main=$data['main'];
        
        if($model->save()){
            return true;
        }else{
            return false;
        }
    }//end**
    
    //UPDATE NEWS DETAIL---------------
    public function updateNewsDetail($data){
        $model= NewsDetail::find()->where(['news_id'=>$data['news_id'],'main'=>'Y'])->one();
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
     * Deletes an existing News model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    
    public function actionDelete($id=null)
    {        
        $model=new News();
        $dir=$model->newsDir;                           
        
        //DELETE PIC IN FLODER------
        $this->deleteImageNoMsg($id,$dir,'pic');                            //Delete pic in floder
        
        //DELETE DATA IN news_detail AND news TABLE------
        NewsDetail::deleteAll('news_id = :news_id',['news_id'=>$id]);       //Delete news detail  **ถ้าไม่ลบจะ error เพราะมีการอ้างอิง id ไปใช้
        $this->findModel($id)->delete();                                    //Delete news

        //SET DISPLAY MESSAGE ----------
        Yii::$app->getSession()->setFlash('alert',['body'=>'ลบข้อมูลเรียบร้อย','options'=>['class'=>'alert-success']]);
        
        //REDIRECT PAGE-----------------
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
