<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Proveedore
 * 
 * @property int $idproveedor
 * @property string $rfc
 * @property string $nombre
 * @property string $telefono
 * @property string $direccion
 * @property Carbon $fecha
 * @property int $estado
 * 
 * @property Collection|Compra[] $compras
 * @property Collection|Gasto[] $gastos
 *
 * @package App\Models
 */
class Proveedore extends Model
{
	protected $table = 'proveedores';
	protected $primaryKey = 'idproveedor';
	public $timestamps = false;

	protected $casts = [
		'fecha' => 'datetime',
		'estado' => 'int'
	];

	protected $fillable = [
		'rfc',
		'nombre',
		'telefono',
		'direccion',
		'fecha',
		'estado'
	];

	public function compras()
	{
		return $this->hasMany(Compra::class, 'id_proveedor');
	}

	public function gastos()
	{
		return $this->hasMany(Gasto::class, 'id_proveedor');
	}
}
