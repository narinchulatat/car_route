<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "car".
 *
 * @property int $car_id
 * @property string $car_name ยี่ห้อรถ
 * @property string $car_size ขนาด
 * @property string $car_seate จำนวนที่นั่ง
 * @property string $car_description รายละเอียด
 * @property string $car_img รูปรถยนต์
 */
class Car extends \yii\db\ActiveRecord
{
    public $upload_foler = 'uploads/car/img';
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'car';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['car_name'], 'required'],
            [['car_description'], 'string'],
            [['car_name'], 'string', 'max' => 255],
            [['car_size', 'car_seate'], 'string', 'max' => 20],
            [['car_img'], 'string', 'max' => 150],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'car_id' => 'Car ID',
            'car_name' => 'ยี่ห้อรถ',
            'car_size' => 'ทะเบียน',
            'car_seate' => 'จำนวนที่นั่ง',
            'car_description' => 'รายละเอียด',
            'car_img' => 'รูปรถยนต์',
        ];
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
        return empty($this->car_img) ? Yii::getAlias('@web') . '/uploads/img/nopicture.jpg' : $this->getUploadUrl() . $this->car_img;
    }

    public function getUserViewer()
    {
        return empty($this->car_img) ? Yii::getAlias('@web') . '/uploads/img/nopicture.jpg' : $this->getUploadUrl() . $this->car_img;
    }
}
