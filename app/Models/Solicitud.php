<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Solicitud
 * 
 * @property int $ID_SOLICITUD
 * @property string $NOMBRE
 * @property int $PROGRAMA_ID
 * @property Carbon $FECHA_SOLICITUD
 * @property int $ESTADO
 * @property string $PROGRAMA
 * 
 * @property Programa $programa
 * @property Collection|Estudiante[] $estudiantes
 * @property Collection|Institucion[] $institucions
 *
 * @package App\Models
 */
class Solicitud extends Model
{
	protected $table = 'solicitud';
	protected $primaryKey = 'ID_SOLICITUD';
	public $timestamps = false;

	protected $casts = [
		'PROGRAMA_ID' => 'int',
		'FECHA_SOLICITUD' => 'datetime',
		'ESTADO' => 'int'
	];

	protected $fillable = [
		'NOMBRE',
		'PROGRAMA_ID',
		'FECHA_SOLICITUD',
		'ESTADO',
		'PROGRAMA'
	];

	public function programa()
	{
		return $this->belongsTo(Programa::class, 'PROGRAMA_ID');
	}

	public function estudiantes()
	{
		return $this->hasMany(Estudiante::class, 'SOLICITUD_ID');
	}

	public function institucions()
	{
		return $this->hasMany(Institucion::class, 'SOLICITUD_ID');
	}
}
