<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * Class User
 *
 * @property $id
 * @property $nombres
 * @property $apellidos
 * @property $sexo
 * @property $tipodocumento
 * @property $documento
 * @property $fechaNacimiento
 * @property $telefono
 * @property $tipoPoblacion
 * @property $centro
 * @property $municipio
 * @property $email
 * @property $password
 * @property $rol
 * @property $fechaRegistro
 * @property $fecha_sesion
 * @property $img
 * @property $tipo_archivo
 *
 * @property AlianzaMunicipio[] $alianzaMunicipios
 * @property AsignarMunicipio[] $asignarMunicipios
 * @property Concertacione[] $concertaciones
 * @property CursosDetalle[] $cursosDetalles
 * @property File[] $files
 * @property FilesConcertacione[] $filesConcertaciones
 * @property NoInscritosSofiaplu[] $noInscritosSofiapluses
 * @property YInscritosCurso[] $yInscritosCursos
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class User extends Authenticatable
{
    use Notifiable;

    public $timestamps = false;
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nombres',
        'apellidos',
        'sexo',
        'tipodocumento',
        'documento',
        'fechaNacimiento',
        'telefono',
        'tipoPoblacion',
        'centro',
        'municipio',
        'email',
        'password',
        'rol',
        'fechaRegistro',
        'fecha_sesion',
        'img',
        'tipo_archivo',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function alianzaMunicipios()
    {
        return $this->hasMany(\App\Models\AlianzaMunicipio::class, 'id', 'id_User');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function asignarMunicipios()
    {
        return $this->hasMany(\App\Models\AsignarMunicipio::class, 'id', 'id_responsable');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function concertaciones()
    {
        return $this->hasMany(\App\Models\Concertacione::class, 'id', 'id_usuario');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cursosDetalles()
    {
        return $this->hasMany(\App\Models\CursosDetalle::class, 'id', 'id_users');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function files()
    {
        return $this->hasMany(\App\Models\File::class, 'id', 'id_users');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function filesConcertaciones()
    {
        return $this->hasMany(\App\Models\FilesConcertacione::class, 'id', 'users_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function noInscritosSofiapluses()
    {
        return $this->hasMany(\App\Models\NoInscritosSofiaplu::class, 'id', 'id_users');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function yInscritosCursos()
    {
        return $this->hasMany(\App\Models\YInscritosCurso::class, 'id', 'id_usuario');
    }

    public function tipoUsuario()
    {
        return $this->belongsTo(YTipoUsuario::class, 'rol', 'id');
    }
    
}
