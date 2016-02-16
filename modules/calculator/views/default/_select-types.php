<?php
 use yii\helpers\Html;
use yii\helpers\Url;

//$sizes = Yii::$app->params['sizes'];
?>

<label for="lamination-select" class = "col-lg-8 control-label">Выберите материал ламинации:</label>
    <select class= "form-control" id ="lamination" name ="lamination-select">
       <?php foreach ($types as $type):?> 
        <option value="<?= Html::encode($type->price_k) ?>"><?= Html::encode($type->lam_type) ?></option>
       <?php endforeach; ?>
    </select>
                                        