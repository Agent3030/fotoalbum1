<?php
use yii\widgets\Pjax;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;


/*$this->registerJs(<<<JS
$(document).on('click', '#step-2', function(e) {
    $.pjax({
        timeout: 4000,
        url: '/calculator/default/step2',
        type: 'POST',
        //data-type: 'html',
        container: '#calc-next',
       
       
       
   });
});
JS
, yii\web\View::POS_END);*/
?>
<section>
    <div class = "calc-main">
        <div class = "container">
                <div class ="row">
                    <div class = "col-lg-3">
                        <div class = "calc-manual">
                            <div>
                            <h5>Как пользоваться калькулятором&#63;</h5>
                            <p>Процесс расчета стоимости фотоальбома состоит из нескольких шагов. На каждом из них
                                выберите наиболее интересный вам элемент альбома:"</p>
                            <ul>
                                <li><span class = "active" id="s1">Шаг 1:</span> Выберите набор альбомов</li>
                                <li><span id="s2">Шаг 2:</span> Выберите размер альбома, тип ламинации и количество
                                    внутренних страниц</li>
                                <li><span id="s3">Шаг 3: </span> Выберите тип и шаблон обложки</li>
                                <li><span id="s4">Шаг 4: </span> Выберите дополнительные опции</li>
                            </ul>
                            <p>В результате вы получите полный расчет стоимости вашего альбома и можете 
                                либо сохранить его как PDF файл либо сохранить его в список заказов, при условии регистрации 
                                на сайте</p>
                            </div>
                            <div class="progress calc-progress" id="progress">
                              <div class="progress-bar progress-bar-success" 
                                                     role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0">
                                                    
                              </div>  
                            </div>
                        </div>
                    </div>
                     
                    <div class = "col-lg-9">
                       
                        <div class = "calc-body" id = "calc-next">
                            
                            
                           
                    </div>
                   
                      
            </div>
        
        </div>
        </div>
    </div>
    <div class ="calc-footer">
       
            <div class = "row">
                <div class="col-lg-4">
                </div>
                <div class = "col-lg-4">
                    <h5><i class="fa fa-copyright"></i>MediaStar, 2015 год.</h5>
                </div>
                <div class = "col-lg-4">
                </div>
            </div>
        
    </div>
        
  

<div class="hidden step-1">
 <div id="step-1">
    <div class="calc-body-header">
            <h2>ШАГ 1: ВЫБОР НАБОРА</h2>
        </div>
        <div class = "calc-body-main">

           
                <div class ="row">
                    <div class = "col-lg-12">
                        <div class ="row">
                        <?php foreach ($kits as $kit):?>
                            <?php $components = explode(',', $kit->description);?>
                            <div class = "col-lg-4" id="kit-choice">
                                  <div class = "thumbnail kit-desc">
                                        <h4 id="kit-name"><?=Html::encode($kit->name)?></h4>
                                         <?= Html::img('@web/'.Html::encode($kit->image_path), ['class'=>'img-responsive img-thumbnail'])?>

                                    <div class = "kit-text">    
                                        <ul>
                                            <?php foreach($components as $component): ?>
                                            <li><?=Html::encode($component)?></li>
                                            <?php endforeach;?>
                                        </ul>
                                    </div>
                                    
                                </div>
                            </div>
                        <?php endforeach; ?>   

                        </div>

                    </div>

                </div>
             <div class ="col-lg-12 kit-name">
                        <h3>Вы выбрали:<span id = "kit-id"></span></h3>
                        <div id ="kit">
                            
                        </div>
                    </div> 
            <div class="row">
              
                   <div
                                        <div class="col-lg-offset-9 col-lg-3 pull-right">
                                            <span class="next"  id="to-step-2"><i class="fa fa-chevron-right fa-4x"></i></span>
                                        </div> 
                </div>
         
        </div>
    
                    
            
    
<div class="hidden step-2">
    
<div id="step-2">
    <div class="calc-body-header">
                <h2>ШАГ 2: ВЫБОР РАЗМЕРА И ЛАМИНАЦИИ</h2>
                            </div>
                            <div class = "calc-body-main">
                                <form class="form-vertical" id="calc-form-step2">
                                    <div class="row">
                                        <div class = "col-lg-7">
                                            <div class="form-group" id = "select-size">
                                           
                                                 
                                             </div>
                                        </div>
                                        <div class ="col-lg-5">
                                            <h4> Cтоимость за размер:<span id ="cost-size">0<span></h4>
                                        </div>
                                    </div>    
                                    <div class = "row" id = "size-img" >
                                     <div class = "col-lg-4 col-lg-offset-2" >
   
                                            <div class = "thumbnail"  class="size-img">
                                                <div class = "kit-desc">
                                               
                                                  <h4>Размер:<?=Html::encode($startSize)?></h4>
                                                      <?= Html::img('@web/'.Html::encode($startImage), 
                                                            ['class'=>'img-responsive img-thumbnail'])?>
                                                    
                                                </div>
                                                <div class = "kit-choise">
                                                    <input type="radio" name="optionsRadios" id="optionsRadios1" value="1">
                                                </div>
                                            </div>
                                        </div>  
                                        
                                    </div> 
                             <div class = "row">
                                        <div class = "col-lg-7">
                                            <div class="form-group" id ="select-lam">
                                                <label for="lamination-select" class = "col-lg-8 control-label">Выберите материал ламинации:</label>
                                                 <select class= "form-control" id ="lamination" name ="lamination-select">
                                                    <?php foreach ($types as $type):?> 
                                                     <option value="<?= Html::encode($type->price_k) ?>"><?= Html::encode($type->lam_type) ?></option>
                                                    <?php endforeach; ?>
                                                 </select>
                                             </div>
                                             
                                        </div>
                                         <div class ="col-lg-5">
                                            <h4>Стоимость за ламинацию, грн:<span id ="cost-lam">0<span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class = "col-lg-7">
                                            <div class="form-group">
                                                <div class = "range">
                                                    <label for="range-select" class = "col-lg-9 control-label">Выберите дополнительные развороты:</label>
                                                     <input type="range" id ="range-select" min ="0" max="10" value ="0" step = "1">
                                                </div>    
                                                <div class = "number">   
                                                    <label for="number-select" class = "col-lg-9 control-label">Количествот от 1-го до 10-ти:</label>
                                                     <input type="number" id ="number-select" min ="0" max="10" value ="0" step ="1">                                                </div>
                                            </div>
                                                <div class = "total-page-qty">
                                                    <h4>Общее количество разворотов:<span id ="total-qty"><span> </h4>
                                                </div> 
                                            
                                             </div>
                                             <div class ="col-lg-5">
                                            <h4>Стоимость за доп. развороты:<span id ="cost-pages">0<span>
                                        </div>
                                        </div>
                                        
                                    </div>    
                                    <div class="row">
                                                <div class ="col-lg-6">
                                                    <div class = "sum">
                                                       
                                                        <h3>Общая сумма, грн: <span id ="total-price"></span></h3>
                                                    </div>
                                                </div>
                                            </div>
                                
                            

                            
                    </div>
    </div>

<div class="hidden step-3">
    <div id="step-3">
        <div class="calc-body-header">
                <h2>ШАГ 3: ВЫБОР МАТЕРИАЛА И ШАБЛОНА АЛЬБОМА</h2>
                            </div>
   <div class = "calc-body-main">
       
                               
                                    <div class="row">
                                        <div class = "col-lg-7">
                                            <div class="form-group" id = "select-cover">
                                             <label for="material-select" class = "col-lg-7 control-label">Выберите материал обложки:</label>
                                                    <select class= "form-control" id ="cover-select">
                                                      <?php foreach ($covers as $cover): ?>  
                                                        <option><?= Html::encode($cover->cover_type) ?></option>
                                                      <?php endforeach; ?> 

                                                    </select>
                                                 
                                             </div>
                                        </div>
                                    </div>    
                                    <div class="row">
                                        <div class = "col-lg-7">
                                            <div class="form-group" id = "select-cover-model">
                                              <label for="material-select" class = "col-lg-7 control-label">Выберите тип обложки:</label>
                                                <select class= "form-control" id ="cover-model-select">
                                                  <?php foreach ($coverModels as $coverModel): ?>  
                                                    <option><?= Html::encode($coverModel->cover_model) ?></option>
                                                  <?php endforeach; ?> 

                                                </select>
                                                 
                                             </div>
                                        </div>
                                    </div> 
                              
       <div class="row">                      
                        <div id="model-img">
                                           <div  class="owl-carousel col-lg-12" id="img-carousel"> 
                                                     
                                                
                                         <?php foreach ($coverModelsImgs as $coverModelImg):?>
                                             
                                             <div  class="model-imgs">
                                                    <div class = "thumbnail">
                                                        <div class = "kit-desc">
                                                            <h4><?= Html::encode($coverModelImg->cover_model_name)?></h4>
                                                             <?= Html::img('@web/'.Html::encode($coverModelImg->cover_img), ['class'=>'img-responsive img-thumbnail'])?>
                                                             
                                                            
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                             
                                         <?php  endforeach; ?>
     
                                             </div> 
       </div>
       </div>                              
                            

                            
                            
                                
</div>
</div>
    <div class ="hidden btn-nav-2">
        <div id ="btn-block-2">
            <div class = "row">
                                        <div class = "col-lg-3">
                                           <button class="btn btn-danger" type="submit">Назад</button>     
                                        </div>
                                        <div class = "col-lg-6">
                                            <div class ="progress">
                                                <div class="progress-bar progress-bar-success" 
                                                     role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%">
                                                    <span class="sr-only">25% Complete (success)</span>
                                                </div>
                                            </div>    
                                        </div>
                                        <div class="col-lg-3 pull-right">
                                            <button class="btn btn-primary" type="submit" id="to-step-3">Далее</button>
                                        </div>

                                    </div>
        </div>
    </div>    
    
    <div class ="hidden btn-nav-3">
        <div id ="btn-block-3">
            <div class = "row">
                                        <div class = "col-lg-3">
                                           <button class="btn btn-danger" type="submit">Назад</button>     
                                        </div>
                                        <div class = "col-lg-6">
                                            <div class ="progress">
                                                <div class="progress-bar progress-bar-success" 
                                                     role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%">
                                                    <span class="sr-only">50% Complete (success)</span>
                                                </div>
                                            </div>    
                                        </div>
                                        <div class="col-lg-3 pull-right">
                                            <button class="btn btn-primary" type="submit" id="to-step-4">Далее</button>
                                        </div>

                                    </div>
        </div>
    </div>    