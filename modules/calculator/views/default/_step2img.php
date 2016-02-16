<?php
 use yii\helpers\Html;
use yii\helpers\Url;

//$sizes = Yii::$app->params['sizes'];
?>

<div class = "col-lg-4 col-lg-offset-2" >
  
                                            <div class = "thumbnail"  class="size-img">
                                                <div class = "kit-desc">
                                               
                                                  <h4>Размер:<?=Html::encode($sizes->size)?></h4>
                                                      <?= Html::img('@web/'.Html::encode($sizes->image_path), 
                                                            ['class'=>'img-responsive img-thumbnail'])?>
                                                    
                                                </div>
                                                <div class = "kit-choise">
                                                    <input type="radio" name="optionsRadios" id="optionsRadios1" value="1">
                                                </div>
                                            </div>
                                        </div>       
                                        