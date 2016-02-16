<?php

namespace app\modules\calculator\models;

use Yii;

/**
 * This is the model class for table "covers".
 *
 * @property integer $id
 * @property string $cover_size
 * @property string $cover_type
 * @property string $cover_model
 */
class Covers extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'covers';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cover_size', 'cover_type', 'cover_model'], 'required'],
            [['cover_size', 'cover_type', 'cover_model'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cover_size' => 'Cover Size',
            'cover_type' => 'Cover Type',
            'cover_model' => 'Cover Model',
        ];
    }
    
    public static function getModelsByCoverAndSize($cover,$size) {
        return static::find()->where([
                'cover_size'=> $size,
                'cover_type'=> $cover
                ])->all();
    }
    
}
