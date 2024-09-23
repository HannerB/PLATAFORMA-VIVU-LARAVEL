<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Curso
 *
 * @property $id
 * @property $codigo_curso
 * @property $curso
 * @property $jornada
 * @property $horario
 * @property $intensidad
 * @property $fecha_inicio
 * @property $municipio
 * @property $direccion
 * @property $formacion
 * @property $centro
 * @property $descripcion
 * @property $nombre_grupo
 * @property $estado
 * @property $rol
 * @property $fechaRegistro
 *
 * @property NoInscritosSofiaplu[] $noInscritosSofiapluses
 * @property YInscritosCurso[] $yInscritosCursos
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Curso extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['codigo_curso', 'curso', 'jornada', 'horario', 'intensidad', 'fecha_inicio', 'municipio', 'direccion', 'formacion', 'centro', 'descripcion', 'nombre_grupo', 'estado', 'rol', 'fechaRegistro'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function noInscritosSofiapluses()
    {
        return $this->hasMany(\App\Models\NoInscritosSofiaplu::class, 'id', 'curso_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function yInscritosCursos()
    {
        return $this->hasMany(\App\Models\YInscritosCurso::class, 'id', 'id_curso');
    }
    
}
