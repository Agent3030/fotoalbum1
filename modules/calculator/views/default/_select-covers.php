<?php
 use yii\helpers\Html;
use yii\helpers\Url;

//$sizes = Yii::$app->params['sizes'];
?>

<label for="material-select" class = "col-lg-7 control-label">Выберите материал обложки:</label>
    <select class= "form-control" id ="cover-select">
      <?php foreach ($covers as $cover): ?>  
        <option><?= Html::encode($cover->cover_type) ?></option>
      <?php endforeach; ?> 
       
    </select>
                                            
                                        