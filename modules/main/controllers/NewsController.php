<?php

namespace app\modules\main\controllers;
use yii\data\ActiveDataProvider;
use app\modules\main\models\News;

class NewsController extends \yii\web\Controller
{
    public $layout = 'main-old.php';
    public function actionIndex()
    {
        
        $query = News::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $model = News::findAll(['status'=>1]);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    
    }

}
