<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TipoDeCliente
 * 
 * @property int $idtipo_de_cliente
 * @property string $nombre
 * 
 * @property Collection|Cliente[] $clientes
 *
 * @package App\Models
 */
class TipoDeCliente extends Model
{
	protected $table = 'tipo_de_cliente';
	protected $primaryKey = 'idtipo_de_cliente';
	public $timestamps = false;

	protected $fillable = [
		'nombre'
	];

	public function clientes()
	{
		return $this->hasMany(Cliente::class, 'idtipo_de_cliente');
	}
}
