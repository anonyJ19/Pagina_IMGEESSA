<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMeetingMail;
use Illuminate\Support\Facades\Log;

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
        ]);

        try {
            // Enviar a direccioncomercial@imgeessa.com
            Mail::to('direccioncomercial@imgeessa.com')->send(new ContactMeetingMail($validated));
            
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
