<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Estudiante
 * 
 * @property int $ID_USUA_ESTU
 * @property int $PROGRAMA_ID
 * @property int $SOLICITUD_ID
 * 
 * @property Programa $programa
 * @property Solicitud $solicitud
 * @property Collection|Rol[] $rols
 *
 * @package App\Models
 */
class Estudiante extends Model
{
	protected $table = 'estudiante';
	protected $primaryKey = 'ID_USUA_ESTU';
	public $timestamps = false;

	protected $casts = [
		'PROGRAMA_ID' => 'int',
		'SOLICITUD_ID' => 'int'
	];

	protected $fillable = [
		'PROGRAMA_ID',
		'SOLICITUD_ID'
	];

	public function programa()
	{
		return $this->belongsTo(Programa::class, 'PROGRAMA_ID');
	}

	public function solicitud()
	{
		return $this->belongsTo(Solicitud::class, 'SOLICITUD_ID');
	}

	public function rols()
	{
		return $this->hasMany(Rol::class, 'ESTUDIANTE_ID');
	}
}
