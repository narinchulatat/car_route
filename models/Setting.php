<?php

namespace app\models;

use Yii;
use \yii\web\UploadedFile;

/**
 * This is the model class for table "setting".
 *
 * @property int $id
 * @property string $company
 * @property string $linenotify
 * @property string $photo
 * @property string $note1
 */
class Setting extends \yii\db\ActiveRecord {

     public $upload_foler = 'uploads';
    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'setting';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
        [['company', 'linenotify',  'note1'], 'string', 'max' => 255],
        [['photo'], 'file',
                'skipOnEmpty' => true,
                'extensions' => 'png,jpg'
            ]
        ];
    }

    public function upload($model, $attribute) {
        $photo = UploadedFile::getInstance($model, $attribute);
        $path = $this->getUploadPath();
        if ($this->validate() && $photo !== null) {

            $fileName ='logo.' . $photo->extension;
            //$fileName = $photo->baseName . '.' . $photo->extension;
            if ($photo->saveAs($path . $fileName)) {
                return $fileName;
            }
        }
        return $model->isNewRecord ? false : $model->getOldAttribute($attribute);
    }

    public function getUploadPath() {
        return Yii::getAlias('@webroot') . '/' . $this->upload_foler . '/';
    }

    public function getUploadUrl() {
        return Yii::getAlias('@web') . '/' . $this->upload_foler . '/';
    }

    public function getPhotoViewer() {
        return empty($this->photo) ? Yii::getAlias('@web') . '/img/none.png' : $this->getUploadUrl() . $this->photo;
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'company' => 'Company',
            'linenotify' => 'Linenotify',
            'photo' => 'Logo',
            'note1' => 'Note1',
        ];
    }

}
