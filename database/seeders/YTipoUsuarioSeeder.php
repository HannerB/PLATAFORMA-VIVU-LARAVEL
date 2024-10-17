<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\YTipoUsuario;

class YTipoUsuarioSeeder extends Seeder
{
    public function run()
    {
        $roles = [
            'Administrador',
            'Aprendiz',
            'Orientador',
            'Gestor',
            'Certificación'
        ];

        foreach ($roles as $role) {
            YTipoUsuario::create(['nombre' => $role]);
        }
    }
}
