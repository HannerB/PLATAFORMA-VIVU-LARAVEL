<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class AlianzaMunicipio
 *
 * @property $id_alianza
 * @property $id_User
 * @property $municipio
 * @property $periodo
 * @property $enlace_poblacion
 * @property $cargo
 * @property $estado
 * @property $poa_id
 * @property $created_at
 * @property $updated_at
 *
 * @property User $user
 * @property Poa $poa
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class AlianzaMunicipio extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['id_alianza', 'id_User', 'municipio', 'periodo', 'enlace_poblacion', 'cargo', 'estado', 'poa_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'id_User', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function poa()
    {
        return $this->belongsTo(\App\Models\Poa::class, 'poa_id', 'id_poa');
    }
    
}
