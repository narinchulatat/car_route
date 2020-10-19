<?php

namespace app\models;

use yii\web\UploadedFile;

use Yii;

/**
 * This is the model class for table "rental".
 *
 * @property int $car_id
 * @property int $car_room รถยนต์
 * @property string $car_start
 * @property string $car_end
 * @property int $car_usefor ลักษณะการใช้งาน
 * @property int $departments_id หน่วยงานที่ขอ
 * @property string $car_user ชื่อผู้จอง
 * @property string $car_tel เบอร์ติดต่อ
 * @property string $car_title หัวข้อ
 * @property string $car_description รายละเอียด
 * @property int $car_seate จำนวนผู้เข้าร่วม
 * @property string $car_cur_date วันที่บันทึก
 * @property string $file ไฟล์เอกสาร
 * @property int $car_status สถานะ
 *
 * @property CarStatus $carStatus
 * @property Departments $departments
 * @property Car $carRoom
 * @property Usefor $carUsefor
 */
class Rental extends \yii\db\ActiveRecord
{
    public $upload_foler_file = 'uploads/car/pdf';
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'rental';
    }

    /**
     * {@inheritdoc}
     */
    // public function rules()
    // {
    //     return [
    //         [['car_room', 'car_usefor', 'departments_id', 'car_user', 'car_title'], 'required'],
    //         [['car_room', 'car_usefor', 'departments_id', 'car_seate', 'car_status'], 'integer'],
    //         [['car_description'], 'string'],
    //         [['car_start', 'car_end', 'car_tel', 'car_cur_date'], 'string', 'max' => 45],
    //         [['car_user'], 'string', 'max' => 150],
    //         [
    //             ['file'], 'file',
    //             'skipOnEmpty' => true,
    //             'extensions' => 'pdf'
    //         ],
    //         [['car_title'], 'string', 'max' => 255],
    //         [['car_status'], 'exist', 'skipOnError' => true, 'targetClass' => CarStatus::className(), 'targetAttribute' => ['car_status' => 'car_status_id']],
    //         [['departments_id'], 'exist', 'skipOnError' => true, 'targetClass' => Departments::className(), 'targetAttribute' => ['departments_id' => 'departments_id']],
    //         [['car_room'], 'exist', 'skipOnError' => true, 'targetClass' => Car::className(), 'targetAttribute' => ['car_room' => 'car_id']],
    //         [['car_usefor'], 'exist', 'skipOnError' => true, 'targetClass' => Usefor::className(), 'targetAttribute' => ['car_usefor' => 'usefor_id']],
    //     ];
    // }

    public function rules()
    {
        return [
            [['car_room', 'car_usefor', 'departments_id', 'car_user', 'car_title'], 'required'],
            [['car_room', 'car_usefor', 'departments_id', 'car_user', 'car_seate', 'car_status'], 'integer'],
            [['car_start', 'car_end'], 'safe'],
            [['car_description'], 'string'],
            [['car_tel', 'car_cur_date'], 'string', 'max' => 45],
            [['car_title'], 'string', 'max' => 255],
            // [['file'], 'string', 'max' => 150],
            [
                ['file'], 'file',
                'skipOnEmpty' => true,
                'extensions' => 'pdf'
            ],
            [['car_status'], 'exist', 'skipOnError' => true, 'targetClass' => CarStatus::className(), 'targetAttribute' => ['car_status' => 'car_status_id']],
            [['departments_id'], 'exist', 'skipOnError' => true, 'targetClass' => Departments::className(), 'targetAttribute' => ['departments_id' => 'departments_id']],
            [['car_room'], 'exist', 'skipOnError' => true, 'targetClass' => Car::className(), 'targetAttribute' => ['car_room' => 'car_id']],
            [['car_usefor'], 'exist', 'skipOnError' => true, 'targetClass' => Usefor::className(), 'targetAttribute' => ['car_usefor' => 'usefor_id']],
            [['car_user'], 'exist', 'skipOnError' => true, 'targetClass' => Person::className(), 'targetAttribute' => ['car_user' => 'user_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'car_id' => 'Car ID',
            'car_room' => 'รถยนต์',
            'car_start' => 'วันที่/เวลา ไป',
            'car_end' => 'วันที่/เวลา กลับ',
            'car_usefor' => 'ลักษณะการใช้งาน',
            'departments_id' => 'หน่วยงานที่ขอ',
            'car_user' => 'ชื่อผู้ขับรถ',
            'car_tel' => 'เบอร์ติดต่อ',
            'car_title' => 'หัวข้อ',
            'car_description' => 'รายละเอียด',
            'car_seate' => 'จำนวนผู้โดยสาร',
            'car_cur_date' => 'วันที่บันทึก',
            'file' => 'ไฟล์เอกสาร',
            'car_status' => 'สถานะ',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCarStatus()
    {
        return $this->hasOne(CarStatus::className(), ['car_status_id' => 'car_status']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDepartments()
    {
        return $this->hasOne(Departments::className(), ['departments_id' => 'departments_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCarRoom()
    {
        return $this->hasOne(Car::className(), ['car_id' => 'car_room']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCarUsefor()
    {
        return $this->hasOne(Usefor::className(), ['usefor_id' => 'car_usefor']);
    }


    public function getDept($id){
        $m = Departments::find()->where(['departments_id'=>$id])->one();
        return $m['department_name'];
      }

      public function getCar($id){
        $m = Car::find()->where(['car_id'=>$id])->one();
        return $m['car_name'];
      }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCarUser()
    {
        return $this->hasOne(Person::className(), ['user_id' => 'car_user']);
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

    public static function dateThai($date)
    {

        if (!empty($date)) {

            $get_date = explode("-", $date);

            $month =  ["มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฏาคม", "สิงหาคม", "กันยนยน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม"];

            if ($get_date["1"] != "00") {

                $get_month = $get_date["1"] - 1;

                $get_year = $get_date["0"] + 543;

                return $get_date["2"] . " " . $month[$get_month] . " " . $get_year;
            }
        }
        return false;
    }

    public static function getDateTime($get_date = null)
    {

        if (!empty($get_date)) {

            $date = explode(" ", $get_date);
            $date_t = Rental::dateThai($date['0']);

            return $date_t . "  เวลา  " . substr($date['1'], 0, -3) . " น.";
        }
    }

    public static function dateShortThai($date)
    {

        if (!empty($date)) {

            $get_date = explode("-", $date);

            $month =  ["ม.ค.", "ก.พ.", "มี.ค.", "เม.ย.", "พ.ค.", "มิ.ย.", "ก.ค.", "ส.ค.", "ก.ย.", "ต.ค.", "พ.ย.", "ธ.ค."];

            if ($get_date["1"] != "00") {

                $get_month = $get_date["1"] - 1;

                $get_year = $get_date["0"] + 543;

                return $get_date["2"] . " " . $month[$get_month] . " " . substr($get_year, 2);
            }
        } else {
            return false;
        }
    }
}
