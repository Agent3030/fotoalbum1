<?php

namespace app\modules\calculator\models;

use Yii;

/**
 * This is the model class for table "kits".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $image_path
 */
class Kits extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'kits';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'description', 'image_path'], 'required'],
            [['description'], 'string'],
            [['name', 'image_path'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
            'image_path' => 'Image Path',
        ];
    }
   
}
