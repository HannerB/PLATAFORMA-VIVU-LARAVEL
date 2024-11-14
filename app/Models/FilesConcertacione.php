<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class FilesConcertacione
 *
 * @property $id_file_concertaciones
 * @property $mes_concertacion
 * @property $vigencia
 * @property $ruta
 * @property $users_id
 * @property $estado
 * @property $tipo
 *
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class FilesConcertacione extends Model
{

    protected $table = 'files_concertaciones';
    protected $primaryKey = 'id_file_concertaciones';
    public $timestamps = false;
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['id_file_concertaciones', 'mes_concertacion', 'vigencia', 'ruta', 'users_id', 'estado', 'tipo'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'users_id', 'id');
    }
    
}
