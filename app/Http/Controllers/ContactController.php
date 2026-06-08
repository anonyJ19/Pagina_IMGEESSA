<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMeetingMail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
            'meeting_date' => 'required|date',
            'meeting_time' => 'required|date_format:H:i',
            'recaptcha_token' => 'nullable|string',
        ]);

        if (env('RECAPTCHA_SECRET_KEY')) {
            if (empty($request->recaptcha_token)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validación de seguridad requerida (token de reCAPTCHA vacío).'
                ], 422);
            }

            try {
                $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
                    'secret' => env('RECAPTCHA_SECRET_KEY'),
                    'response' => $request->recaptcha_token,
                    'remoteip' => $request->ip()
                ]);

                $recaptchaResult = $response->json();

                if (!$recaptchaResult['success'] || (isset($recaptchaResult['score']) && $recaptchaResult['score'] < 0.5)) {
                    return response()->json([
                        'success' => false,
                        'message' => 'Validación de reCAPTCHA fallida. Por favor, intenta de nuevo.'
                    ], 422);
                }
            } catch (\Exception $e) {
                Log::error('Error validando reCAPTCHA: ' . $e->getMessage());
                return response()->json([
                    'success' => false,
                    'message' => 'Error al contactar con el servicio de validación de seguridad.'
                ], 500);
            }
        }

        try {
            // Enviar al correo configurado en el archivo .env (MAIL_TO_ADDRESS)
            $destinationEmail = env('MAIL_TO_ADDRESS', 'direccioncomercial@imgeessa.com');
            Mail::to($destinationEmail)->send(new ContactMeetingMail($validated));
            
            return response()->json([
                'success' => true,
                'message' => 'Mensaje enviado correctamente'
            ]);
        } catch (\Exception $e) {
            Log::error('Error enviando correo de contacto: ' . $e->getMessage());
            
            return response()->json([
                'success' => false,
                'message' => 'Ocurrió un error al enviar el mensaje. Intente nuevamente.'
            ], 500);
        }
    }
}
