<?php

namespace backend\controllers;

use Yii;
use app\models\Company;
use app\models\CompanySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\ForbiddenHttpException;

/**
 * CompanyController implements the CRUD actions for Company model.
 */
class CompanyController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors() {

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
     * Lists all Company models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new CompanySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionSearchaj() {

        $searchModel = new CompanySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->renderPartial('_searchaj', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);        
    }

    /**
     * Displays a single Company model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {

        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Company model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {

        if(Yii::$app->user->can('create_company')){
            $model = new Company();

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->Company_id]);
            } else {
                return $this->render('create', [
                    'model' => $model,
                ]);
            }    
        } else{
            //throw new ForbiddenHttpException;
            Yii::$app->session->setFlash('danger', 'You are not authorized!');
            return $this->redirect(['index']);
        }
        
    }

    /**
     * Updates an existing Company model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {

        if(Yii::$app->user->can('update_company')){
            $model = $this->findModel($id);

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->Company_id]);
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
     * Deletes an existing Company model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id){

        if(Yii::$app->user->can('delete_company')){

            $this->findModel($id)->delete();
            return $this->redirect(['index']);

        } else{
            
            //throw new ForbiddenHttpException;
            Yii::$app->session->setFlash('danger', 'You are not authorized!');
            return $this->redirect(['index']);
        }
    }

    /**
     * Finds the Company model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Company the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id){

        if (($model = Company::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
