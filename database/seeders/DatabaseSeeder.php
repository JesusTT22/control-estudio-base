<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RoleSeeder::class); /**/ /*Llamar al seeder de roles (Nota: Se debe ejecutar los Seeders para Actualizar los Permisos"*/
        $this->call(UserSeeder::class); /**/ /*Llamar al seeder de usuarios*/

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
