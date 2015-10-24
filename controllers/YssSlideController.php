<?php

namespace app\controllers;

use Yii;
use app\models\YssSlide;
use app\models\YssSlideSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * YssSlideController implements the CRUD actions for YssSlide model.
 */
class YssSlideController extends Controller
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
     * Lists all YssSlide models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new YssSlideSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single YssSlide model.
     * @param integer $id
     * @param string $slide_name
     * @return mixed
     */
    public function actionView($id, $slide_name)
    {
        return $this->render('view', [
            'model' => $this->findModel($id, $slide_name),
        ]);
    }

    /**
     * Creates a new YssSlide model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new YssSlide();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'slide_name' => $model->slide_name]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing YssSlide model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @param string $slide_name
     * @return mixed
     */
    public function actionUpdate($id, $slide_name)
    {
        $model = $this->findModel($id, $slide_name);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'slide_name' => $model->slide_name]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing YssSlide model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @param string $slide_name
     * @return mixed
     */
    public function actionDelete($id, $slide_name)
    {
        $this->findModel($id, $slide_name)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the YssSlide model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @param string $slide_name
     * @return YssSlide the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id, $slide_name)
    {
        if (($model = YssSlide::findOne(['id' => $id, 'slide_name' => $slide_name])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
