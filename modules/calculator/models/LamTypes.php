<?php

namespace app\modules\calculator\models;

use Yii;

/**
 * This is the model class for table "lam_types".
 *
 * @property integer $id
 * @property string $lam_type
 * @property string $size
 * @property integer $price_k
 */
class LamTypes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lam_types';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['lam_type', 'size', 'price_k'], 'required'],
            [['price_k'], 'integer'],
            [['lam_type', 'size'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'lam_type' => 'Lam Type',
            'size' => 'Size',
            'price_k' => 'Price K',
        ];
    }
    public static function getTypesBySize($size) {
        return static::find()->where([
                'size'=> $size
                ])->all();
    }
}
