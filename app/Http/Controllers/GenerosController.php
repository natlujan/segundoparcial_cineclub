<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genero;

class GenerosController extends Controller
{
    public function index(){
        $generos = Genero::all();
        $argumentos['generos'] = $generos;
        return view("generos", $argumentos);
    }

    public function store(Request $request) {
        $nuevoGenero = new Genero();
        $nuevoGenero->nombre = $request->input('nombre');
        
        $nuevoGenero->save();
        return redirect()->route('generos.index')->with('exito', "Se creó el género exitosamente");
    }

    public function edit($id) {
        $genero = Genero::find($id);
        
        $argumentos['genero'] = $genero;
        return view('editarGenero', $argumentos);
    }

    public function update(Request $request, $id) {
        $genero = Genero::find($id);
        if($genero) {

            $genero->nombre = $request->input('nombre');

            $genero->save();

            return redirect()->route('generos.edit', $id)->with('exito', "Se actualizó el género exitosamente");
        }

        return redirect()->route('generos.index')->with('error', "No se encontró el género $id");
        
    }

    public function destroy(Request $request, $id) {
        $genero = Genero::find($id);
        $genero->activo = 0;
        $genero->save();
        return redirect()->route('generos.index')->with('exito', "Se eliminó el género exitosamente");
    }
}
