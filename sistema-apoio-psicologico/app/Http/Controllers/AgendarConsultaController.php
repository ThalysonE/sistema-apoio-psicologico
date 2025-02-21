<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Consulta;
use App\Models\ConsultaDisponivel;
use Illuminate\Support\Facades\Auth;

class AgendarConsultaController extends Controller
{
    public function index()
    {
        $consultasDisponiveis = ConsultaDisponivel::with('psicologo')->get();
        return view('agendar_consulta', compact('consultasDisponiveis'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_consulta_disponivel' => 'required|exists:consultas_disponiveis,id',
        ]);

        Consulta::create([
            'id_user' => Auth::id(),
            'id_consulta_disponivel' => $request->id_consulta_disponivel,
        ]);

        return redirect()->route('agendar.consulta')->with('success', 'Consulta agendada com sucesso!');
    }
}


