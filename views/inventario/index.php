<?php

use app\models\Inventario;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\InventarioSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Inventarios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inventario-index container py-5">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Agregar', ['create'], ['class' => 'btn', 'style' => 'background-color: #e7168e; font-weight: bold;  color: #fff;']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'tableOptions' => ['class' => 'table table-light table-hover'],
        'columns' => [
            'id',
            [
                'attribute' => 'producto_id',
                'value' => function ($model) {
                    return $model->producto->nombre; // Reemplaza 'nombre' con el atributo que deseas mostrar
                },
            ],
            [
                'attribute' => '',
                'format' => 'html',
                'value' => function ($model) {
                    return Html::img(Yii::$app->request->baseUrl . '/uploads/' . $model->producto->imagen, ['width' => '150px']);
                },
            ],
         
            'cantidad',
            [
                'attribute' => 'categoria_id',
                'value' => function ($model) {
                    return $model->producto->categoria->nombre; // Reemplaza 'nombre' con el atributo que deseas mostrar
                },
            ],

            // Resto de las columnas...

            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Inventario $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
        ],
    ]);  ?>

</div>