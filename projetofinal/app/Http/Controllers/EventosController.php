<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Eventos;

class EventosController extends Controller
{
    public function index()
    {
        $eventos = Eventos::all();
        return response()->json($eventos);
    }

    public function store(Request $request)
    {
        // Validação dos dados
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'orcamento' => 'required|numeric',
            'nome_evento' => 'required|string|max:255',
            'desc_evento' => 'required|string',
            'data_evento' => 'required|date',
            'local_evento' => 'required|string|max:255',
            'info_contato' => 'required|string|max:255',
            'status_proposta' => 'required|string|max:255',
        ]);

        // Criação do evento
        $evento = new Eventos();
        $evento->user_id = $request->user_id;
        $evento->orcamento = $request->orcamento;
        $evento->nome_evento = $request->nome_evento;
        $evento->desc_evento = $request->desc_evento;
        $evento->data_evento = $request->data_evento;
        $evento->local_evento = $request->local_evento;
        $evento->info_contato = $request->info_contato;
        $evento->status_proposta = $request->status_proposta;
        $evento->save();

        return response()->json($evento, 201);
    }

    public function show($id)
    {
        $evento = Eventos::findOrFail($id);
        return response()->json($evento);
    }

    public function update(Request $request, $id)
    {
        // Validação dos dados
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'orcamento' => 'required|numeric',
            'nome_evento' => 'required|string|max:255',
            'desc_evento' => 'required|string',
            'data_evento' => 'required|date',
            'local_evento' => 'required|string|max:255',
            'info_contato' => 'required|string|max:255',
            'status_proposta' => 'required|string|max:255',
        ]);

        // Atualização do evento
        $evento = Eventos::findOrFail($id);
        $evento->user_id = $request->user_id;
        $evento->orcamento = $request->orcamento;
        $evento->nome_evento = $request->nome_evento;
        $evento->desc_evento = $request->desc_evento;
        $evento->data_evento = $request->data_evento;
        $evento->local_evento = $request->local_evento;
        $evento->info_contato = $request->info_contato;
        $evento->status_proposta = $request->status_proposta;
        $evento->save();

        return response()->json($evento);
    }

    public function destroy($id)
    {
        $evento = Eventos::findOrFail($id);
        $evento->delete();

        return response()->json(null, 204);
    }
}
