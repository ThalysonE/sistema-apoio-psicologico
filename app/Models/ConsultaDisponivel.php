<?php

// App\Models\ConsultaDisponivel.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Psicologo;
class ConsultaDisponivel extends Model
{
    use HasFactory;

    // Definindo o nome da tabela (caso não seja o padrão plural)
    protected $table = 'consultas_disponiveis';
    protected $fillable = ['data', 'id_psychologist'];
    // Definindo relacionamento com a tabela consulta
    public function consultas()
    {
        return $this->hasMany(Consulta::class, 'id_consulta_disponivel');
    }

    public function psicologo()
    {
        return $this->belongsTo(Psicologo::class, 'id_psychologist');
    }
}

