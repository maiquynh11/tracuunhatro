<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\SignupForm;
use app\models\ContactForm;
use app\models\Dmtienich;
use app\models\Dmdientich;
use app\models\Dmgia;
use app\models\Dmkhuvuc;
use app\models\HomeSearchForm;
use app\models\FilterBoxForm;
use app\models\Nhatro;
use app\models\Binhluan;
use yii\data\ActiveDataProvider;
use yii\data\Pagination;

class HomeController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
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
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
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

        $listNewPost = Nhatro::find()->all();
        $homeSearchForm = new HomeSearchForm();
        $filterBoxForm = new FilterBoxForm();
        $queryNhatro = Nhatro::find();
        $listDmgia = Dmgia::find()->all();
        $listDmtienich = Dmtienich::find()->all();
        $listDmkhuvuc = Dmkhuvuc::find()->all();
        $listDmdientich = Dmdientich::find()->all();
        $listBinhluan = new Binhluan();
        $homeSearchForm->load(Yii::$app->request->get());
        if (isset($homeSearchForm->query)) {
            $queryNhatro->orWhere(['ilike', 'tieude', $homeSearchForm->query])->orWhere(['ilike', 'gia', $homeSearchForm->query])->orWhere(['ilike', 'diachi', $homeSearchForm->query]);
        }
        $listNhatro = $queryNhatro->all();

        return $this->render('index', compact("homeSearchForm", "listNewPost", "filterBoxForm", "listDmgia", "listDmtienich", "listDmdientich", "listDmkhuvuc", "listNhatro", "listBinhluan"));
    }
    public function actionShow($id) {
        $listNhatro = Nhatro::find()->where(['dmkhuvuc_id' => $id])->all();
        return $this->render('show', compact("listNhatro"));

    }
    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
            return $this->redirect('login');
        }
        return $this->render('signup', [
            'model' => $model,
        ]);
    }
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($model->login()) {
                return $this->goBack();
            }
        }
        
        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
}