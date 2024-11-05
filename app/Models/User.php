<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;

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
 * @property-read YTipoUsuario $tipoUsuario
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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tipoUsuario()
    {
        return $this->belongsTo(YTipoUsuario::class, 'rol', 'id');
    }

    /**
     * Check if the user has an active alliance
     *
     * @return bool
     */
    // public function tieneAlianzaActiva()
    // {
    //     return $this->alianzaMunicipios()->where('estado', 'activo')->exists();
    // }

    /**
     * Check if the user has a specific role
     *
     * @param string $role
     * @return bool
     */
    public function hasRole($role)
    {
        return $this->tipoUsuario->nombre === $role;
    }

    public function getProfileImageAttribute()
    {
        if ($this->img && Storage::disk('public')->exists('img/' . $this->img)) {
            return asset('storage/img/' . $this->img);
        }

        // Verificar si existe la imagen por defecto
        $defaultImagePath = 'img/default-user-img.jpg';
        if (file_exists(public_path($defaultImagePath))) {
            return asset($defaultImagePath);
        }

        // Si no existe ni la imagen de perfil ni la imagen por defecto
        return asset('img/default-user-img.jpg'); // Asegúrate de que esta imagen exista
    }
}
