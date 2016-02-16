<?php

namespace app\modules\calculator\models;

use Yii;

/**
 * This is the model class for table "covers_img".
 *
 * @property integer $id
 * @property string $cover_type
 * @property string $cover_model
 * @property string $cover_model_name
 * @property string $cover_img
 */
class CoversImg extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'covers_img';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['cover_type'], 'string', 'max' => 16],
            [['cover_model'], 'string', 'max' => 11],
            [['cover_model_name'], 'string', 'max' => 14],
            [['cover_img'], 'string', 'max' => 62]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cover_type' => 'Cover Type',
            'cover_model' => 'Cover Model',
            'cover_model_name' => 'Cover Model Name',
            'cover_img' => 'Cover Img',
        ];
    }
    
    public static function getImgsByCoverAndCoverModel($cover,$coverModel) {
        return static::find()->where([
                'cover_model'=> $coverModel,
                'cover_type'=> $cover
                ])->all();
    }
}
