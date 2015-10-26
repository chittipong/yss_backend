<?php

namespace app\controllers;

use Yii;
use app\models\YssModel;
use app\models\YssModelSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * YssModelController implements the CRUD actions for YssModel model.
 */
class YssModelController extends Controller
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
     * Lists all YssModel models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new YssModelSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single YssModel model.
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
     * Creates a new YssModel model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new YssModel();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->model_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing YssModel model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->model_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing YssModel model.
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
     * Finds the YssModel model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return YssModel the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = YssModel::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
