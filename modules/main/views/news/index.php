<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Country */

$this->title = $model->Name;
?>
<?= GridView::widget([
        'dataProvider' => $dataProvider,
        
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            'created_at:time',
            'short_content',
            'content',
            'author',
            

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
