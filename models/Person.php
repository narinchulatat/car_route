<?php

namespace app\models;

use yii\web\UploadedFile;

use Yii;

/**
 * This is the model class for table "person".
 *
 * @property int $user_id
 * @property string $user_img รูป พขร.
 * @property string $person_name ชื่อ,สกุล
 * @property string $tel เบอร์โทร
 * @property string $code วิทยุสื่อสาร
 * @property string $queue คิว REFER
 * @property int $person_status สถานะ
 * @property string $start เวลาไป
 * @property string $end เวลากลับ
 *
 * @property PersonStatus $personStatus
 */
class Person extends \yii\db\ActiveRecord
{
    public $upload_foler = 'uploads/person/img';
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'person';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['queue'], 'string'],
            [['person_status'], 'integer'],
            [['start', 'end'], 'safe'],
            [['user_img'], 'string', 'max' => 150],
            [['person_name', 'tel'], 'string', 'max' => 255],
            [['code'], 'string', 'max' => 50],
            [['person_status'], 'exist', 'skipOnError' => true, 'targetClass' => PersonStatus::className(), 'targetAttribute' => ['person_status' => 'person_status_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'user_img' => 'รูป พขร.',
            'person_name' => 'ชื่อ,สกุล',
            'tel' => 'เบอร์โทร',
            'code' => 'วิทยุสื่อสาร',
            'queue' => 'คิว REFER',
            'person_status' => 'สถานะ',
            'start' => 'เวลาไป',
            'end' => 'เวลากลับ',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersonStatus()
    {
        return $this->hasOne(PersonStatus::className(), ['person_status_id' => 'person_status']);
    }

    public function upload($model, $attribute)
    {
        $photo = UploadedFile::getInstance($model, $attribute);
        $path = $this->getUploadPath();
        if ($this->validate() && $photo !== null) {

            $fileName = md5($photo->baseName . time()) . '.' . $photo->extension;
            if ($photo->saveAs($path . $fileName)) {
                return $fileName;
            }
        }
        return $model->isNewRecord ? false : $model->getOldAttribute($attribute);
    }

    public function getUploadPath()
    {
        return Yii::getAlias('@webroot') . '/' . $this->upload_foler . '/';
    }

    public function getUploadUrl()
    {
        return Yii::getAlias('@web') . '/' . $this->upload_foler . '/';
    }

    public function getPhotoViewer()
    {
        return empty($this->user_img) ? Yii::getAlias('@web') . '/uploads/img/nopicture.jpg' : $this->getUploadUrl() . $this->user_img;
    }

    public function getUserViewer()
    {
        return empty($this->user_img) ? Yii::getAlias('@web') . '/uploads/img/nopicture.jpg' : $this->getUploadUrl() . $this->user_img;
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
            $date_t = News::dateThai($date['0']);

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
