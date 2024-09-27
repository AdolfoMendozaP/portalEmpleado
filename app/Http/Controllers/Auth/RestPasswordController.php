<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;

class RestPasswordController extends Controller
{
    public function showResetForm(Request $request, $token = null)
    {
        return view ('recovery.reset')->with(['token' => $token, 'email' => $request->email]);
    }

    public function reset(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
            'token' => 'required'
        ]);

        $response = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password){
                $user->password = bcrypt($password);
                $user->save();
            }
        );

        return $response == Password::PASSWORD_RESET
        ? redirect()->route('login')->with('status', 'La contraseña se ha cambiado con éxito. Ahora puedes iniciar sesión.')
        : back()->withErrors(['email' => 'Hubo un problema al restablecer la contraseña.']);
    }
}
