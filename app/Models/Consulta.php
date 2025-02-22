<?php
// App\Models\Consulta.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    use HasFactory;

    // Definindo o nome da tabela
    protected $table = 'consulta';
    protected $fillable = ['id_user', 'id_consulta_disponivel'];
    // Relacionamento com User (Usuário que marcou a consulta)
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    // Relacionamento com ConsultaDisponivel (Consulta disponível que foi agendada)
    public function consultaDisponivel()
    {
        return $this->belongsTo(ConsultaDisponivel::class, 'id_consulta_disponivel');
    }
}

