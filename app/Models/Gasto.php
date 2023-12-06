<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Gasto
 * 
 * @property int $idgasto
 * @property float $monto
 * @property string $descripcion
 * @property Carbon $fecha_hora
 * @property string|null $num_comprobante
 * @property int|null $id_usuario
 * @property int|null $id_proveedor
 * 
 * @property Proveedore|null $proveedore
 * @property User|null $user
 *
 * @package App\Models
 */
class Gasto extends Model
{
	protected $table = 'gastos';
	protected $primaryKey = 'idgasto';
	public $timestamps = false;

	protected $casts = [
		'monto' => 'float',
		'fecha_hora' => 'datetime',
		'id_usuario' => 'int',
		'id_proveedor' => 'int'
	];

	protected $fillable = [
		'monto',
		'descripcion',
		'fecha_hora',
		'num_comprobante',
		'id_usuario',
		'id_proveedor'
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
