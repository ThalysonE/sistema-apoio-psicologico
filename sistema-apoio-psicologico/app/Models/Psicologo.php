<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Psicologo extends Model
{
    use HasFactory;
    protected $table = 'psychologist';
    protected $fillable = ['name'];
    // Definir o relacionamento com as consultas disponíveis
    public function consultasDisponiveis()
    {
        return $this->hasMany(ConsultaDisponivel::class, 'id_psychologist');
    }
}
