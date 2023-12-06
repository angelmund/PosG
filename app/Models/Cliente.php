<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Cliente
 * 
 * @property int $idcliente
 * @property string $nombre
 * @property string|null $ap_materno
 * @property string|null $ap_paterno
 * @property string|null $telefono
 * @property string|null $direccion
 * @property Carbon $fecha
 * @property int $estado
 * @property int|null $idtipo_de_cliente
 * 
 * @property TipoDeCliente|null $tipo_de_cliente
 * @property Collection|Apartado[] $apartados
 * @property Collection|Cotizacione[] $cotizaciones
 * @property Collection|Venta[] $ventas
 *
 * @package App\Models
 */
class Cliente extends Model
{
	protected $table = 'clientes';
	protected $primaryKey = 'idcliente';
	public $timestamps = false;

	protected $casts = [
		'fecha' => 'datetime',
		'estado' => 'int',
		'idtipo_de_cliente' => 'int'
	];

	protected $fillable = [
		'nombre',
		'ap_materno',
		'ap_paterno',
		'telefono',
		'direccion',
		'fecha',
		'estado',
		'idtipo_de_cliente'
	];

	public function tipo_de_cliente()
	{
		return $this->belongsTo(TipoDeCliente::class, 'idtipo_de_cliente');
	}

	public function apartados()
	{
		return $this->hasMany(Apartado::class, 'id_cliente');
	}

	public function cotizaciones()
	{
		return $this->hasMany(Cotizacione::class, 'id_clientes');
	}

	public function ventas()
	{
		return $this->hasMany(Venta::class, 'id_clientes');
	}
}
