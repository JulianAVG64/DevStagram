<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    // Proteger ruta
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        return view('dashboard');
    }
}
