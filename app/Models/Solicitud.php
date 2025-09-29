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
        'ID_PROGRAMA' => 'int',
        'FECHA_SOLICITUD' => 'date',
        'ESTADO' => 'int'
    ];

protected $fillable = [
    'NOMBRE',
    'ID_PROGRAMA',
    'FECHA_SOLICITUD',
    'ESTADO'
];


    public function programa()
    {
        // FK = ID_PROGRAMA en solicitud, PK = ID_PROGRAMA en programa
        return $this->belongsTo(Programa::class, 'ID_PROGRAMA', 'ID_PROGRAMA');
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
