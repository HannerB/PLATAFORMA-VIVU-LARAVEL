<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class YTipoUsuario
 *
 * @property $id
 * @property $nombre
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class YTipoUsuario extends Model
{
    protected $table = 'y_tipo_usuario';
    public $timestamps = false;
    protected $fillable = ['nombre'];

    public function users()
    {
        return $this->hasMany(User::class, 'rol', 'id');
    }
}
