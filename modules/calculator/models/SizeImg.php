<?php

namespace app\modules\calculator\models;

use Yii;

/**
 * This is the model class for table "sizes_img".
 *
 * @property integer $id
 * @property string $size
 * @property string $image_path
 */
class SizeImg extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sizes_img';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['size', 'image_path'], 'required'],
            [['size', 'image_path'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'size' => 'Size',
            'image_path' => 'Image Path',
        ];
    }
     public static function getAll(){
        return static::find()->all();
    }
    public static function getInitialSize(){
        return static::findOne(['id'=>'1']);
    }
    public static function getImgBySize($size){
        return static::findOne(['size'=> $size]);
    }
}
