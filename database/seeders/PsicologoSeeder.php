<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PsicologoSeeder extends Seeder
{
    public function run()
    {
        // Adicionando 5 psicólogos fictícios
        DB::table('psychologist')->insert([
            ['name' => 'Ana Souza', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Carlos Silva', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Fernanda Lima', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'João Pereira', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Mariana Costa', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
