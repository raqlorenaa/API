<?php

namespace App\Http\Controllers;
use App\Models\usuário;

use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return usuário::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        $novoUsuario = Usuário::create([
            'nome' => $request->input('nome'),
            'email' => $request->input('email'),
            'username' => $request->input('username'),
            'password' => bcrypt($request->input('password')),
            'tipo' => $request->input('tipo'),
        ]);
    
        // Retornar uma resposta adequada
        return response()->json([
            'message' => 'Usuário criado com sucesso',
            'data' => $novoUsuario
        ], 201); // Código de status 201 indica "Created"
    }

   
    public function show(string $id)
    {
        //
    }

 
    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
{
    // Recuperar o usuário com base no ID
    $usuário = Usuário::find($id);

    // Verificar se o usuário existe
    if (!$usuário) {
        return response()->json(['message' => 'Usuário não encontrado'], 404);
    }

    // Atribuir os novos valores ao usuário
    $usuário->nome = $request->input('nome');
    $usuário->email = $request->input('email');
    $usuário->username = $request->input('username');
    $usuário->password = bcrypt($request->input('password')); // Criptografar a nova senha
    $usuário->tipo = $request->input('tipo');

    // Salvar as alterações no banco de dados
    $usuário->save();

    // Retornar uma resposta adequada
    return response()->json([
        'message' => 'Usuário atualizado com sucesso',
        'data' => $usuário
    ]);
}

 
public function destroy(string $id)
{
    // Encontrar o usuário pelo id e deletá-lo
    $usuário = Usuário::findOrFail($id);
    $usuário->delete();

    // Retornar uma resposta vazia com código HTTP 204 (No Content)
    return response()->json([
        'message' => 'Usuário apagado com sucesso'],
         204);

    }
}
