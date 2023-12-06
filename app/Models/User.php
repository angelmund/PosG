<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class User
 * 
 * @property int $id
 * @property string $name
 * @property string|null $apPaterno
 * @property string|null $apMaterno
 * @property string $email
 * @property Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $perfil
 * @property string|null $telefono
 * @property string|null $direccion
 * @property int $estado
 * @property string|null $remember_token
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Caja[] $cajas
 * @property Collection|Compra[] $compras
 * @property Collection|Gasto[] $gastos
 * @property Collection|Inventario[] $inventarios
 * @property Collection|Venta[] $ventas
 *
 * @package App\Models
 */


class User extends Authenticatable

{
	protected $table = 'users';

	protected $casts = [
		'email_verified_at' => 'datetime',
		'estado' => 'int'
	];

	protected $hidden = [
		'password',
		'remember_token'
	];

	protected $fillable = [
		'name',
		'apPaterno',
		'apMaterno',
		'email',
		'email_verified_at',
		'password',
		'perfil',
		'telefono',
		'direccion',
		'estado',
		'remember_token'
	];

	public function cajas()
	{
		return $this->hasMany(Caja::class);
	}

	public function compras()
	{
		return $this->hasMany(Compra::class, 'id_usuario');
	}

	public function gastos()
	{
		return $this->hasMany(Gasto::class, 'id_usuario');
	}

	public function inventarios()
	{
		return $this->hasMany(Inventario::class, 'id_usuario');
	}

	public function ventas()
	{
		return $this->hasMany(Venta::class, 'id_usuario');
	}
}
