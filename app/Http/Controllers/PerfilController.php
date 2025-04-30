<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class PerfilController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(User $user) 
    {

        $this->authorize('view', $user);
        return view('perfil.index');
    }

    public function store(Request $request)
    {

        // Modificar el Request
        $request->request->add(['username' => Str::slug( $request->username )]);
        
        $this->validate($request, [
            'username' => ['required', 'unique:users,username,'.auth()->user()->id, 'min:3', 'max:20', 'not_in:twitter,editar-perfil']
        ]);

        if($request->imagen) {
            $imagen = $request->file('imagen');

            // Generar nombre unico de imagen
            $nombreImagen = Str::uuid() . "." . $imagen->extension();
    
            // Crear instancia de imagen usando Intervention Image, va a estar un rato en memoria
            $manager = new ImageManager(Driver::class);
            $imagenServidor = $manager->read($imagen);
    
            // Modificar la imagen
            $imagenServidor->cover(1000, 1000);
    
            // Mover la imagen al servidor
            $imagenPath = public_path('perfiles') . '/' . $nombreImagen;
            $imagenServidor->save($imagenPath);
        }

        // Guardar cambios
        $usuario = User::find(auth()->user()->id);
        $usuario->username = $request->username;
        $usuario->imagen = $nombreImagen ?? '';
        $usuario->save();

        // Redireccionar al usuario
        return redirect()->route('posts.index', $usuario->username);
    }
}
