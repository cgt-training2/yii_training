<?php

namespace backend\controllers;

use Yii;
use app\models\Department;
use app\models\DepartmentSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Branch;
use yii\web\ForbiddenHttpException;

/**
 * DepartmentController implements the CRUD actions for Department model.
 */
class DepartmentController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Department models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DepartmentSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Department model.
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
     * Creates a new Department model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if(Yii::$app->user->can('create_department')){
            $model = new Department();

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->department_id]);
            } else {
                return $this->render('create', [
                    'model' => $model,
                ]);
            }    
        }else{
            //throw new ForbiddenHttpException;
            Yii::$app->session->setFlash('danger', 'You are not authorized!');
            return $this->redirect(['index']);
        }
        
    }

    /**
     * Updates an existing Department model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        if(Yii::$app->user->can('update_department')){
            $model = $this->findModel($id);

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->department_id]);
            } else {
                return $this->render('update', [
                    'model' => $model,
                ]);
            }
        }else{
            //throw new ForbiddenHttpException;
            Yii::$app->session->setFlash('danger', 'You are not authorized!');
            return $this->redirect(['index']);
        }
    }

    /**
     * Deletes an existing Department model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        if(Yii::$app->user->can('delete_department')){
            $this->findModel($id)->delete();

            return $this->redirect(['index']);
        }else{
            //throw new ForbiddenHttpException;
            Yii::$app->session->setFlash('danger', 'You are not authorized!');
            return $this->redirect(['index']);
        }
    }

    /**
     * Finds the Department model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Department the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Department::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    public function actionListsbranch($id){
       $lists = branch::find()
                ->where(['company_fk_id' => $id])
                ->orderBy('branch_id DESC')
                ->all();
        echo "<option value=''></option>";
        foreach($lists as $list){
            echo "<option value='".$list->branch_id."'>".$list->branch_name."</option>";
        }
    }

}
