<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Rol
 * 
 * @property int $ID_USUA_ROL
 * @property int|null $ADMIN_ID
 * @property int|null $ESTUDIANTE_ID
 * @property int|null $INSTITUCION_ID
 * @property string|null $NOMBRE
 * 
 * @property Administrador|null $administrador
 * @property Estudiante|null $estudiante
 * @property Institucion|null $institucion
 * @property Collection|Usuario[] $usuarios
 *
 * @package App\Models
 */
class Rol extends Model
{
	protected $table = 'rol';
	protected $primaryKey = 'ID_USUA_ROL';
	public $timestamps = false;

	protected $casts = [
		'ADMIN_ID' => 'int',
		'ESTUDIANTE_ID' => 'int',
		'INSTITUCION_ID' => 'int'
	];

	protected $fillable = [
		'ADMIN_ID',
		'ESTUDIANTE_ID',
		'INSTITUCION_ID',
		'NOMBRE'
	];

	public function administrador()
	{
		return $this->belongsTo(Administrador::class, 'ADMIN_ID');
	}

	public function estudiante()
	{
		return $this->belongsTo(Estudiante::class, 'ESTUDIANTE_ID');
	}

	public function institucion()
	{
		return $this->belongsTo(Institucion::class, 'INSTITUCION_ID');
	}

	public function usuarios()
	{
		return $this->hasMany(Usuario::class, 'ROL_ID');
	}
}
