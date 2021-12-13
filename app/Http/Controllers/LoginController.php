<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    // controller halaman login
    public function login()
    {

        return view('login');
    }

    // controller login
    public function authenticate(Request $request)
    {
        // proses validasi

        // rules validasi
        $validator = Validator::make($request->all(),
        [
            'username' => 'required',
            'password' => 'required',
        ],
        // pesan validasi
        [
            // username
            'username.required' => "username harus diisi",
            // password
            'password.required' => "password harus diisi",
        ]
        );

        $credentials = $validator->validated();

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return back()->with('errorLogin', 'Invalid Login');
    }

    // controller logout
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
