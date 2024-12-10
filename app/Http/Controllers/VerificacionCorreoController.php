<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class VerificacionCorreoController extends Controller
{
    public function verificar(EmailVerificationRequest $request)
    {
        $request->fulfill(); // Marca el correo como verificado
        return redirect()->route('usuario.perfil')->with('message', '¡Correo verificado con éxito!');
    }

    // Reenvía el enlace de verificación
    public function reenviar(Request $request)
    {
        $request->user()->sendEmailVerificationNotification();
        return back()->with('message', '¡Se ha enviado un nuevo enlace de verificación!');
    }

}
