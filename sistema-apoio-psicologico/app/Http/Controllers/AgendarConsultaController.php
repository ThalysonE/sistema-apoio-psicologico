<?php

namespace App\Http\Controllers;

use App\Models\ConsultaDisponivel;
use App\Models\Consulta;
use Illuminate\Http\Request;

class AgendarConsultaController extends Controller
{
    // Exibir o formulário de agendamento de consultas
    public function index()
    {
        // Pega as consultas disponíveis para o usuário
        $consultasDisponiveis = ConsultaDisponivel::with('psicologo')->whereDate('data', '>=', now())->get();

        return view('agendar-consulta', compact('consultasDisponiveis'));
    }

    // Processar o agendamento de consulta
    public function store(Request $request)
    {
        $request->validate([
            'id_consulta_disponivel' => 'required|exists:consultas_disponiveis,id',
        ]);

        // Cria uma nova consulta para o usuário logado
        Consulta::create([
            'id_user' => auth()->user()->id,
            'id_consulta_disponivel' => $request->id_consulta_disponivel,
        ]);

        return redirect()->route('home')->with('success', 'Consulta agendada com sucesso!');
    }
}

