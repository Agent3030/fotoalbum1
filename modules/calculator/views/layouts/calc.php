<?php
/* @var $this \yii\web\View */
/* @var $content string */
use app\components\widgets\Alert;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\bootstrap\ActiveForm;
use yii\widgets\Breadcrumbs;
use app\assets\CalcAsset;


CalcAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <?php $this->registerMetaTag(['name' => 'description','content' => Yii::t('app', 'META_DESCRIPTION')]) ?>
    <?php $this->registerMetaTag(['name'=>'keywords', 'content' => Yii::t('app', 'META_KEYWORDS')]);?>
    <?php $this->registerMetaTag(['name'=>'author', 'content' => Yii::t('app', 'META_AUTHOR')]);?>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?=Yii::$app->name ?></title>
    <link rel="shortcut icon" href="">
    <style>body{padding-top:50px;}.starter-template{padding:40px 15px;text-align:center;}</style>
<?php $this->head() ?>
</head>

<body>
 <?php $this->beginBody() ?>   
     <header class = "calc-header">
    
       
      
           
        <nav class="nav navbar-inverse calc-header" role="navigation">
        <div class="container">
            <div class ="navbar-header">
            
            
               <?= Html::a(Html::img('@web/images/certificate.png'), ['/calculator/default/index'], ['class'=>'navbar-brand']) ?>
            </div> 
        <div class="nav navbar-nav"> 
            <h1>Калькулятор расчета стоимости фотоальбомов EBRU</h1>
            <div class ="header-description col-lg-12">
             <p >Здесь вы сможете рассчитать стоимость фотоальбома в зависимости от ваших предпочтений.</p>   
            </div>    
            
          

            </div>   
        </div>     
        </nav>
      
      
     </header> 
   
   

      
       
   <?= $content ?>   
<?php $this->endBody() ?>   
</body>
</html>
<?php $this->endPage() ?>
