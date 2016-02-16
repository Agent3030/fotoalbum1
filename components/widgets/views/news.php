<?php
use yii\widgets\Pjax;
use yii\helpers\Html;
use yii\helpers\Url;
use app\modules\main\models\News;


/*$script = <<< JS
        function updateMessage(){
        $.pjax.reload({container: '#news-output'});
    }

    $(document).ready(function(){
      
         setInterval(updateMessage, 10000);
     
       
    });
JS;
$this->registerJs($script);        
/*$(document).ready(function() {
    setInterval(function(){
        $('#refreshButton').click();
    }, 3000);
});

Html::a("Обновить", [Url::toRoute('/')], ['class' => 'hidden',
                                                                                   'id'  => 'refreshButton',
                                                                                    'data-pjax'=>1
                               
                               ]);*/
$news = News::find()->where(['status' => '1'])
            ->orderBy(['id' => SORT_DESC])->limit(5)->all();
?>


                           
                          
                            
                            
                                                             
                   
                           
                           <?php Pjax::begin(['id'=>'news-output', 'enablePushState' => false]); ?>     
                           <table >
                     
                                              
                           <?php if ($news): ?>    
                            <?php foreach($news as $new): ?> 
                           
                               <tr>
                                   <td class="news-table-col1"><?= Html::encode($new->created_at)?></td>
                                   <td class="news-table-col2"><?= Html::a($new->short_content, ['/main/news/view/'.Html::encode($new->id)])?></td>
                               </tr>
                               <?php endforeach; ?>
                             <?php endif; ?>  
                                
                            </table>
                           <?php Pjax::end(); ?>   

