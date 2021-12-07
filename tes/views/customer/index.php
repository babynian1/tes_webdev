<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\CustomerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Customers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customer-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Customer', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'foto',
            [
                'label' => 'Nama Lengkap',
                'headerOptions' => ['class' => 'text-center'],
                'value' => function ($model) {
                    return $model->name;
                }
            ],
            [
                'header' => 'Province',
                'headerOptions' => ['class' => 'text-center'],
                'value' => function ($model) {
                    return $model->province->name;
                }
            ],
            [
                'header' => 'City',
                'headerOptions' => ['class' => 'text-center'],
                'value' => function ($model) {
                    return $model->city->name;
                }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>