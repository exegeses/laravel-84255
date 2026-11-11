<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Validation\Rules\Password;

class RegisterController extends Controller
{
    public function create() : View
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $datos = $request->validate(
                [
                    'name'=>['required','string','max:255'],
                    'email'=>['required','email','unique:users,email'],
                // confirmed exige un campo password_confirmation que coincida.
                 //   'password'=>['required|min:8|confirmed'],
                'password' => ['required','string','confirmed',
                    Password::min(8)
                        ->letters()->mixedCase()->numbers()],
                ]
        );
        $user = User::create($datos);
        // auth()->login($user); // autologin
        // $request->session()->regenerate();
        return redirect('/login');
    }
}
