<?php

namespace backend\controllers;

use Yii;
use backend\models\AuthItem;
use backend\models\AuthItemSearch;
use backend\models\AuthItemChild;
use backend\models\Model;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AuthItemController implements the CRUD actions for AuthItem model.
 */
class UserroleController extends Controller
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
     * Lists all AuthItem models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AuthItemSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single AuthItem model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new AuthItem model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new AuthItem();
        $authItems = AuthItem::find()->where(['type' => '2'])->all();
        $authitemchilds = new AuthItemChild();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {

           $data = Yii::$app->request->post();
           foreach ($data['AuthItemChild']['child'] as $key => $value) {
               $authitemch = new AuthItemChild();
               $authitemch->parent = $model->name;
               $authitemch->child = $value;
               $authitemch->save();
           }
           return $this->redirect(['view', 'id' => $model->name]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'authItems' => $authItems,
                'authitemchilds' => $authitemchilds,
            ]);
        }
    }

    /**
     * Updates an existing AuthItem model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $authItems = AuthItem::find()->where(['type' => '2'])->all();
        $authitemchilds = new AuthItemChild();
        $lsit = AuthItemChild::find()->where(['parent' => $model->name])->all();
        
        foreach ($lsit as $key => $value) {
            $listper[]=$value->child;
        }
        //print_r($listper);

        $authitemchilds->child = $listper;
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
           $data = Yii::$app->request->post();
           AuthItemChild::deleteAll(['parent' => $model->name]);
           foreach ($data['AuthItemChild']['child'] as $key => $value) {
               $authitemch = new AuthItemChild();
               $authitemch->parent = $model->name;
               $authitemch->child = $value;
               $authitemch->save();
           }
            return $this->redirect(['view', 'id' => $model->name]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'authItems' => $authItems,
                'authitemchilds' => $authitemchilds,
            ]);
        }
    }

    /**
     * Deletes an existing AuthItem model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the AuthItem model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return AuthItem the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AuthItem::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
