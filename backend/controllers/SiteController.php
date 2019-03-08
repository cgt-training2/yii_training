<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use backend\models\LoginForm;
use app\models\BranchSearch;
use app\models\CompanySearch;
use app\models\DepartmentSearch;
use backend\models\UserSearch;
/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public $flash;
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
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
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $branchModel = new BranchSearch();
        $brachCount = $branchModel->count();
        $companyModel = new CompanySearch();
        $companyCount = $companyModel->count();
        $departmentModel = new DepartmentSearch();
        $departmentCount = $departmentModel->count();
        $userModel = new UserSearch();
        $userCount = $userModel->count();

        return $this->render('index', [
                'brachCount' => $brachCount,
                'companyCount' => $companyCount,
                'departmentCount' => $departmentCount,
                'userCount' => $userCount,
            ]);
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {   
        $this->layout = 'LoginLayout';
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $flash=0;
        
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post())) {
            if($model->login()){
                return $this->goBack();
            }
            else {
                $flash=1;
                Yii::$app->getSession()->setFlash('error', 'You are not Authorized');
                return $this->render('login', [
                    'model' => $model,
                    'flash' => $flash,
                ]);
            }
        }else{

            return $this->render('login', [
                    'model' => $model,
                    'flash' => $flash,
                ]);
        }
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();
        $flash=0;
        //return $this->goHome();
        return $this->redirect('login');
    }
}
