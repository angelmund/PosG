<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TipoDeVenta
 * 
 * @property int $idtipo_de_ventas
 * @property string $nombre
 * 
 * @property Collection|Venta[] $ventas
 *
 * @package App\Models
 */
class TipoDeVenta extends Model
{
	protected $table = 'tipo_de_ventas';
	protected $primaryKey = 'idtipo_de_ventas';
	public $timestamps = false;

	protected $fillable = [
		'nombre'
	];

	public function ventas()
	{
		return $this->hasMany(Venta::class, 'id_tipo_ventas');
	}
}
