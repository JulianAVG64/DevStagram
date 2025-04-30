<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

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
    }
}
