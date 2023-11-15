<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Usuario;

class UsuarioController extends Controller
{
    //
    public function index(){
        $usuarios = Usuario::all();

        return view('usuarios', compact('usuarios'));
    }

    public function create(){
        return view('crearUsuario');
    }

    public function store(Request $request){
        $usuario= new Usuario();
        $usuario->usuario = $request->input("usuario");
        $usuario->nombre = $request->input("nombre");
        $usuario->correo = $request->input("correo");
        $usuario->password = $request->input("password");
        $usuario->save();
        
        return redirect('usuario.inicio');
    }

    public function editar($id){
        $usuario = Usuario::find($id);
        return view('editarUsuario', compact('usuario'));
    }

    public function update(Request $request, $id){
        $usuario = Usuario::find($id);
        $usuario->usuario = $request->input("usuario");
        $usuario->nombre = $request->input("nombre");
        $usuario->correo = $request->input("correo");
        $usuario->password = $request->input("password");
        $usuario->update();

        return redirect()->route('usuario.inicio');
    }

    public function delete(Request $request, $id){
        $usuario = Usuario::find($id);

        if($usuario <> null){
            return $usuario;
        }

    }
}
