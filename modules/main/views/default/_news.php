
<?php
use yii\helpers\Html;
use yii\helpers\Url;
use app\modules\main\models\News;


?>

                     
                          
                            
                            
                                                             
                   
                           
                              
                           <table >
                     
                                              
                           <?php if ($model): ?>    
                            <?php foreach($model as $new): ?> 
                           
                               <tr>
                                   <td class="news-table-col1"><?= Html::encode($new->created_at)?></td>
                                   <td class="news-table-col2"><?= Html::a($new->short_content, ['/main/news/view/'.Html::encode($new->id)])?></td>
                               </tr>
                               <?php endforeach; ?>
                             <?php endif; ?>  
                                
                            </table>
                      

