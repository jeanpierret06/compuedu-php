<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

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

    // ✅ Relación con usuarios (solo una vez)
    public function usuarios()
{
    return $this->hasMany(Usuario::class, 'ROL_ID', 'ID_USUA_ROL');
}


}
