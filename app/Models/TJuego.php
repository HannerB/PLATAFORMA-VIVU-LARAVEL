<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TJuego
 *
 * @property $id_juego
 * @property $nombre
 * @property $anio
 * @property $empresa
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class TJuego extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['id_juego', 'nombre', 'anio', 'empresa'];


}
