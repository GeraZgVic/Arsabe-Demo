<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Inventario $model */

$this->title = $model->producto->nombre;
$this->params['breadcrumbs'][] = ['label' => 'Inventarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="inventario-view container py-5">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->id], ['class' => 'btn', 'style' => 'background-color: #e7168e; font-weight: bold;  color: #fff;']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'style' => 'background-color: #fd0a54; font-weight: bold;  color: #fff',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'cantidad',
            [
                'attribute' => 'producto_id',
                'value' => function ($model) {
                    return $model->producto->nombre; // Reemplaza 'nombre' con el atributo que deseas mostrar
                },
            ],
            [
                'attribute' => 'categoria_id',
                'value' => function ($model) {
                    return $model->categoria->nombre; // Reemplaza 'nombre' con el atributo que deseas mostrar
                },
            ],
            [
                'attribute' => 'imagen',
                'format' => 'html',
                'value' => function ($model) {
                    return Html::img(Yii::$app->request->baseUrl . '/uploads/' . $model->producto->imagen, ['width' => '200px']);
                },
            ],
        ],
    ]) ?>

</div>
