<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\Customer */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="customer-form">


    <?php $form = ActiveForm::begin(); ?>
    <div class="item form-group">
        <div class="col-md-6 col-sm-6 ">
            <?= $form->field($model, 'name')->textInput(['class' => 'form-control', 'maxlength' => true]) ?>
        </div>
        <div class="col-md-6 col-sm-6 ">
            <?= $form->field($model, 'foto')->fileInput(['class' => 'form-control', 'maxlength' => true]) ?>
        </div>
    </div>
    <div class="item form-group">
        <div class="col-md-6 col-sm-6 ">
            <?= $form->field($model, 'province_id')->widget(
                Select2::classname(),
                [
                    'model' => $model,
                    'attribute' => 'province_id',
                    'data' => $province,
                    'options' => ['placeholder' => 'Select a state ...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]
            );
            ?>
        </div>
        <div class="col-md-6 col-sm-6 ">
            <?= $form->field($model, 'city_id')->widget(
                Select2::classname(),
                [
                    'model' => $model,
                    'attribute' => 'city_id',
                    'data' => $city,
                    'options' => ['placeholder' => 'Select a city ...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]
            );
            ?>
        </div>
    </div>
    <div class="ln_solid"></div>
    <div class="item form-group">
        <div class="col-md-6 col-sm-6 offset-md-3">
            <?= Html::submitButton('Save', ['class' => 'btn btn-primary']) ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>

</div>