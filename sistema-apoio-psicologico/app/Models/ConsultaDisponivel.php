<?php

// App\Models\ConsultaDisponivel.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConsultaDisponivel extends Model
{
    use HasFactory;

    // Definindo o nome da tabela (caso não seja o padrão plural)
    protected $table = 'consultas_disponiveis';

    // Definindo relacionamento com a tabela consulta
    public function consultas()
    {
        return $this->hasMany(Consulta::class, 'id_consulta_disponivel');
    }
}

