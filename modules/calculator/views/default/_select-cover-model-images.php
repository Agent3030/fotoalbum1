<?php
 use yii\helpers\Html;
use yii\helpers\Url;

//$sizes = Yii::$app->params['sizes'];
?>

 
                                                
                                  
                                                     
                                                
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
     
                                          
                                        