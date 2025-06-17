<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FilesConcertacione extends Model
{
    protected $table = 'files_concertaciones';
    protected $primaryKey = 'id_file_concertaciones';
    public $timestamps = false;
    protected $perPage = 20;

    protected $fillable = [
        'id_file_concertaciones',
        'mes_concertacion',
        'vigencia',
        'ruta',
        'users_id',
        'estado',
        'tipo',
        'observaciones',
        'fecha_validacion',
        'validado_por'
    ];

    protected $casts = [
        'fecha_validacion' => 'datetime'
    ];

    const ESTADO_POR_VALIDAR = 'por validar';
    const ESTADO_VALIDA = 'Acta valida';
    const ESTADO_NO_VALIDA = 'Acta No valida';

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'users_id', 'id');
    }

    public function validador()
    {
        return $this->belongsTo(\App\Models\User::class, 'validado_por', 'id');
    }

    public function concertaciones()
    {
        return $this->hasMany(\App\Models\Concertacione::class, 'id_concertacion', 'id_file_concertaciones');
    }

    public function cursos()
    {
        return $this->hasManyThrough(
            \App\Models\GestionCurso::class,
            \App\Models\Concertacione::class,
            'id_concertacion',
            'id_Gestion_Cursos',
            'id_file_concertaciones',
            'id_gestion_cursos'
        );
    }

    public function scopePorValidar($query)
    {
        return $query->where('estado', self::ESTADO_POR_VALIDAR);
    }

    public function scopeValidadas($query)
    {
        return $query->where('estado', self::ESTADO_VALIDA);
    }

    public function scopeNoValidadas($query)
    {
        return $query->where('estado', self::ESTADO_NO_VALIDA);
    }

    public function estaValidada()
    {
        return $this->estado === self::ESTADO_VALIDA;
    }

    public function puedeSerDescargada()
    {
        return $this->estaValidada();
    }

    public function puedeSerModificada()
    {
        return $this->estado === self::ESTADO_POR_VALIDAR;
    }
}
