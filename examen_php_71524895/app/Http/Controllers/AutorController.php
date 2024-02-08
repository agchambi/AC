<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AutorController extends Controller
{
    public function index()
    {
        $autores = Autor::all();
        return response()->json($autores);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|max:255',
        ]);

        $autor = Autor::create($validatedData);
        return response()->json($autor, 201);
    }

    public function show($id)
    {
        $autor = Autor::find($id);
        if (!$autor) {
            return response()->json(['message' => 'Autor no encontrado']);
        }
        return response()->json($autor);
    }

    public function update(Request $request, $id)
    {
        $autor = Autor::find($id);
        if (!$autor) {
            return response()->json(['message' => 'Autor no encontrado']);
        }

        $validatedData = $request->validate([
            'nombre' => 'required|max:255',
        ]);

        $autor->update($validatedData);
        return response()->json($autor);
    }

    public function destroy($id)
    {
    $autor = Autor::find($id);
    if (!$autor) {
        return response()->json(['message' => 'Autor no encontrado'], 404);
    }

    $autor->update(['isActive' => 0]);
    return response()->json(['message' => 'Autor eliminado exitosamente'], 200);
    }

}
