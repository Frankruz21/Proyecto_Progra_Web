<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function showLogin()
    {
        if (Auth::check()) {
            return redirect(Auth::user()->rutaInicio());
        }

        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ], [
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email' => 'Ingresa un correo electrónico válido.',
            'password.required' => 'La contraseña es obligatoria.',
        ]);

        $intento = array_merge($credentials, ['activo' => true]);

        if (Auth::attempt($intento, $request->boolean('remember'))) {
            $request->session()->regenerate();   // evita la fijación de sesión

            return redirect()->intended(Auth::user()->rutaInicio())
                ->with('success', '¡Bienvenido, ' . Auth::user()->primer_nombre . '!');
        }

        return back()->withErrors([
            'email' => 'Las credenciales no coinciden con nuestros registros o la cuenta está inactiva.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')
            ->with('success', 'Has cerrado sesión correctamente.');
    }
}
