<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

class UsuariosController extends Controller
{
    public function index(){
        return view("agregarUsuario");
    }

    public function store(Request $request){

        $nuevoUsuario = new Usuario();
        
        $nuevoUsuario->nombre = $request->input('nombre');
        $nuevoUsuario->correo = $request->input('correo');
        $nuevoUsuario->contrasena = $request->input('contrasena');

        $nuevoUsuario->id_tipo_usuario = 1;


        if($request->hasFile('foto')){
            $path = $request->file('foto')->store('public/foto');
            $nuevoUsuario->foto = $request->file('foto')->hashName();
        }

        $nuevoUsuario->save();

        return redirect()->route('peliculas.index')->with('exito', "Se creó el usuario exitosamente");;
    }

    public function edit($id) {
        $usuario = Usuario::find($id);
        
        $argumentos['usuario'] = $usuario;
        return view('editarUsuario', $argumentos);
    }

    public function update(Request $request, $id) {
        $usuario = Usuario::find($id);
        if($usuario) {

            $usuario->nombre = $request->input('nombre');
            $usuario->correo = $request->input('correo');
            $usuario->contrasena = $request->input('contrasena');

            if($request->hasFile('foto')){
                $path = $request->file('foto')->store('public/foto');
                $usuario->foto = $request->file('foto')->hashName();
            }
            $usuario->save();

            return redirect()->route('usuarios.edit', $id)->with('exito', "Se actualizó el usuario exitosamente");
        }

        return redirect()->route('usuarios.index')->with('error', "No se encontró usuario $id");
        
    }

    public function destroy(Request $request, $id) {
        $usuario = Usuario::find($id);
        $usuario->activo = 0;
        $usuario->save();

        return redirect()->route('peliculas.index')->with('exito', "Se eliminó el usuario exitosamente");

    }
}
