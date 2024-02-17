<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Servicios $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="servicios-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'titulo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descripcion')->textarea(['rows' => 6]) ?>
    
    <label for="imagen" style="padding:5px 0;">Imagen</label>
    <?= $form->field($model, 'imagen')->fileInput() ?>


    <div class="form-group">
    <?= Html::submitButton('Guardar', ['class' => 'btn', 'style' => 'background-color: #e7168e; font-weight: bold;  color: #fff;']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
