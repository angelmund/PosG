<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Compra
 * 
 * @property int $idcompra
 * @property string $productos
 * @property float $total
 * @property Carbon $fecha
 * @property Carbon $hora
 * @property string $descripcion
 * @property int $estado
 * @property int|null $id_proveedor
 * @property int|null $id_usuario
 * 
 * @property Proveedore|null $proveedore
 * @property User|null $user
 *
 * @package App\Models
 */
class Compra extends Model
{
	protected $table = 'compras';
	protected $primaryKey = 'idcompra';
	public $timestamps = false;

	protected $casts = [
		'total' => 'float',
		'fecha' => 'datetime',
		'hora' => 'datetime',
		'estado' => 'int',
		'id_proveedor' => 'int',
		'id_usuario' => 'int'
	];

	protected $fillable = [
		'productos',
		'total',
		'fecha',
		'hora',
		'descripcion',
		'estado',
		'id_proveedor',
		'id_usuario'
	];

	public function proveedore()
	{
		return $this->belongsTo(Proveedore::class, 'id_proveedor');
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'id_usuario');
	}
}
