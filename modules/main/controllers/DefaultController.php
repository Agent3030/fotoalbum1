<?php

namespace app\modules\main\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\modules\main\models\ContactForm;
use app\modules\main\models\News;

class DefaultController extends Controller

{    
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }
    public function actions()
        {
            return [
                'error' => [
                    'class' => 'yii\web\ErrorAction',
                ],
            ];
        }
    
    public function actionIndex()
    {
        return $this->render('index');
    }
    public function actionAjaxNews()
    {
        if (Yii::$app->request->isAjax) {
        $model = News::find()->where(['status' => '1'])
            ->orderBy(['id' => SORT_DESC])->limit(5)->all();
        return $this->renderPartial('_news', [
            'model'=>$model,
        ]);
       
      }
    }
    
    

    public function actionAbout()
    {
        return $this->render('about');
    }
}
