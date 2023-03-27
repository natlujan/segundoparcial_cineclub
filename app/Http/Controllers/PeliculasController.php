<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelicula;
use App\Models\Genero;
use App\Models\GeneroPelicula;

class PeliculasController extends Controller
{
    public function index(){
        $peliculas = Pelicula::all();
        $generos = Genero::all();
        $generos_pelicula = GeneroPelicula::all();
        $argumentos['peliculas'] = $peliculas;
        $argumentos['generos'] = $generos;
        $argumentos['generosPelicula'] = $generos_pelicula;
        return view("menu", $argumentos);
    }

    public function pelicula($id){
        $pelicula = Pelicula::find($id);
        $generosPelicula = GeneroPelicula::where('id_pelicula', $id)->pluck('id_genero');
        $pelicula->generos = "";
        foreach($generosPelicula as $generoPelicula)
        {
            $genero = Genero::find($generoPelicula);
            $pelicula->generos .= $genero->nombre . ". ";
        }
        $argumentos['pelicula'] = $pelicula;
        return view("pelicula", $argumentos);
    }

    public function create(){
        $generos = Genero::all();
        $argumentos['generos'] = $generos;
        return view("agregarPelicula", $argumentos);
    }

    public function store(Request $request){

        $nuevaPelicula = new Pelicula();
        
        $nuevaPelicula->titulo = $request->input('titulo');
        $nuevaPelicula->director = $request->input('director');
        $nuevaPelicula->ano = $request->input('ano');
        $nuevaPelicula->descripcion = $request->input('descripcion');

        $nuevaPelicula->duracion_minutos =  $request->input('duracion');

        if($request->hasFile('poster')){
            $path = $request->file('poster')->store('public/posters');
            $nuevaPelicula->poster = $request->file('poster')->hashName();
        }

        $nuevaPelicula->save();

        $generos = $request->input('generos');
        foreach ($generos as $genero)
        {
            
            $nuevoGeneroPelicula = new GeneroPelicula();
            $nuevoGeneroPelicula->id_genero = $genero;
            $nuevoGeneroPelicula->id_pelicula = $nuevaPelicula->id;

            $nuevoGeneroPelicula->save();
        }

        return redirect()->route('peliculas.index')->with('exito', "Se creó la pelicula exitosamente");
    }

    public function edit($id) {
        $pelicula = Pelicula::find($id);
        $generos = Genero::all();
        
        $argumentos['generos'] = $generos;
        $argumentos['pelicula'] = $pelicula;
        return view('editarPelicula', $argumentos);
    }

    public function update(Request $request, $id) {
        $pelicula = Pelicula::find($id);
        if($pelicula) {

            $pelicula->titulo = $request->input('titulo');
            $pelicula->director = $request->input('director');
            $pelicula->ano = $request->input('ano');
            $pelicula->descripcion = $request->input('descripcion');
            $pelicula->duracion_minutos =  $request->input('duracion');

            if($request->hasFile('poster')){
                $path = $request->file('poster')->store('public/posters');
                $pelicula->poster = $request->file('poster')->hashName();
            }
            $pelicula->save();

            return redirect()->route('peliculas.edit', $id)->with('exito', "Se actualizó la pelicula exitosamente");
        }

        return redirect()->route('peliculas.index')->with('error', "No se encontró pelicula $id");
        
    }

    public function destroy(Request $request, $id) {
        $pelicula = Pelicula::find($id);
        $pelicula->activo = 0;
        $pelicula->save();

        return redirect()->route('peliculas.index')->with('exito', "Se eliminó la pelicula exitosamente");

    }
}
