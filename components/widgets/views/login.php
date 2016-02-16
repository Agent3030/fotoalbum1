<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;
                                   
        $form = ActiveForm::begin([
        'id' => 'login-form',
        'action'=>Url::toRoute(['/user/default/login']),
        'options' => ['class' => 'form-inline'],
        'fieldConfig' => [
            'template' => "{label}{input}",
            //'labelOptions' => ['class' => 'col-lg-1 control-label'],
        ],
        //'errorSummaryCssClass' =>'error-summary',                              
    ]);?>
                                    
                                       
                                     <?= $form->field($model, 'email') ?>
                                   
                                          
                                   
                                     <?= $form->field($model, 'password')->passwordInput() ?>
                                    
                                           
                                     <?= $form->field($model, 'rememberMe')->checkbox() ?>
                                       
                                        
                                      
                
                                    
                           
                <div class="form-group">
                    <?= Html::submitButton(Yii::t('app', 'BUTTON_LOGIN'), ['class' => 'btn btn-default nav-btn', 'name' => 'login-button', 'id'=>'login-btn']) ?>
                </div>
              
                 <?= Html::a('Регистрация', ['/user/default/signup'], ['class'=>'btn btn-default nav-btn']) ?>                         

    
       <?php echo $form->errorSummary($model); ?>
                     
  
               <?php ActiveForm::end(); ?>

