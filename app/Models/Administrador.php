<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Administrador
 * 
 * @property int $ID_USUA_ADMIN
 * 
 * @property Collection|Rol[] $rols
 *
 * @package App\Models
 */
class Administrador extends Model
{
	protected $table = 'administrador';
	protected $primaryKey = 'ID_USUA_ADMIN';
	public $timestamps = false;

	public function rols()
	{
		return $this->hasMany(Rol::class, 'ADMIN_ID');
	}
}
