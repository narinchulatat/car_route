<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "person_status".
 *
 * @property int $person_status_id
 * @property string $person_status_name สถานะ
 * @property string $person_statust_color สี
 *
 * @property Person[] $people
 */
class PersonStatus extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'person_status';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['person_status_name'], 'required'],
            [['person_status_name'], 'string', 'max' => 150],
            [['person_statust_color'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'person_status_id' => 'Person Status ID',
            'person_status_name' => 'สถานะ',
            'person_statust_color' => 'สี',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPeople()
    {
        return $this->hasMany(Person::className(), ['person_status' => 'person_status_id']);
    }
}
