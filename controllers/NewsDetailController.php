<?php

namespace app\controllers;

use Yii;
use app\models\NewsDetail;
use app\models\NewsDetailSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

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
    public function actionView($id, $news_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id, $news_id),
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
        if(!empty($id)){
            $model->news_id=$id;
        }
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'news_id' => $model->news_id]);
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
    public function actionUpdate($id, $news_id)
    {
        $model = $this->findModel($id, $news_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'news_id' => $model->news_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing NewsDetail model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @param integer $news_id
     * @return mixed
     */
    public function actionDelete($id, $news_id)
    {
        $this->findModel($id, $news_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the NewsDetail model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @param integer $news_id
     * @return NewsDetail the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id, $news_id)
    {
        if (($model = NewsDetail::findOne(['id' => $id, 'news_id' => $news_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
