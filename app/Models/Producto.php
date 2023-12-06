<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Producto
 * 
 * @property int $idproducto
 * @property string $codigo_barras
 * @property string $nombre
 * @property float $precio_compra
 * @property float $precio_venta
 * @property float $precio_venta_colaborador
 * @property float $precio_mayorista
 * @property string $descripcion
 * @property float $cantidad
 * @property string|null $foto
 * @property int $estado
 * @property int $ventas
 * @property int|null $id_medida
 * @property int|null $id_categoria
 * 
 * @property Categoria|null $categoria
 * @property Medida|null $medida
 * @property Collection|Inventario[] $inventarios
 *
 * @package App\Models
 */
class Producto extends Model
{
	protected $table = 'productos';
	protected $primaryKey = 'idproducto';
	public $timestamps = false;

	protected $casts = [
		'precio_compra' => 'float',
		'precio_venta' => 'float',
		'precio_venta_colaborador' => 'float',
		'precio_mayorista' => 'float',
		'cantidad' => 'float',
		'estado' => 'int',
		'ventas' => 'int',
		'id_medida' => 'int',
		'id_categoria' => 'int'
	];

	protected $fillable = [
		'codigo_barras',
		'nombre',
		'precio_compra',
		'precio_venta',
		'precio_venta_colaborador',
		'precio_mayorista',
		'descripcion',
		'cantidad',
		'foto',
		'estado',
		'ventas',
		'id_medida',
		'id_categoria'
	];

	public function categoria()
	{
		return $this->belongsTo(Categoria::class, 'id_categoria');
	}

	public function medida()
	{
		return $this->belongsTo(Medida::class, 'id_medida');
	}

	public function inventarios()
	{
		return $this->hasMany(Inventario::class, 'id_producto');
	}
}
