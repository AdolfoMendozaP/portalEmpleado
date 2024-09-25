<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Routing\Redirector;

class LoginController extends Controller
{
    public function login(Request $request, Redirector $redirect)
    {
        //$credentials = $request->validate();
        $remember = $request->filled('remember');

        if (Auth::attempt($request->only('email', 'password'), $remember)) {
            $request->session()->regenerate();

            // Verifica el rol del usuario
            $user = Auth::user();
            if ($user->isAdmin()) {
                return $redirect->intended('dashboard')->with('status', 'Bienvenido Admin');
            } else {
                return $redirect->intended('welcome')->with('status', 'Bienvenido');
            }
        }


        throw ValidationException::withMessages([
            'email' => __('auth.failed')
        ]);
        //return redirect('login');
    
    }

    public function logout(Request $request, Redirector $redirect)
    {
        Auth::logout(); 
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return $redirect->to('/login')->with('status', 'Has cerrado sesión correctamente.'); 
    } 
}
