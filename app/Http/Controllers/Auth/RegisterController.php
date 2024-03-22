<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index() {
        return view("auth.register");
    }

    public function store( Request $request ) {

        // Modificar el Request
        $request->request->add(['username' => Str::slug($request->username)]); // convertirlo a una url

        // Validacion 
        $this->validate($request, [
            'name' => 'required|min:3',
            'username' => 'required|unique:users,username|min:3|max:20',
            'email' => 'required|unique:users,email|email|max:50',
            'password'=> 'required|confirmed|min:6' // confirmed para verificar que sean iguales con password_confirmation
        ]);

        User::create([
            'name' => $request->name,
            'username'=> $request->username,
            'email'=> $request->email,
            'password'=> Hash::make( $request->password ),
        ]);


        return redirect()->route('posts.index');

    }


}
