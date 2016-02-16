<?php
use yii\helpers\Html;
use yii\helpers\Url;

?>
<div class="calc-body-header">
    <?php print_r($kit)
?>                                <h2>ШАГ 2: ВЫБОР РАЗМЕРА И ЛАМИНАЦИИ</h2>
                            </div>
                            <div class = "calc-body-main">
                                <form class="form-vertical" id="calc-form-step2">
                                    <div class="row">
                                        <div class = "col-lg-7">
                                            <div class="form-group">
                                           
                                                 <label for="size-select" class = "col-lg-7 control-label">Выберите размер альбома:</label>
                                                     <select class= "form-control" name ="size-select" id ="size">
                                                       <?php foreach ($sizes as $size):?> 
                                                         <option><?= Html::encode($size->size) ?></option>
                                                       <?php endforeach; ?> 
                                                     </select>
                                             </div>
                                        </div>
                                    </div>    
                                    <div class = "row" id = "img-container" >
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
                                            <div class="form-group">
                                                <label for="lamination-select" class = "col-lg-8 control-label">Выберите материал ламинации:</label>
                                                 <select class= "form-control" id ="lamination" name ="lamination-select">
                                                    <?php foreach ($types as $type):?> 
                                                     <option><?= Html::encode($type->type) ?></option>
                                                    <?php endforeach; ?>
                                                 </select>
                                             </div>
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
                                                <button type ="button" id ="confirm-qty" class ="btn btn-primary">Ok</button>
                                                <div class = "total-page-qty">
                                                    <h4>Общее количество разворотов: 10 </h4>
                                                </div>    
                                             </div>
                                            
                                        </div>
                                        
                                    </div>    
                                    <div class="row">
                                                <div class ="col-lg-4 pull-right">
                                                    <div class = "sum">
                                                       
                                                        <p>Общая сумма, грн: <span id ="total-price"></span></p>
                                                    </div>
                                                </div>
                                            </div>
                                
                            

                            <div class = "calc-body-footer">
                                <div class = "calc-body-nav>">
                                   <div class = "calc-body-nav-progress">
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
                                            <button class="btn btn-primary" type="submit">Далее</button>
                                        </div>

                                    </div>
                                  </div>     
                                </form>

                            </div>
                        </div>
                    </div>

