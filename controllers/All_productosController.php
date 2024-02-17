<?php

namespace app\controllers;

use app\models\Productos;
use yii\web\NotFoundHttpException;

class All_productosController extends \yii\web\Controller
{
    public function actionIndex()
    {

        $productos = Productos::find()->all();
        return $this->render('index', [
            'productos' => $productos
        ]);
    }

    public function actionView($id)
    {
        // Buscar el modelo de producto por su ID
        $producto = Productos::findOne($id);

        // Verificar si el producto existe
        if ($producto === null) {
            throw new NotFoundHttpException('El producto no se encontró.');
        }

        // Renderizar la vista de producto
        return $this->render('view', [
            'producto' => $producto,
        ]);
    }
}
