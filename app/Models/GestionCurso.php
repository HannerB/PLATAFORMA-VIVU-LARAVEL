<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class GestionCurso
 *
 * @property $id_Gestion_Cursos
 * @property $Municipio_Curso
 * @property $Centro_Formacion
 * @property $Nivel_Formacion
 * @property $Nombre_Curso
 * @property $categoria
 * @property $Mes_Poa
 * @property $Estado_Curso
 * @property $Jornada_Curso
 * @property $Direccion
 * @property $id_nombre_poa
 * @property $fechaRegistro
 * @property $cupo
 *
 * @property Poa $poa
 * @property Concertacione[] $concertaciones
 * @property CursosDetalle[] $cursosDetalles
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class GestionCurso extends Model
{

    protected $perPage = 20;
    protected $table = 'gestion_cursos';
    public $timestamps = false;
    protected $primaryKey = 'id_Gestion_Cursos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['id_Gestion_Cursos', 'Municipio_Curso', 'Centro_Formacion', 'Nivel_Formacion', 'Nombre_Curso', 'categoria', 'Mes_Poa', 'Estado_Curso', 'Jornada_Curso', 'Direccion', 'id_nombre_poa', 'fechaRegistro', 'cupo'];

    protected $attributes = [
        'Estado_Curso' => 'Pendiente',
        'Jornada_Curso' => 'Por definir',
        'Direccion' => 'Por definir'
    ];

    // Boot method para manejar la fecha automáticamente
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            if (!$model->fechaRegistro) {
                $model->fechaRegistro = now();
            }
        });
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function poa()
    {
        return $this->belongsTo(\App\Models\Poa::class, 'id_nombre_poa', 'id_poa');
    }

    public function inscritos()
    {
        return $this->hasMany(CursosDetalle::class, 'id_gestion_cursos', 'id_Gestion_Cursos');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function concertaciones()
    {
        return $this->hasMany(\App\Models\Concertacione::class, 'id_Gestion_Cursos', 'id_gestion_cursos');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cursosDetalles()
    {
        return $this->hasMany(\App\Models\CursosDetalle::class, 'id_Gestion_Cursos', 'id_gestion_cursos');
    }
}
