<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Productos $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="productos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'precio')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'categoria_id')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\Categorias::find()->all(), 'id', 'nombre'), ['prompt' => 'Seleccione una categoría']) ?>

    <label for="imagen" style="padding:5px 0;">Imagen</label>
    <?= $form->field($model, 'imagen')->fileInput() ?>


    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn', 'style' => 'background-color: #e7168e; font-weight: bold;  color: #fff;']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
