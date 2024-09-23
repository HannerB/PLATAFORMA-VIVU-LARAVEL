<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CursosSolicitado
 *
 * @property $id
 * @property $nombres
 * @property $apellidos
 * @property $telefono
 * @property $correo
 * @property $nombreCursoSolicitado
 * @property $fechaRegistro
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class CursosSolicitado extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['nombres', 'apellidos', 'telefono', 'correo', 'nombreCursoSolicitado', 'fechaRegistro'];


}
