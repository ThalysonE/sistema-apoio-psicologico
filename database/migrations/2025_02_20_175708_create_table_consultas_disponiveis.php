<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('consultas_disponiveis', function (Blueprint $table) {
            $table->id();
            $table->datetime('data');
            $table->unsignedBigInteger('id_psychologist');
            $table->foreign('id_psychologist')->references('id')->on('psychologist');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_consultas_disponiveis');
    }
};
