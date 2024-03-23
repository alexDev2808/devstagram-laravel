<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{

    // Proteger ruta(controlador)
    public function __construct() {
        $this->middleware("auth");
    }

    public function index() {
        
        return view('dashboard');
    }
}
