<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Venta
 * 
 * @property int $idventas
 * @property string $productos
 * @property float $total
 * @property Carbon $fecha
 * @property Carbon $hora
 * @property int $estado
 * @property float $apertura
 * @property int|null $id_clientes
 * @property int|null $id_usuario
 * @property int|null $id_tipo_ventas
 * 
 * @property Cliente|null $cliente
 * @property TipoDeVenta|null $tipo_de_venta
 * @property User|null $user
 * @property Collection|Credito[] $creditos
 *
 * @package App\Models
 */
class Venta extends Model
{
	protected $table = 'ventas';
	protected $primaryKey = 'idventas';
	public $timestamps = false;

	protected $casts = [
		'total' => 'float',
		'fecha' => 'datetime',
		'hora' => 'datetime',
		'estado' => 'int',
		'apertura' => 'float',
		'id_clientes' => 'int',
		'id_usuario' => 'int',
		'id_tipo_ventas' => 'int'
	];

	protected $fillable = [
		'productos',
		'total',
		'fecha',
		'hora',
		'estado',
		'apertura',
		'id_clientes',
		'id_usuario',
		'id_tipo_ventas'
	];

	public function cliente()
	{
		return $this->belongsTo(Cliente::class, 'id_clientes');
	}

	public function tipo_de_venta()
	{
		return $this->belongsTo(TipoDeVenta::class, 'id_tipo_ventas');
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'id_usuario');
	}

	public function creditos()
	{
		return $this->hasMany(Credito::class, 'idventas');
	}
}
