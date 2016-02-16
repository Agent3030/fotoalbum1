<?php

namespace app\modules\main\models;
use yii\behaviors\TimestampBehavior;


use Yii;

/**
 * This is the model class for table "news".
 *
 * @property integer $id
 * @property integer $created_at
 * @property string $title
 * @property string $short_content
 * @property string $content
 * @property integer $tag_id
 * @property string $author
 * @property integer $status
 */
class News extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
            
        ];
    }
    public static function tableName()
    {
        return 'news';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created_at', 'title', 'short_content', 'author'], 'required'],
            [['created_at', 'tag_id', 'status'], 'integer'],
            [['content'], 'string'],
            [['title', 'short_content', 'author'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'created_at' => 'Создано',
            'title' => 'Заголовок',
            'short_content' => 'Краткое описание',
            'content' => 'Описание',
            'tag_id' => 'Тєг №',
            'author' => 'Автор',
            'status' => 'Статус',
        ];
    }
}
