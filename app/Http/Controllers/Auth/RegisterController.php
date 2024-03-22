<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index() {
        return view("auth.register");
    }

    public function store( Request $request ) {

        // Validacion 
        $this->validate($request, [
            'name' => 'required|min:3',
            'username' => 'required|unique:users,name|min:3|max:20',
            'email' => 'required|unique:users,email|email|max:50',
            'password'=> 'required'
        ]);
    }


}
