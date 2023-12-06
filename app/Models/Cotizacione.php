<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Cotizacione
 * 
 * @property int $idcotizacion
 * @property string $nombre_producto
 * @property float $total
 * @property Carbon $fecha
 * @property Carbon $hora
 * @property int $validez
 * @property int|null $id_clientes
 * 
 * @property Cliente|null $cliente
 *
 * @package App\Models
 */
class Cotizacione extends Model
{
	protected $table = 'cotizaciones';
	protected $primaryKey = 'idcotizacion';
	public $timestamps = false;

	protected $casts = [
		'total' => 'float',
		'fecha' => 'datetime',
		'hora' => 'datetime',
		'validez' => 'int',
		'id_clientes' => 'int'
	];

	protected $fillable = [
		'nombre_producto',
		'total',
		'fecha',
		'hora',
		'validez',
		'id_clientes'
	];

	public function cliente()
	{
		return $this->belongsTo(Cliente::class, 'id_clientes');
	}
}
