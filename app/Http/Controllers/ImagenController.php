<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class ImagenController extends Controller
{
    public function store(Request $request)
    {
        $imagen = $request->file('file');

        // Generar nombre unico de imagen
        $nombreImagen = Str::uuid() . "." . $imagen->extension();

        // Crear instancia de imagen usando Intervention Image, va a estar un rato en memoria
        $manager = new ImageManager(Driver::class);
        $imagenServidor = $manager->read($imagen);

        // Modificar la imagen
        $imagenServidor->cover(1000, 1000);

        // Mover la imagen al servidor
        $imagenPath = public_path('uploads') . '/' . $nombreImagen;
        $imagenServidor->save($imagenPath);

        return response()->json(['imagen' => $nombreImagen]);
    }
}
