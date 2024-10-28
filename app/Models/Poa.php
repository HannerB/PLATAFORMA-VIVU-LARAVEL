<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Poa
 *
 * @property $id_poa
 * @property $id_asignar_municipios
 * @property $Nombre_Poa
 * @property $Persona_Enlace
 * @property $Telefono_Enlace
 * @property $Correo_Enlace
 * @property $Poblacion
 * @property $Ocupacion_Productiva
 * @property $fecha_registro
 * @property $estado
 *
 * @property AsignarMunicipio $asignarMunicipio
 * @property AlianzaMunicipio[] $alianzaMunicipios
 * @property GestionCurso[] $gestionCursos
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Poa extends Model
{

    public $timestamps = false;
    protected $table = 'poa';
    protected $primaryKey = 'id_poa';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['id_poa', 'id_asignar_municipios', 'Nombre_Poa', 'Persona_Enlace', 'Telefono_Enlace', 'Correo_Enlace', 'Poblacion', 'Ocupacion_Productiva', 'fecha_registro', 'estado'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function asignarMunicipio()
    {
        return $this->belongsTo(\App\Models\AsignarMunicipio::class, 'id_asignar_municipios', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function alianzaMunicipios()
    {
        return $this->hasMany(\App\Models\AlianzaMunicipio::class, 'id_poa', 'poa_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function gestionCursos()
    {
        return $this->hasMany(\App\Models\GestionCurso::class, 'id_nombre_poa', 'id_poa');
    }

    public function getPrimerMunicipioCursoAttribute()
    {
        return $this->gestionCursos()->first()->Municipio_Curso ?? 'No asignado';
    }

    // Método para obtener el periodo del municipio asignado
    public function getPeriodoMunicipioAttribute()
    {
        return $this->asignarMunicipio->periodo ?? 'No asignado';
    }
}
