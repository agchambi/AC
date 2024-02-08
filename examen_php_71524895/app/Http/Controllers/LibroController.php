<?php

namespace App\Http\Controllers;
use App\Models\Libro;
use Illuminate\Http\Request;

class LibroController extends Controller
{
     public function index()
     {
         $libros = Libro::all();
         return response()->json($libros);
     }

     public function store(Request $request)
     {
         $validatedData = $request->validate([
             'titulo' => 'required|max:255',

         ]);

         $libro = Libro::create($validatedData);
         return response()->json($libro, 201);
     }

     public function show($id)
     {
         $libro = Libro::find($id);
         if ($libro) {
             return response()->json($libro);
         } else {
             return response()->json(['message' => 'Libro no encontrado'], 404);
         }
     }

     public function update(Request $request, $id)
     {
         $libro = Libro::find($id);
         if (!$libro) {
             return response()->json(['message' => 'Libro no encontrado'], 404);
         }

         $validatedData = $request->validate([
             'titulo' => 'required|max:255',
         ]);

         $libro->update($validatedData);
         return response()->json($libro);
     }

     public function destroy($id)
     {
         $libro = Libro::find($id);
         if (!$libro) {
             return response()->json(['message' => 'Libro no encontrado'], 404);
         }

         $libro->update(['isActive' => 0]);
         return response()->json(['message' => 'Libro eliminado exitosamente'], 200);
     }

}
