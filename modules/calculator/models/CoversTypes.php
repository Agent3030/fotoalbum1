<?php

namespace app\modules\calculator\models;

use Yii;

/**
 * This is the model class for table "covers_types".
 *
 * @property integer $id
 * @property string $cover_type
 */
class CoversTypes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'covers_types';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cover_type'], 'required'],
            [['cover_type'], 'string', 'max' => 255]
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
        ];
    }
    
    public static function getCovers() {
        return static::find()
            ->all();
    }
}
