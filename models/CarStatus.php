<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "car_status".
 *
 * @property int $car_status_id
 * @property string $car_status_name สถานะการจอง
 * @property string $car_statust_color สี
 *
 * @property Car[] $Cars
 */
class CarStatus extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'car_status';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['car_status_name'], 'required'],
            [['car_status_name'], 'string', 'max' => 150],
            [['car_statust_color'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'car_status_id' => 'Car Status ID',
            'car_status_name' => 'สถานะ',
            'car_statust_color' => 'สี',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCars()
    {
        return $this->hasMany(Car::className(), ['car_status' => 'car_status_id']);
    }
}
