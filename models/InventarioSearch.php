<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Inventario;

/**
 * InventarioSearch represents the model behind the search form of `app\models\Inventario`.
 */
class InventarioSearch extends Inventario
{
    public $nombreProducto; // Atributo virtual para representar producto.nombre
    public $nombreCategoria; // Atributo virtual para representar categoria.nombre
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'cantidad'], 'safe'],
            ['nombreProducto', 'safe'], // Regla para nombre del producto
            ['nombreCategoria', 'safe'], // Regla para nombre de la categoría
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Inventario::find()->joinWith(['producto', 'categoria']);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'cantidad' => $this->cantidad,
        ]);

        // Filtrar por nombre de producto
        $query->andFilterWhere(['like', 'productos.nombre', $this->nombreProducto]);

        // Filtrar por nombre de categoría
        $query->andFilterWhere(['like', 'categorias.nombre', $this->nombreCategoria]);

        return $dataProvider;
    }
}
