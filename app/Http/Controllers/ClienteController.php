<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    // Lista todos os clientes
    public function index()
    {
        $clientes = Cliente::latest()->paginate(10);
        return view('clientes.index', compact('clientes'));
    }

    // Mostra o formulário de criação
    public function create()
    {
        return view('clientes.create');
    }

    // Salva um novo cliente
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:100',
            'cpf' => 'required|string|max:45|unique:clientes,cpf',
            'data_nascimento' => 'required|date|before:today',
            'telefone' => 'required|string|max:45',
            'email' => 'required|email|max:80|unique:clientes,email',
        ]);

        Cliente::create($validated);

        return redirect()->route('clientes.index')
            ->with('sucesso', 'Cliente cadastrado com sucesso!');
    }

    // Mostra detalhes de um cliente
    public function show(Cliente $cliente)
    {
        return view('clientes.show', compact('cliente'));
    }

    // Mostra o formulário de edição
    public function edit(Cliente $cliente)
    {
        return view('clientes.edit', compact('cliente'));
    }

    // Atualiza o cliente
    public function update(Request $request, Cliente $cliente)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:100',
            'cpf' => 'required|string|max:45|unique:clientes,cpf,' . $cliente->idCliente . ',idCliente',
            'data_nascimento' => 'required|date|before:today',
            'telefone' => 'required|string|max:45',
            'email' => 'required|email|max:80|unique:clientes,email,' . $cliente->idCliente . ',idCliente',
        ]);

        $cliente->update($validated);

        return redirect()->route('clientes.index')
            ->with('sucesso', 'Cliente atualizado com sucesso!');
    }

    // Remove o cliente
    public function destroy(Cliente $cliente)
    {
        $cliente->delete();

        return redirect()->route('clientes.index')
            ->with('sucesso', 'Cliente removido com sucesso!');
    }
}
