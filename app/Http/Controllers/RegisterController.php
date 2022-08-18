<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
            'username' => 'required|min:3|max:30',
            'email' => 'required|email|max:60',
            'password' => 'required'
        ]);
    }
}
