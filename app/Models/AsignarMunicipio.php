<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class AsignarMunicipio
 *
 * @property $id
 * @property $municipio
 * @property $id_responsable
 * @property $periodo
 * @property $estado
 * @property $fecha_registro
 *
 * @property User $user
 * @property Poa[] $poas
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class AsignarMunicipio extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['municipio', 'id_responsable', 'periodo', 'estado', 'fecha_registro'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'id_responsable', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function poas()
    {
        return $this->hasMany(\App\Models\Poa::class, 'id', 'id_asignar_municipios');
    }
    
}
