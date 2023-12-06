<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Abono
 * 
 * @property int $idabono
 * @property float $monto_abonado
 * @property Carbon $fecha
 * @property int|null $id_credito
 * 
 * @property Credito|null $credito
 *
 * @package App\Models
 */
class Abono extends Model
{
	protected $table = 'abonos';
	protected $primaryKey = 'idabono';
	public $timestamps = false;

	protected $casts = [
		'monto_abonado' => 'float',
		'fecha' => 'datetime',
		'id_credito' => 'int'
	];

	protected $fillable = [
		'monto_abonado',
		'fecha',
		'id_credito'
	];

	public function credito()
	{
		return $this->belongsTo(Credito::class, 'id_credito');
	}
}
