<?php
 use yii\helpers\Html;
use yii\helpers\Url;

//$sizes = Yii::$app->params['sizes'];
?>

<label for="size-select" class = "col-lg-7 control-label">Выберите размер альбома:</label>
    <select class= "form-control" name ="size-select" id ="size">
      <?php foreach ($prices as $price):?> 
        <option value="<?= Html::encode($price->price) ?>"><?= Html::encode($price->size) ?></option>
      <?php endforeach; ?> 
    </select>
<div class ="add-prices hidden">
    <ul>
         <?php foreach ($prices as $price):?> 
        <li id = "<?= Html::encode($price->size) ?>"><?= Html::encode($price->price_pp) ?></li>
        <?php endforeach; ?> 
    </ul>
</div>                                        