<?php

namespace App\Http\Controllers;
use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index()
    {
        $clientes = Cliente::all();
        return response()->json($clientes);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|max:255',
            'email' => 'required|email|unique:clientes,email',
            'celular' => 'required',
        ]);

        $cliente = Cliente::create($validatedData);
        return response()->json($cliente, 201);
    }
    public function show($id)
    {
        $cliente = Cliente::find($id);
        if ($cliente) {
            return response()->json($cliente);
        } else {
            return response()->json(['message' => 'Cliente no encontrado'], 404);
        }
    }

    public function update(Request $request, $id)
    {
        $cliente = Cliente::find($id);
        if (!$cliente) {
            return response()->json(['message' => 'Cliente no encontrado'], 404);
        }

        $validatedData = $request->validate([
            'nombre' => 'required|max:255',
            'email' => 'required|email|unique:clientes,email,' . $cliente->id,
            'celular' => 'required',
        ]);

        $cliente->update($validatedData);
        return response()->json($cliente);
    }

    public function destroy($id)
    {
    $cliente = Cliente::find($id);
    if (!$cliente) {
        return response()->json(['message' => 'Cliente no encontrado'], 404);
    }

    $cliente->update(['isActive' => 0]);
    return response()->json(['message' => 'Cliente eliminado exitosamente'], 200);
    }

}
