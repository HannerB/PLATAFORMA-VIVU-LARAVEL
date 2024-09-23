<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class AccesoRegistro
 *
 * @property $id_acceso
 * @property $estado
 * @property $proceso
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class AccesoRegistro extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['id_acceso', 'estado', 'proceso'];


}
