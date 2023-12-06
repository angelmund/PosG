<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Categoria
 * 
 * @property int $idcategoria
 * @property string $nombre_categoria
 * @property Carbon $fecha
 * @property int $estado
 * 
 * @property Collection|Producto[] $productos
 *
 * @package App\Models
 */
class Categoria extends Model
{
	protected $table = 'categorias';
	protected $primaryKey = 'idcategoria';
	public $timestamps = false;

	protected $casts = [
		'fecha' => 'datetime',
		'estado' => 'int'
	];

	protected $fillable = [
		'nombre_categoria',
		'fecha',
		'estado'
	];

	public function productos()
	{
		return $this->hasMany(Producto::class, 'id_categoria');
	}
}
