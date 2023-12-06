<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Medida
 * 
 * @property int $idmedida
 * @property string $nombre_medida
 * @property string $nombre_corto
 * @property Carbon $fecha
 * @property int $estado
 * 
 * @property Collection|Producto[] $productos
 *
 * @package App\Models
 */
class Medida extends Model
{
	protected $table = 'medidas';
	protected $primaryKey = 'idmedida';
	public $timestamps = false;

	protected $casts = [
		'fecha' => 'datetime',
		'estado' => 'int'
	];

	protected $fillable = [
		'nombre_medida',
		'nombre_corto',
		'fecha',
		'estado'
	];

	public function productos()
	{
		return $this->hasMany(Producto::class, 'id_medida');
	}
}
