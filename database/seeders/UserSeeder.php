<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();

        $user->nombre = 'administrador';
        $user->email = 'admin@admin.com';
        $user->password  = 'YWRtaW5AYWRtaW4uY29tOnBhc3N3b3Jk';
        $user->tipo_usuario = 1;
        $user->save();
    }
}
