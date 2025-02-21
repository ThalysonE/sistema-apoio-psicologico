<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ConsultaDisponivelSeeder extends Seeder
{
    public function run()
    {
        // Adicionando consultas disponíveis para os psicólogos
        DB::table('consultas_disponiveis')->insert([
            // Psicólogo 1: Ana Souza
            ['data' => Carbon::parse('2025-02-25 10:00:00'), 'id_psychologist' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['data' => Carbon::parse('2025-02-25 14:00:00'), 'id_psychologist' => 1, 'created_at' => now(), 'updated_at' => now()],
            
            // Psicólogo 2: Carlos Silva
            ['data' => Carbon::parse('2025-02-26 09:00:00'), 'id_psychologist' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['data' => Carbon::parse('2025-02-26 13:00:00'), 'id_psychologist' => 2, 'created_at' => now(), 'updated_at' => now()],
            
            // Psicólogo 3: Fernanda Lima
            ['data' => Carbon::parse('2025-02-27 11:00:00'), 'id_psychologist' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['data' => Carbon::parse('2025-02-27 15:00:00'), 'id_psychologist' => 3, 'created_at' => now(), 'updated_at' => now()],
            
            // Psicólogo 4: João Pereira
            ['data' => Carbon::parse('2025-02-28 08:00:00'), 'id_psychologist' => 4, 'created_at' => now(), 'updated_at' => now()],
            ['data' => Carbon::parse('2025-02-28 16:00:00'), 'id_psychologist' => 4, 'created_at' => now(), 'updated_at' => now()],
            
            // Psicólogo 5: Mariana Costa
            ['data' => Carbon::parse('2025-03-01 10:00:00'), 'id_psychologist' => 5, 'created_at' => now(), 'updated_at' => now()],
            ['data' => Carbon::parse('2025-03-01 14:00:00'), 'id_psychologist' => 5, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
