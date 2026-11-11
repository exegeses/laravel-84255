<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class LoginController extends Controller
{
    public function index() : View
    {
        return view('auth.login');
    }

    public function login(Request $request) : RedirectResponse
    {
        $credenciales = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if( auth()->attempt($credenciales) ){
            $request->session()->regenerate();
            /* redirige a la página que el usuario intentaba abrir
               antes de que lo mandaran al login.
               Si no había ninguna, va al dashboard. */
            return redirect()->intended( '/dashboard' );
        }

        // Si falla, retornar con un error general
        return back()
            //El error es genérico a propósito: no revela si falló el email o la contraseña.
            ->withErrors(['email' => 'El email o la contraseña no son correctos.'])
            //onlyInput('email') conserva el email escrito, pero nunca la contraseña.
            ->onlyInput('email');
    }

    public function logout(Request $request) : RedirectResponse
    {
        auth()->logout();
        // borramos los datos de la sesión actual.
        $request->session()->invalidate();
        // generamos un token CSRF nuevo.
        $request->session()->regenerateToken();
        return redirect('/');
    }

}
