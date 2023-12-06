<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Inventario
 * 
 * @property int $idinventario
 * @property float $estradas
 * @property float $salida
 * @property Carbon $fecha
 * @property int|null $id_producto
 * @property int|null $id_usuario
 * 
 * @property Producto|null $producto
 * @property User|null $user
 *
 * @package App\Models
 */
class Inventario extends Model
{
	protected $table = 'inventario';
	protected $primaryKey = 'idinventario';
	public $timestamps = false;

	protected $casts = [
		'estradas' => 'float',
		'salida' => 'float',
		'fecha' => 'datetime',
		'id_producto' => 'int',
		'id_usuario' => 'int'
	];

	protected $fillable = [
		'estradas',
		'salida',
		'fecha',
		'id_producto',
		'id_usuario'
	];

	public function producto()
	{
		return $this->belongsTo(Producto::class, 'id_producto');
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'id_usuario');
	}
}
