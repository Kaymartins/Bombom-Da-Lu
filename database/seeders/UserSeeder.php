<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Apaga toda a tabela de usuários
        DB::table('users')->truncate();

        // Cria usuários admins
        $this->createAdmin();

        // Cria usuários cliente
        $this->createClient();
    }

    private function createAdmin(){
        User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com.br',
            'password' => Hash::make('desafiolaravel'),
            'registration' => '20223501-A',
            'permission' => 'Administrador'
        ]);
    }

    private function createClient(){
        User::create([
            'name' => 'Cliente',
            'email' => 'cliente@cliente.com.br',
            'password' => Hash::make('desafiolaravel'),
            'registration' => '20223501-B',
            'permission' => 'Cliente',
            'fidelity' => 5,
        ]);
    }
}
