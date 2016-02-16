<?php

namespace app\modules\calculator\controllers;

use app\modules\calculator\models\Kits;
use app\modules\calculator\models\SizeImg;
use app\modules\calculator\models\Prices;
use app\modules\calculator\models\LamTypes;
use app\modules\calculator\models\Covers;
use app\modules\calculator\models\CoversTypes;
use app\modules\calculator\models\CoversImg;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;

class DefaultController extends Controller
   
{    const KIT_BY_DEFAULT = 1;
     const SIZE_BY_DEFAULT= '20X37';
     const COVER_BY_DEFAULT= 'Кожа';
     const COVER_MODEL_BY_DEFAULT ='AHENK';

    public $layout = 'calc'; 
    public function actionIndex()
    {
        
        $kits = Kits::find()->all();
        
        $prices = Prices::getPriceByKit(self::KIT_BY_DEFAULT);
        
        $covers = CoversTypes::getCovers();
        
        $coverModels = Covers::getModelsByCoverAndSize(self::COVER_BY_DEFAULT, self::SIZE_BY_DEFAULT);
        
        $coverModelsImgs = CoversImg::getImgsByCoverAndCoverModel(self::COVER_BY_DEFAULT, self:: COVER_MODEL_BY_DEFAULT);
                
        $startImage = SizeImg::getImgBySize(self::SIZE_BY_DEFAULT)->image_path;
        
        $types = LamTypes::getTypesBySize(self::SIZE_BY_DEFAULT); 
        
        return $this->render('index',['kits'=>$kits, 
                                            'types' => $types,
                                            'startImage'=>$startImage,
                                            'startSize'=>  self::SIZE_BY_DEFAULT,
                                            'covers'=> $covers,
                                            'coverModels'=>$coverModels,
                                            'coverModelsImgs'=>$coverModelsImgs
                                            
                                              ]);
        
    }
    
   /* public function actionStep2()
    {
        
        
        $sizes = SizeImg::getAll();
        
        $startSize = SizeImg::getInitialSize()->size;
        
        $startImage = SizeImg::getInitialSize()->image_path;
        $types = Prices::getTypeByKitAndSize(1,$startSize);    
        return $this->renderAjax('index',['sizes'=>$sizes, 
                                            'types'=>$types,
                                            'startImage'=>$startImage,
                                            'startSize'=>$startSize,
                                           
                ]);
            
      }*/
     public function actionSelectPrice()
    {
       
        if (Yii::$app->request->isAjax) {
            if(Yii::$app->request->isPost){
                  $kitname = Yii::$app->request->post('kit');
                  $kit = (int) substr($kitname, -1);
                 
                  $prices = Prices::getPriceByKit($kit);
                  
                  
                  
                  return $this->renderAjax('_select-size',
                                    ['prices'=>$prices,
                                     
                                    ]);
              }
        
         
      }
    }
     public function actionSelectSize()
    {
       
         if (Yii::$app->request->isAjax) {
            if(Yii::$app->request->isPost){
                  $size = Yii::$app->request->post('size');
                  
                  $types = LamTypes::getTypesBySize($size);
                  
                  
                  
                  return $this->renderAjax('_select-types',
                                    ['types'=>$types,
                                     
                                    ]);
              }
        
         
      }
    }
    public function actionSelectCover()
    {
       
         if (Yii::$app->request->isAjax) {
            if(Yii::$app->request->isPost){
                 
                  
                  $covers = CoversTypes::getCovers();
                  
                  
                  
                  return $this->renderAjax('_select-covers',
                                    ['covers'=>$covers,
                                     
                                    ]);
              }
        
         
      }
    }
     public function actionSelectCoverModel()
    {
       
         if (Yii::$app->request->isAjax) {
            if(Yii::$app->request->isPost){
                 
                  $cover = Yii::$app->request->post('cover');
                  $size = Yii::$app->request->post('size');
                  $models = Covers::getModelsByCoverAndSize($cover, $size);
                  return $this->renderAjax('_select-cover-model',
                                    ['models'=>$models,
                                     
                                    ]);
              }
        
         
      }
    }
    
    public function actionSelectCoverModelImg()
    {
       
         if (Yii::$app->request->isAjax) {
            if(Yii::$app->request->isPost){
                 
                  $cover = Yii::$app->request->post('cover');
                  $coverModel = Yii::$app->request->post('cover_model');
                  $coverModelsImgs = CoversImg::getImgsByCoverAndCoverModel($cover, $coverModel);
                  return $this->renderAjax('_select-cover-model-images',
                                    ['coverModelsImgs'=>$coverModelsImgs,
                                     
                                    ]);
              }
        
         
      }
    }
    public function actionGetPriceAjax()
    {
       
        if (Yii::$app->request->isAjax) {
            if(Yii::$app->request->isPost){
                  $size = Yii::$app->request->post('size'); 
                  $lamType = Yii::$app->request->post('type');
                  
                  $response = Yii::$app->response;
                 
                  $response->format = \yii\web\Response::FORMAT_JSON;
                  $price = Prices::getPriceByType(1, $size, $lamType);
                  return $price;
              }
        
         
      }
    }
}
