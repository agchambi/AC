<?php

namespace App\Http\Controllers;

use App\Models\Prestamos;
use Illuminate\Http\Request;

class PrestamosController extends Controller
{
    public function index()
    {
    $prestamos = Prestamos::with('libro:id,titulo')
                        ->get()
                        ->map(function ($prestamo) {
                            return [
                                'id' => $prestamo->id,
                                'libro_id' => $prestamo->libro_id,
                                'cliente_id' => $prestamo->cliente_id,
                                'fecha_prestamo' => $prestamo->fecha_prestamo,
                                'dias_prestamo' => $prestamo->dias_prestamo,
                                'estado' => $prestamo->estado,
                                'isActive' => $prestamo->isActive,
                                'titulo_libro' => $prestamo->libro->titulo ?? null,
                            ];
                        });

    return response()->json($prestamos);
    }





    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'libro_id' => 'required|exists:libros,id',
            'cliente_id' => 'required|exists:clientes,id',
            'fecha_prestamo' => 'required|date',
            'dias_prestamo' => 'required|integer|min:1',
            'estado' => 'required|integer',
        ]);

        $prestamo = Prestamos::create($validatedData);
        return response()->json($prestamo, 201);
    }


    public function show($id)
    {
        $prestamo = Prestamos::find($id);
        if ($prestamo) {
            return response()->json($prestamo);
        } else {
            return response()->json(['message' => 'Préstamo no encontrado'], 404);
        }
    }


    public function update(Request $request, $id)
    {
        $prestamo = Prestamos::find($id);
        if (!$prestamo) {
            return response()->json(['message' => 'Préstamo no encontrado'], 404);
        }

        $validatedData = $request->validate([
            'libro_id' => 'required|exists:libros,id',
            'cliente_id' => 'required|exists:clientes,id',
            'fecha_prestamo' => 'required|date',
            'dias_prestamo' => 'required|integer|min:1',
            'estado' => 'required|integer',
        ]);

        $prestamo->update($validatedData);
        return response()->json($prestamo);
    }


    public function destroy($id)
    {
    $prestamo = Prestamos::find($id);
    if (!$prestamo) {
        return response()->json(['message' => 'Préstamo no encontrado'], 404);
    }
    $prestamo->update(['estado' => 1]);

    return response()->json(['message' => 'Préstamo eliminado exitosamente'], 200);
    }

}
