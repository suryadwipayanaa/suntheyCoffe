<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function register(){
        return view('tampilan.frontend.login.register',[
            'title' => 'Register'
        ]);
    }

    public function store(Request $request){
        $validateData = $request->validate([
            'nama' => 'required|min:5|',
            'username' => 'required|min:5|unique:users',
            'password' => 'required|min:5|max:16',
            'level' => 'required'
        ]);

        $validateData['password'] = bcrypt($validateData['password']);

        User::create($validateData);

        return redirect('/login')->with('sucess', 'Registration sucessfully, login please!');
    }
}
