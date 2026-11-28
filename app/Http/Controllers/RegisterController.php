<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\Rol;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function showRegister()
    {
        if (Auth::check()) {
            return redirect(Auth::user()->rutaInicio());
        }

        return view('auth.register');
    }

    public function register(Request $request)
    {
        $datos = $request->validate([
            'primer_nombre' => ['required', 'string', 'max:100'],
            'segundo_nombre' => ['nullable', 'string', 'max:100'],
            'primer_apellido' => ['required', 'string', 'max:100'],
            'segundo_apellido' => ['nullable', 'string', 'max:100'],
            'email' => ['required', 'email', 'max:150', 'unique:users,email'],
            'telefono' => ['nullable', 'regex:/^[0-9]{8,15}$/', 'unique:users,telefono'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ], [
            'primer_nombre.required' => 'El primer nombre es obligatorio.',
            'primer_apellido.required' => 'El primer apellido es obligatorio.',
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email' => 'Ingresa un correo electrónico válido.',
            'email.unique' => 'Este correo ya está registrado.',
            'telefono.regex' => 'El teléfono debe tener entre 8 y 15 dígitos, sin espacios ni guiones.',
            'telefono.unique' => 'Este teléfono ya está registrado.',
            'password.required' => 'La contraseña es obligatoria.',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
            'password.confirmed' => 'La confirmación de la contraseña no coincide.',
        ]);

        $rolUsuario = Rol::where('nombre', 'Usuario')->first();

        if (! $rolUsuario) {
            abort(500, 'Falta el rol Usuario en la tabla roles. Ejecuta php artisan db:seed.');
        }

        $user = User::create($datos + ['rol_id' => $rolUsuario->id]);

        Auth::login($user);
        $request->session()->regenerate();

        return redirect($user->rutaInicio())
            ->with('success', '¡Cuenta creada con éxito! Bienvenido a UniLearning, ' . $user->primer_nombre . '.');
    }
}
