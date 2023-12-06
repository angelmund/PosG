<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Credito
 * 
 * @property int $idcreditos
 * @property float $monto
 * @property Carbon $fecha
 * @property int $estado
 * @property int|null $idventas
 * 
 * @property Venta|null $venta
 * @property Collection|Abono[] $abonos
 *
 * @package App\Models
 */
class Credito extends Model
{
	protected $table = 'creditos';
	protected $primaryKey = 'idcreditos';
	public $timestamps = false;

	protected $casts = [
		'monto' => 'float',
		'fecha' => 'datetime',
		'estado' => 'int',
		'idventas' => 'int'
	];

	protected $fillable = [
		'monto',
		'fecha',
		'estado',
		'idventas'
	];

	public function venta()
	{
		return $this->belongsTo(Venta::class, 'idventas');
	}

	public function abonos()
	{
		return $this->hasMany(Abono::class, 'id_credito');
	}
}
