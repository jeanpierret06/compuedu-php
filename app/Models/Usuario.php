<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Usuario
 * 
 * @property int $ID_USUARIOS
 * @property string $NOMBRE_USUARIO
 * @property string $APELLIDO_USUARIO
 * @property string $TELEFONO_USUARIO
 * @property string $EMAIL_USUARIO
 * @property int $ROL_ID
 * 
 * @property Rol $rol
 *
 * @package App\Models
 */
class Usuario extends Model
{
	protected $table = 'usuarios';
	protected $primaryKey = 'ID_USUARIOS';
	public $timestamps = false;

	protected $casts = [
		'ROL_ID' => 'int'
	];

	protected $fillable = [
		'NOMBRE_USUARIO',
		'APELLIDO_USUARIO',
		'TELEFONO_USUARIO',
		'EMAIL_USUARIO',
		'ROL_ID'
	];

	public function rol()
	{
		return $this->belongsTo(Rol::class, 'ROL_ID');
	}
}
