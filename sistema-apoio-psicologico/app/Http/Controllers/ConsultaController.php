<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Consulta;

class ConsultaController extends Controller
{
    public function mostrarConsultas()
    {
        // Obtém o usuário logado
        $usuario = auth()->user(); 

        // Filtra as consultas do usuário, incluindo a data de consultas_disponiveis
        $consultas = Consulta::where('id_user', $usuario->id) // Usando o campo     correto 'id_user'
                             ->whereHas('consultaDisponivel', function($query) {
                                 $query->whereDate('data', '>=', Carbon::today  ()); // Filtra pelas consultas futuras
                             })
                             ->get();

        // Retorna a view com as consultas
        return view('pages.home', compact('consultas'));
    }
}
