<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactMeetingMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    public $calendarUrl;

    /**
     * Create a new message instance.
     */
    public function __construct($data)
    {
        $this->data = $data;
        $this->calendarUrl = $this->generateCalendarUrl();
    }

    private function generateCalendarUrl()
    {
        $date = $this->data['meeting_date'];
        $time = $this->data['meeting_time'];
        
        // Usar formato sin 'Z' para que use la zona horaria de quien abre el link
        $start = \Carbon\Carbon::parse("$date $time");
        $end = $start->copy()->addHour();

        $startStr = $start->format('Ymd\THis');
        $endStr = $end->format('Ymd\THis');
        
        $title = urlencode("Reunión con {$this->data['name']} - {$this->data['subject']}");
        $details = urlencode("Nombre: {$this->data['name']}\nEmail: {$this->data['email']}\n\nMensaje:\n{$this->data['message']}");
        $add = urlencode($this->data['email']);

        return "https://calendar.google.com/calendar/r/eventedit?text={$title}&dates={$startStr}/{$endStr}&details={$details}&add={$add}";
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Nueva Solicitud de Reunión: ' . $this->data['subject'],
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.contact_meeting',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        // Generar archivo .ics
        $icsContent = $this->generateIcs();

        return [
            Attachment::fromData(fn () => $icsContent, 'invite.ics')
                ->withMime('text/calendar; charset=utf-8; method=REQUEST'),
        ];
    }

    private function generateIcs()
    {
        $date = $this->data['meeting_date'];
        $time = $this->data['meeting_time'];
        
        // Crear las fechas en el formato YYYYMMDDTHHMMSSZ (UTC)
        // O más fácil, en tiempo local omitiendo la Z
        $start = \Carbon\Carbon::parse("$date $time");
        $end = $start->copy()->addHour(); // Asumimos reunión de 1 hora

        $startStr = $start->format('Ymd\THis');
        $endStr = $end->format('Ymd\THis');
        
        $now = \Carbon\Carbon::now()->format('Ymd\THis\Z');
        $uid = uniqid() . '@imgeessa.com';

        $organizerEmail = 'no-reply@imgeessa.com';
        $attendeeEmail = 'direccioncomercial@imgeessa.com';
        
        $summary = "Reunión con {$this->data['name']} - {$this->data['subject']}";
        $description = "Nombre: {$this->data['name']}\\nEmail: {$this->data['email']}\\n\\nMensaje:\\n{$this->data['message']}";

        // Aseguramos formato correcto iCalendar
        $ics = [
            "BEGIN:VCALENDAR",
            "VERSION:2.0",
            "PRODID:-//IMGEESSA//NONSGML v1.0//EN",
            "METHOD:REQUEST", // Esto hace que aparezca el botón Aceptar/Rechazar en correos
            "BEGIN:VEVENT",
            "UID:" . $uid,
            "DTSTAMP:" . $now,
            "DTSTART:" . $startStr,
            "DTEND:" . $endStr,
            "ORGANIZER;CN=IMGEESSA Web:mailto:" . $organizerEmail,
            "ATTENDEE;ROLE=REQ-PARTICIPANT;PARTSTAT=NEEDS-ACTION;RSVP=TRUE:mailto:" . $attendeeEmail,
            "SUMMARY:" . $summary,
            "DESCRIPTION:" . str_replace("\n", "\\n", $description),
            "STATUS:CONFIRMED",
            "SEQUENCE:0",
            "BEGIN:VALARM",
            "TRIGGER:-PT15M",
            "ACTION:DISPLAY",
            "DESCRIPTION:Reminder",
            "END:VALARM",
            "END:VEVENT",
            "END:VCALENDAR"
        ];

        return implode("\r\n", $ics);
    }
}
