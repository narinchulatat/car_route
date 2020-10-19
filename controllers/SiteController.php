<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Rental;
use app\models\RentalSearch;
use yii\helpers\Url;
use app\models\Person;
use app\models\PersonSearch;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
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
        $searchModel = new RentalSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $searchModel = new PersonSearch();
        $dataProvider2 = $searchModel->search(Yii::$app->request->queryParams);

        $events = [];
        $lists = Rental::find()->all();
        foreach ($lists as $list) {
            $event = new \yii2fullcalendar\models\Event();
            $event->id = $list->car_id;
            // $event->url = Url::to(['rental/view', 'id' => $list->car_id]);  // ทำ link view
            $event->title = $list->carRoom->car_name . ' สถานะ : ' . $list->car_title;  // ชื่อบน Lable
            $event->color = $list->carStatus->car_statust_color; // สีพื้นหลังตามสถานะ
            $event->start = $list->car_start; // วันเริ่ม
            $event->end = $list->car_end; // วันสิ้นสุด
            $events[] = $event;
        }
        // return $this->render('index');
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'dataProvider2' => $dataProvider2,
            'events' => $events
        ]);
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
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


    // public function actionJsoncalendar()
    // {
    //     $searchModel = new RentalSearch();
    //     $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

    //     $events = [];
    //     $lists = Rental::find()->all();
    //     foreach ($lists as $list) {
    //         $event = new \yii2fullcalendar\models\Event();
    //         $event->id = $list->car_id;
    //         $event->url = Url::to(['rental/view', 'id' => $list->car_id]);  // ทำ link view
    //         $event->title = $list->carRoom->car_name . '->' . $list->car_user . '->' . $list->car_title . '->' . $list->car_seate;  // ชื่อบน Lable
    //         $event->color = $list->carStatus->car_statust_color; // สีพื้นหลังตามสถานะ
    //         $event->start = $list->car_start; // วันเริ่ม
    //         $event->end = $list->car_end; // วันสิ้นสุด
    //         $events[] = $event;
    //     }
    //     return $this->render('Jsoncalendar', [
    //         'searchModel' => $searchModel,
    //         'dataProvider' => $dataProvider,
    //         'events' => $events
    //     ]);
    // }


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
