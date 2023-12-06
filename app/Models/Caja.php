<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Caja
 * 
 * @property int $id
 * @property float $monto_inicial
 * @property Carbon $fecha_apertura
 * @property Carbon $fecha_cierre
 * @property float $monto_final
 * @property int $total_ventas
 * @property int $estado
 * @property int|null $user_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property User|null $user
 *
 * @package App\Models
 */
class Caja extends Model
{
	protected $table = 'cajas';

	protected $casts = [
		'monto_inicial' => 'float',
		'fecha_apertura' => 'datetime',
		'fecha_cierre' => 'datetime',
		'monto_final' => 'float',
		'total_ventas' => 'int',
		'estado' => 'int',
		'user_id' => 'int'
	];

	protected $fillable = [
		'monto_inicial',
		'fecha_apertura',
		'fecha_cierre',
		'monto_final',
		'total_ventas',
		'estado',
		'user_id'
	];

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
