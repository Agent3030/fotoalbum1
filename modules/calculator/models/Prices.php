<?php

namespace app\modules\calculator\models;

use Yii;

/**
 * This is the model class for table "prices".
 *
 * @property integer $id
 * @property integer $kits_id
 * @property string $size
 * @property string $type
 * @property double $price
 * @property double $price_pp
 */
class Prices extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'prices';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kits_id', 'size', 'type', 'price', 'price_pp'], 'required'],
            [['kits_id'], 'integer'],
            [['price', 'price_pp'], 'number'],
            [['size', 'type'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'kits_id' => 'Kits ID',
            'size' => 'Size',
            'type' => 'Type',
            'price' => 'Price',
            'price_pp' => 'Price Pp',
        ];
    }
    
    
    public static function getPriceByKit($kit) {
        return static::find()->where([
                'kits_id'=> $kit
                ])->all();
    }
    
   
}
