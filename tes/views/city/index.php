<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\CitySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cities';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="city-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create City', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'header' => 'Provinsi',
                'headerOptions' => ['class' => 'text-center'],
                'contentOptions' => ['class' => 'text-center'],
                'attribute' => 'provinsi',
                'filter' => false,
                'value' => function ($model) {
                    return $model->province->name;
                }
            ],
            [
                'header' => 'City',
                'filter' => false,
                'headerOptions' => ['class' => 'text-center'],
                'contentOptions' => ['class' => 'text-center', 'style' => 'width:400px'],
                'attribute' => 'name',
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>