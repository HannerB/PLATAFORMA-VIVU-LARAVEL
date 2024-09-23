<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class NoInscritosSofiaplu
 *
 * @property $id_sofiaPlus
 * @property $pais_nacimiento
 * @property $departamento_nacimiento
 * @property $municipio_nacimiento
 * @property $fecha_exped_cedula
 * @property $pais_cedula
 * @property $departamento_cedula
 * @property $municipio_cedula
 * @property $id_users
 * @property $registro_sofia
 * @property $curso_id
 *
 * @property Curso $curso
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class NoInscritosSofiaplu extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['id_sofiaPlus', 'pais_nacimiento', 'departamento_nacimiento', 'municipio_nacimiento', 'fecha_exped_cedula', 'pais_cedula', 'departamento_cedula', 'municipio_cedula', 'id_users', 'registro_sofia', 'curso_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function curso()
    {
        return $this->belongsTo(\App\Models\Curso::class, 'curso_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'id_users', 'id');
    }
    
}
