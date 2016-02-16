<?php
 use yii\helpers\Html;
use yii\helpers\Url;

//$sizes = Yii::$app->params['sizes'];
?>

<label for="material-select" class = "col-lg-7 control-label">Выберите тип обложки:</label>
    <select class= "form-control" id ="cover-model-select">
      <?php foreach ($models as $model): ?>  
        <option><?= Html::encode($model->cover_model) ?></option>
      <?php endforeach; ?> 
       
    </select>
                                            
                                        