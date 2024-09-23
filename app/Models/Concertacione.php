<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Concertacione
 *
 * @property $id
 * @property $id_concertacion
 * @property $id_usuario
 * @property $id_gestion_cursos
 * @property $fecha_registro
 *
 * @property GestionCurso $gestionCurso
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Concertacione extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['id_concertacion', 'id_usuario', 'id_gestion_cursos', 'fecha_registro'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function gestionCurso()
    {
        return $this->belongsTo(\App\Models\GestionCurso::class, 'id_gestion_cursos', 'id_Gestion_Cursos');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'id_usuario', 'id');
    }
    
}
