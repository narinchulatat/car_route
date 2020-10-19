<?php

namespace app\controllers;

use Yii;
use yii\helpers\Url;
use app\models\Rental;
use app\models\RentalSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\filters\AccessControl;

/**
 * RentalController implements the CRUD actions for Rental model.
 */
class RentalController extends Controller
{
    /**
     * {@inheritdoc}
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
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'admin', 'view', 'create', 'update', 'delete'],
                'rules' => [
                    [
                        'actions' => ['admin', 'create', 'update', 'delete'],
                        'allow' => true,
                        'roles' => ['@']
                    ],
                    [
                        'actions' => ['index', 'view'],
                        'allow' => true,
                        'roles' => ['?', '@']
                    ]
                ]
            ]
        ];
    }

    /**
     * Lists all Rental models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RentalSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Rental model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Displays a single Rental model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionViewcalendar($id)
    {
        return $this->renderAjax('viewcalendar', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Rental model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Rental();
        $connection = Yii::$app->db;

        // $car_name = '';
        // $dept = '';

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->file = $model->uploadFiles($model, 'file'); //upload file
            $model->car_status = 1;
            $model->car_cur_date = date('Y-m-d');
            $model->save();

            // $r = $_POST['Meetting'];

            // $car_name = $r['car_name'];
            // $dept = $r['dept'];

            // $command3 = Yii::$app->db->createCommand("SELECT car_name FROM car WHERE car_id='$car_name'");
            // $car_name = $command3->queryScalar();
            // $command3 = Yii::$app->db->createCommand("SELECT department_name FROM departments WHERE departments_id = '$dept'");
            // $dept = $command3->queryScalar();

            // echo $model->getDept ($model->departments_id);
            // echo $model->getCar ($model->car_room);
            // exit();

            //------------- begin notify --------------


            $command4 = Yii::$app->db->createCommand("SELECT linenotify FROM setting WHERE id='2' ");
            $linetoken = $command4->queryScalar();

            // $linetoken = 'OrfqBOdgPclRPaNc6OooBFARBXW6of99fgLPN80D1Jg';
            if ($linetoken <> '') {

                define('LINE_API', "https://notify-api.line.me/api/notify");
                define('LINE_TOKEN', $linetoken);
                $getip = Yii::$app->getRequest()->getUserIP();

                function notify_message($message)
                {

                    $queryData = array('message' => $message);
                    $queryData = http_build_query($queryData, '', '&');
                    $headerOptions = array(
                        'http' => array(
                            'method' => 'POST',
                            'header' => "Content-Type: application/x-www-form-urlencoded\r\n"
                                . "Authorization: Bearer " . LINE_TOKEN . "\r\n"
                                . "Content-Length: " . strlen($queryData) . "\r\n",
                            'content' => $queryData
                        ),
                        "ssl" => array(
                            "verify_peer" => false,
                            "verify_peer_name" => false,
                        ),
                    );

                    $context = stream_context_create($headerOptions);
                    $result = file_get_contents(LINE_API, FALSE, $context);
                    $res = json_decode($result);
                }

                $res = notify_message('รถยนต์: ' . $model->getCar($model->car_room) . ' แผนก: ' . $model->getDept($model->departments_id) . ' ประชุมเรื่อง: ' . $model->car_title . ' วันเวลาไป: ' . $model->car_start . ' วันเวลากลับ: ' . $model->car_end . ' จำนวนผู้โดยสาร: ' . $model->car_seate);
            }
            //------------- end notify --------------

            return $this->redirect(['view', 'id' => $model->car_id]);
        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Rental model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->file = $model->uploadFiles($model, 'file'); //
            $model->save();
            $command4 = Yii::$app->db->createCommand("SELECT linenotify FROM setting WHERE id='2' ");
            $linetoken = $command4->queryScalar();

            // $linetoken = 'OrfqBOdgPclRPaNc6OooBFARBXW6of99fgLPN80D1Jg';
            if ($linetoken <> '') {

                define('LINE_API', "https://notify-api.line.me/api/notify");
                define('LINE_TOKEN', $linetoken);
                $getip = Yii::$app->getRequest()->getUserIP();

                function notify_message($message)
                {

                    $queryData = array('message' => $message);
                    $queryData = http_build_query($queryData, '', '&');
                    $headerOptions = array(
                        'http' => array(
                            'method' => 'POST',
                            'header' => "Content-Type: application/x-www-form-urlencoded\r\n"
                                . "Authorization: Bearer " . LINE_TOKEN . "\r\n"
                                . "Content-Length: " . strlen($queryData) . "\r\n",
                            'content' => $queryData
                        ),
                        "ssl" => array(
                            "verify_peer" => false,
                            "verify_peer_name" => false,
                        ),
                    );

                    $context = stream_context_create($headerOptions);
                    $result = file_get_contents(LINE_API, FALSE, $context);
                    $res = json_decode($result);
                }

                $res = notify_message('**แก้ไขตารางเดินรถ' . 'รถยนต์: ' . $model->getCar($model->car_room) . ' แผนก: ' . $model->getDept($model->departments_id) . ' ประชุมเรื่อง: ' . $model->car_title . ' วันเวลาไป: ' . $model->car_start . ' วันเวลากลับ: ' . $model->car_end . ' จำนวนผู้โดยสาร: ' . $model->car_seate);
            }
            //------------- end notify --------------
            // $model->notifyLine($id); // ส่งไลน์ตามกลุ่มต่างๆ
            return $this->redirect(['view', 'id' => $model->car_id]);
        }
        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Rental model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Rental model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Rental the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Rental::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionCalendar()
    {
        $searchModel = new RentalSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $events = [];
        $lists = Rental::find()->all();
        foreach ($lists as $list) {
            $event = new \yii2fullcalendar\models\Event();
            $event->id = $list->car_id;
            // $event->url = Url::to(['rental/view', 'id' => $list->car_id]);  // ทำ link view
            $event->title = $list->carRoom->car_name . ' ชื่อคนขับ : ' . $list->car_user . ' สถานะ : ' . $list->car_title;  // ชื่อบน Lable
            $event->color = $list->carStatus->car_statust_color; // สีพื้นหลังตามสถานะ
            $event->start = $list->car_start; // วันเริ่ม
            $event->end = $list->car_end; // วันสิ้นสุด
            $events[] = $event;
        }
        return $this->render('calendar', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'events' => $events
        ]);
    }

    // upload file
    public function uploadFiles($model, $attribute)
    {
        $file = UploadedFile::getInstance($model, $attribute);
        $path = $this->getUploadFilePath();
        if ($this->validate() && $file !== null) {

            $filesName = md5($file->baseName . time()) . '.' . $file->extension;
            if ($file->saveAs($path . $filesName)) {
                return $filesName;
            }
        }
        return $model->isNewRecord ? false : $model->getOldAttribute($attribute);
    }

    public function getUploadFilePath()
    {
        return Yii::getAlias('@webroot') . '/' . $this->upload_foler_file . '/';
    }

    public function getUploadFileUrl()
    {
        return Yii::getAlias('@web') . '/' . $this->upload_foler_file . '/';
    }

    public function getFileViewer()
    {
        return empty($this->file) ? Yii::getAlias('@web') . '/uploads/img/nofile.png' : $this->getUploadFileUrl() . $this->file;
    }
}
