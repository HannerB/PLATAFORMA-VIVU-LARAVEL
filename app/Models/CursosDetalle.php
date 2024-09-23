<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CursosDetalle
 *
 * @property $id_cursos_detalle
 * @property $id_users
 * @property $id_gestion_cursos
 * @property $fecha_registro
 * @property $modo_Documento
 * @property $id_Docuemnto
 *
 * @property GestionCurso $gestionCurso
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class CursosDetalle extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['id_cursos_detalle', 'id_users', 'id_gestion_cursos', 'fecha_registro', 'modo_Documento', 'id_Docuemnto'];


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
        return $this->belongsTo(\App\Models\User::class, 'id_users', 'id');
    }
    
}
