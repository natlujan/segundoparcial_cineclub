<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Funcion;
use App\Models\Pelicula;

class FuncionesController extends Controller
{
    public function index(){
        $funciones = Funcion::all();
        $peliculas = Pelicula::all();
        // foreach ($funciones as $funcion)
        // {
        //     $pelicula = Pelicula::where('id', $funcion->id_pelicula)->get();
        //     $funciones->pelicula = $pelicula;
        // }
        $argumentos['funciones'] = $funciones;
        $argumentos['peliculas'] = $peliculas;
        return view("historial", $argumentos);
    }
    
    public function store(Request $request, $id){

        $nuevaFuncion = new Funcion();
        
        $nuevaFuncion->sala = $request->input('sala');
        $nuevaFuncion->hora = $request->input('hora');
        $nuevaFuncion->fecha = $request->input('fecha');

        $nuevaFuncion->id_pelicula = $id;
        $nuevaFuncion->id_usuario = 1;


        $nuevaFuncion->save();

        return redirect()->route('peliculas.index')->with('exito', "Se creó la función exitosamente");
    }

    public function edit($id) {
        $funcion = Funcion::find($id);
        $pelicula = Pelicula::find($funcion->id_pelicula);
        
        $argumentos['funcion'] = $funcion;
        $argumentos['pelicula'] = $pelicula;
        return view('editarFuncion', $argumentos);
    }

    public function update(Request $request, $id) {
        $funcion = Funcion::find($id);
        if($funcion) {

            $funcion->sala = $request->input('sala');
            $funcion->fecha = $request->input('fecha');
            $funcion->hora = $request->input('hora');

            $funcion->save();

            return redirect()->route('funciones.edit', $id)->with('exito', "Se actualizó la función exitosamente");
        }

        return redirect()->route('funciones.index')->with('error', "No se encontró la función $id");
        
    }

    public function destroy(Request $request, $id) {
        $funcion = Funcion::find($id);
        $funcion->activo = 0;
        $funcion->save();
        return redirect()->route('funciones.index')->with('exito', "Se eliminó la función exitosamente");
    }
}
