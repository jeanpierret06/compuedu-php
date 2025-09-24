<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Programa
 * 
 * @property int $ID_PROGRAMA
 * @property string $DESCRIPCION_PROGRAMA
 * @property string $MALLA_CURRICULAR
 * @property float $COSTO_SEMESTRE
 * @property string|null $PROGRAMA
 * @property string|null $UNIVERSIDAD
 * @property string|null $MODALIDAD
 * 
 * @property Collection|Estudiante[] $estudiantes
 * @property Collection|Institucion[] $institucions
 * @property Collection|Solicitud[] $solicituds
 *
 * @package App\Models
 */
class Programa extends Model
{
	protected $table = 'programa';
	protected $primaryKey = 'ID_PROGRAMA';
	public $timestamps = false;

	protected $casts = [
		'COSTO_SEMESTRE' => 'float'
	];

	protected $fillable = [
		'DESCRIPCION_PROGRAMA',
		'MALLA_CURRICULAR',
		'COSTO_SEMESTRE',
		'PROGRAMA',
		'UNIVERSIDAD',
		'MODALIDAD'
	];

	public function estudiantes()
	{
		return $this->hasMany(Estudiante::class, 'PROGRAMA_ID');
	}

	public function institucions()
	{
		return $this->hasMany(Institucion::class, 'PROGRAMA_ID');
	}

	public function solicituds()
	{
		return $this->hasMany(Solicitud::class, 'PROGRAMA_ID');
	}
}
