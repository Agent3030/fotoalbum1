<?php
namespace app\components\widgets;
class NewsBar  extends \yii\base\Widget
{
    public $model;

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        return $this->render('news', ['model' => new $this->model]);
    }
}

