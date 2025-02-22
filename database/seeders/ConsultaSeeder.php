<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConsultaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {   
        DB::table('consulta')->truncate();

        // DB::table('consulta')->insert([
        //     ['id' => 1, 'id_user'=> 1,'id_consulta_disponivel'=>2,'created_at' => now(), 'updated_at' => now()],
        // ]);     
    }
}
