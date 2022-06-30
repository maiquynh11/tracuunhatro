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
use app\models\NhatroDmdoituong;
use app\models\FilterBoxForm;
use app\models\Nhatro;
use app\models\Binhluan;
use app\models\Dmdoituong;
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
        $listNewPost = Nhatro::find()->where('status=1')->orderBy([
            'updated_at' => SORT_DESC,
        ])->all();
        $homeSearchForm = new HomeSearchForm();
        $filterBoxForm = new FilterBoxForm();
        $queryNhatro = Nhatro::find()->where('status=1');
        $listDmgia = Dmgia::find()->all();
        $listDmtienich = Dmtienich::find()->all();
        $listDmdoituong = Dmdoituong::find()->all();
        $listDmkhuvuc = Dmkhuvuc::find()->all();
        $listDmdientich = Dmdientich::find()->all();
        $homeSearchForm->load(Yii::$app->request->get());
        $listDoituongId = Yii::$app->request->get('listDoituongId');
        if ($listDoituongId && is_array($listDoituongId)) {
            $listNhatroIdHaveDoituong = NhatroDmdoituong::find()->where(['in', 'doituong_id', $listDoituongId])->select('nhatro_id')->column();
            $queryNhatro->andWhere(['in', 'id', $listNhatroIdHaveDoituong]);
        }
        if (isset($homeSearchForm->query)) {
            $queryNhatro->orWhere(['ilike', 'tieude', $homeSearchForm->query])->orWhere(['ilike', 'gia', $homeSearchForm->query])->orWhere(['ilike', 'diachi', $homeSearchForm->query]);
        }
        if (Yii::$app->request->isPost && !Yii::$app->user->isGuest) {
            $queryNhatro->user_id = Yii::$app->user->id;
        }
        $listNhatro = $queryNhatro->all();
        return $this->render('index', compact("homeSearchForm", "listNewPost", "filterBoxForm", "listDmgia", "listDmdientich", "listDmkhuvuc", "listNhatro", "listDmdoituong", "listDmtienich"));
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
    // public function actionShow()
    // {
    //     return $this->render('show');
    // }
}