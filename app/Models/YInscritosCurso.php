<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class YInscritosCurso
 *
 * @property $id
 * @property $id_curso
 * @property $id_usuario
 * @property $estado
 * @property $fecha_reg
 *
 * @property Curso $curso
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class YInscritosCurso extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['id_curso', 'id_usuario', 'estado', 'fecha_reg'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function curso()
    {
        return $this->belongsTo(\App\Models\Curso::class, 'id_curso', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'id_usuario', 'id');
    }
    
}
