<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "productos".
 *
 * @property int $id
 * @property string $nombre
 * @property float $precio
 * @property string $imagen
 * @property int $categoria_id  // Agrega este campo
 *
 * @property Inventario[] $inventarios
 * @property Categorias $categoria  // Agrega esta relación
 */
class Productos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'productos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'precio', 'imagen', 'categoria_id'], 'required'],
            [['precio'], 'number'],
            [['nombre'], 'string', 'max' => 255],
            [['imagen'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, avif, webp'],
            [['categoria_id'], 'exist', 'skipOnError' => true, 'targetClass' => Categorias::class, 'targetAttribute' => ['categoria_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'precio' => 'Precio',
            'imagen' => '',
            'categoria_id' => 'Categoria'
        ];
    }

    /**
     * Gets query for [[Inventarios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getInventarios()
    {
        return $this->hasMany(Inventario::class, ['producto_id' => 'id']);
    }

    // Relacion uno a uno
    public function getCategoria()
    {
        return $this->hasOne(Categorias::class, ['id' => 'categoria_id']);
    }
}
