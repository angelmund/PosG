<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Apartado
 * 
 * @property int $idapartados
 * @property string $nombre_productos
 * @property Carbon $fecha_apartado
 * @property Carbon $fecha_retiro
 * @property float $abono
 * @property float $total
 * @property string|null $descripcion
 * @property int $estado
 * @property int|null $id_cliente
 * 
 * @property Cliente|null $cliente
 *
 * @package App\Models
 */
class Apartado extends Model
{
	protected $table = 'apartados';
	protected $primaryKey = 'idapartados';
	public $timestamps = false;

	protected $casts = [
		'fecha_apartado' => 'datetime',
		'fecha_retiro' => 'datetime',
		'abono' => 'float',
		'total' => 'float',
		'estado' => 'int',
		'id_cliente' => 'int'
	];

	protected $fillable = [
		'nombre_productos',
		'fecha_apartado',
		'fecha_retiro',
		'abono',
		'total',
		'descripcion',
		'estado',
		'id_cliente'
	];

	public function cliente()
	{
		return $this->belongsTo(Cliente::class, 'id_cliente');
	}
}
