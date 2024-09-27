<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
//use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{
    public function showLinkRequestForm()
    {
        return view('recovery.forgot');
    }

    public function sendResetLinkEmail(Request $request)
{
    $request->validate(['email' => 'required|email|exists:users,email']);

    $response = Password::sendResetLink($request->only('email'));

    if ($response == Password::RESET_LINK_SENT) {
        session(['email' => $request->email]);

        return back()->with('status', 'Se ha enviado un enlace para restablecer la contraseña. Por favor, revisa tu correo electrónico.');
    }

    return back()->withErrors(['email' => 'Hubo un problema al enviar el enlace de restablecimiento.']);
}
}
