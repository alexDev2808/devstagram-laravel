<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{

    // Proteger ruta(controlador)
    public function __construct() {
        $this->middleware("auth");
    }

    public function index( User $user ) {
        
        return view('dashboard', [
            'user'=> $user
        ]);
    }
}
