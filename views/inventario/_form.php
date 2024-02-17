<?php

use yii\helpers\Html;
use app\models\Productos;
use app\models\Categorias;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/** @var yii\web\View $this */
/** @var app\models\Inventario $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="inventario-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'producto_id')->dropDownList(
        ArrayHelper::map(Productos::find()->all(), 'id', 'nombre'),
        ['prompt' => 'Seleccionar Producto']
    ) ?>

    <?= $form->field($model, 'cantidad')->textInput() ?>

    <?= $form->field($model, 'categoria_id')->dropDownList(
        ArrayHelper::map(Categorias::find()->all(), 'id', 'nombre'),
        ['prompt' => 'Seleccionar Categoría']
    ) ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn', 'style' => 'background-color: #e7168e; font-weight: bold;  color: #fff;']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>