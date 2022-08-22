<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }
    public function store(Request $request)
    {
        // dd($request);
        // dd($request->get('username'));

        // Validación
        $this->validate($request, [
            // 'name' => ['required', 'min:5'],
            'name' => 'required|min:5|max:30',
            'username' => 'required|unique:users|min:3|max:30',
            'email' => 'required|unique:users|email|max:60',
            'password' => 'required|confirmed|min:8'
        ]);

        User::create([
            'name'=> $request->name,
            'username'=> $request->username,
            'email'=> $request->email,
            'password'=> Hash::make($request->password), 
        ]);
    }
}
