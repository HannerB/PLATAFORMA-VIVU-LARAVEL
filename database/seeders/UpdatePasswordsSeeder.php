<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UpdatePasswordsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Obtén todos los usuarios y actualiza sus contraseñas
        $users = DB::table('users')->get();

        foreach ($users as $user) {
            DB::table('users')
                ->where('id', $user->id)
                ->update(['password' => Hash::make($user->password)]);
        }
    }
}
