<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    use Notifiable;

    public $timestamps = false;

    protected $perPage = 20;

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

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function alianzaMunicipios()
    {
        return $this->hasMany(\App\Models\AlianzaMunicipio::class, 'id_User', 'id');
    }

    public function hasAlianza()
    {
        return $this->alianzaMunicipios()->where('estado', 'activo')->exists();
    }

    public function tieneAlianzaActiva()
    {
        return AlianzaMunicipio::where('id_User', $this->id)
            ->where('estado', 'activo')
            ->exists();
    }

    public function asignarMunicipios()
    {
        return $this->hasMany(\App\Models\AsignarMunicipio::class, 'id', 'id_responsable');
    }

    public function concertaciones()
    {
        return $this->hasMany(\App\Models\Concertacione::class, 'id', 'id_usuario');
    }

    public function cursosDetalles()
    {
        return $this->hasMany(\App\Models\CursosDetalle::class, 'id', 'id_users');
    }

    public function files()
    {
        return $this->hasMany(\App\Models\File::class, 'id', 'id_users');
    }

    public function filesConcertaciones()
    {
        return $this->hasMany(\App\Models\FilesConcertacione::class, 'id', 'users_id');
    }

    public function noInscritosSofiapluses()
    {
        return $this->hasMany(\App\Models\NoInscritosSofiaplu::class, 'id', 'id_users');
    }

    public function yInscritosCursos()
    {
        return $this->hasMany(\App\Models\YInscritosCurso::class, 'id', 'id_usuario');
    }

    public function tipoUsuario()
    {
        return $this->belongsTo(YTipoUsuario::class, 'rol', 'id');
    }

    // public function tieneAlianzaActiva()
    // {
    //     return $this->alianzaMunicipios()->where('estado', 'activo')->exists();
    // }

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

    public function canValidateActas()
    {
        // Solo administradores (rol 1) y orientadores (rol 3) pueden validar
        return in_array($this->rol, ['1', '3']);
    }

    public function canDownloadActas()
    {
        return true;
    }
}
