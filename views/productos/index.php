<?php

use app\models\Productos;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\ProductosSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Productos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="productos-index container py-1">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Crear Productos', ['create'], ['class' => 'btn', 'style' => 'background-color: #e7168e; font-weight: bold;  color: #fff;']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
    'dataProvider' => $dataProvider,
    'tableOptions' => ['class' => 'table table-light table-hover'],
    'columns' => [
        'id',
        'nombre',
        'precio',
        [
            'attribute' => 'imagen',
            'format' => 'html',
            'value' => function ($model) {
                return Html::img(Yii::$app->request->baseUrl . '/uploads/' . $model->imagen, ['width' => '150px']);
            },
        ],
        'categoria.nombre', //accedemos al campo nombre del modelo
        [
            'class' => ActionColumn::className(),
            'urlCreator' => function ($action, Productos $model, $key, $index, $column) {
                return Url::toRoute([$action, 'id' => $model->id]);
            }
        ],
    ],
]); ?>


</div>
