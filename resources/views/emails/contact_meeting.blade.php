<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva Solicitud de Reunión</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f4f4f5; padding: 20px; color: #333;">
    <div style="max-width: 600px; margin: 0 auto; background-color: #ffffff; padding: 30px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
        <h2 style="color: #0e1b4d; border-bottom: 2px solid #00d2d3; padding-bottom: 10px;">Nueva Solicitud de Reunión desde la Web</h2>
        
        <p>Has recibido una nueva solicitud de contacto con petición de agendar una reunión. Adjunto a este correo encontrarás la invitación para agregarla a tu calendario.</p>

        <h3 style="color: #0e1b4d; margin-top: 20px;">Detalles del Contacto</h3>
        <table style="width: 100%; border-collapse: collapse;">
            <tr>
                <td style="padding: 10px; border-bottom: 1px solid #eee; font-weight: bold; width: 30%;">Nombre:</td>
                <td style="padding: 10px; border-bottom: 1px solid #eee;">{{ $data['name'] }}</td>
            </tr>
            <tr>
                <td style="padding: 10px; border-bottom: 1px solid #eee; font-weight: bold;">Email:</td>
                <td style="padding: 10px; border-bottom: 1px solid #eee;"><a href="mailto:{{ $data['email'] }}">{{ $data['email'] }}</a></td>
            </tr>
            <tr>
                <td style="padding: 10px; border-bottom: 1px solid #eee; font-weight: bold;">Asunto:</td>
                <td style="padding: 10px; border-bottom: 1px solid #eee;">{{ $data['subject'] }}</td>
            </tr>
            <tr>
                <td style="padding: 10px; border-bottom: 1px solid #eee; font-weight: bold;">Fecha Propuesta:</td>
                <td style="padding: 10px; border-bottom: 1px solid #eee; color: #00d2d3; font-weight: bold;">{{ $data['meeting_date'] }}</td>
            </tr>
            <tr>
                <td style="padding: 10px; border-bottom: 1px solid #eee; font-weight: bold;">Hora Propuesta:</td>
                <td style="padding: 10px; border-bottom: 1px solid #eee; color: #00d2d3; font-weight: bold;">{{ $data['meeting_time'] }}</td>
            </tr>
        </table>

        <h3 style="color: #0e1b4d; margin-top: 20px;">Mensaje</h3>
        <div style="background-color: #f8fafc; padding: 15px; border-radius: 5px; border-left: 4px solid #00d2d3; white-space: pre-wrap;">{{ $data['message'] }}</div>

        <div style="text-align: center; margin-top: 30px;">
            <a href="{{ $calendarUrl }}" target="_blank" style="background-color: #00d2d3; color: #ffffff; padding: 12px 25px; text-decoration: none; border-radius: 5px; font-weight: bold; font-size: 16px; display: inline-block;">📅 Agendar en Google Calendar (y añadir Meet)</a>
            <p style="font-size: 13px; color: #666; margin-top: 10px;">Al hacer clic, se abrirá Google Calendar con los datos ya llenos. Solo dale a "Añadir videollamada de Meet" y Guardar.</p>
        </div>

        <p style="margin-top: 30px; font-size: 12px; color: #888; text-align: center;">
            Este mensaje fue enviado automáticamente desde el formulario de contacto de IMGEESSA.
        </p>
    </div>
</body>
</html>
