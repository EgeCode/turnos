<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function indexLogin()
    {
        return view('login');
    }

    public function access(Request $request){

        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->intended('main');
        }
 
        return back()->withErrors([
            'username' => 'Las credenciales proporcionadas no son correctas',
        ])->onlyInput('pin');
    }
}
