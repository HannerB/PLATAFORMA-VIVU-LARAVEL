<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Competencia
 *
 * @property $id
 * @property $nombres
 * @property $apellidos
 * @property $sexo
 * @property $correo
 * @property $tipodocumento
 * @property $documento
 * @property $fechaNacimiento
 * @property $municipio
 * @property $telefono
 * @property $poblacion
 * @property $ocupacion
 * @property $fechaRegistro
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Competencia extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['nombres', 'apellidos', 'sexo', 'correo', 'tipodocumento', 'documento', 'fechaNacimiento', 'municipio', 'telefono', 'poblacion', 'ocupacion', 'fechaRegistro'];


}
