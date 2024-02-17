<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Productos $model */

$this->title = $model->nombre;
$this->params['breadcrumbs'][] = ['label' => 'Productos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="productos-view container py-5">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->id], ['class' => 'btn', 'style' => 'background-color: #2e97b7; font-weight: bold;  color: #fff;']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'style' => 'background-color: #fd0a54; font-weight: bold;  color: #fff',
            'data' => [
                'confirm' => 'Estás seguro de eliminar el siguiente articulo?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'nombre',
            'precio',
            'categoria.nombre',
            [
                'attribute' => 'imagen',
                'format' => 'html',
                'value' => function ($model) {
                    return Html::img(Yii::$app->request->baseUrl . '/uploads/' . $model->imagen, ['width' => '200px']);
                },
            ],
        ],
    ]) ?>

</div>
