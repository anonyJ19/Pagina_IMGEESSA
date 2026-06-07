<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ChatbotController extends Controller
{
    /**
     * Procesa los mensajes del usuario usando la API de OpenAI.
     */
    public function chat(Request $request)
    {
        $request->validate([
            'message' => 'required|string|max:1000',
            'history' => 'nullable|array',
        ]);

        $userMessage = $request->input('message');
        $history = $request->input('history', []);

        // Sistema central de personalidad (Cerebro Inteligente)
        $systemPrompt = "Eres el asistente virtual experto de ventas y soporte de IMGEESSA Soluciones Integrales HSEQ.
Tu objetivo es asesorar a los clientes sobre nuestros productos industriales, equipos de protección personal (EPP) y servicios corporativos de forma profesional, amigable y muy natural.

INFORMACIÓN DE CONTACTO Y UBICACIÓN:
- Celulares: 3108448788 - 3107696821
- Correos: Comercial@imgeessa.com, Direccioncomercial@imgeessa.com, Gerencia@imgeessa.com
- Dirección: Av carrera 30 # 75-61, Bogotá, Colombia.

SOBRE NUESTRA EMPRESA:
- Especialidades: Sistemas de Gestión (SST, Ambiental, Calidad), Ingeniería Química y Mediciones Higiénicas.
- Servicios específicos: Asesoría legal laboral (Reglamento Interno de Trabajo), Estabilidad Laboral Reforzada, y estudios de Higiene Industrial (ej. mediciones de ruido).
- Valores (C.R.E.C.E.): Calidad, Responsabilidad, Enfoque al cliente, Compromiso y Excelencia.

RESUMEN DE NUESTRO CATÁLOGO (EPP Y FERRETERÍA):
1. Protección contra caídas: Arneses (reata, poliuretano, kevlar, dieléctricos), eslingas, anclajes, líneas de vida, trípodes, sillas de suspensión.
2. Protección Craneal: Cascos tipo sombrero, cachucha, dieléctricos, cascos para contratistas, tafiletes y barbuquejos.
3. Protección Ocular y Facial: Gafas de seguridad (oscuras, claras, in/out), monogafas, caretas para soldador, visores de policarbonato y malla.
4. Protección Respiratoria: Mascarillas N95, respiradores de media cara y cara completa, cartuchos y filtros.
5. Protección Auditiva: Tapones de inserción y protectores tipo copa (orejeras).
6. Protección para Manos: Guantes de vaqueta, carnaza, soldador, nitrilo, poliuretano, anticorte, dieléctricos y mangas de Kevlar.
7. Protección Corporal y Calzado: Chalecos reflectivos, overoles, trajes químicos/impermeables, delantales, botas de caucho (safety, bomberos), botas de cuero y tenis industriales.
8. Detección de Gases y Medición: Detectores multigas (Altair), luxómetros, alcoholímetros, dataloggers, cámaras termográficas.
9. Señalización y Bloqueo (LOTO): Avisos, conos, cintas, bloqueadores de válvulas, candados, pinzas, tarjetas.
10. Emergencias y Contraincendios: Estaciones lavaojos, botiquines, camillas, extintores, absorbentes, kits para derrames.
11. Izaje, Residuos y Ferretería: Eslingas de carga, grilletes, poleas, malacates, canecas de colores, taladros, pulidoras, sierras, motosierras, hidrolavadoras, soldadores.

REGLAS ESTRICTAS E INQUEBRANTABLES:
1. Actúa como asesor. Si alguien menciona que va a soldar, recomiéndale equipos de kevlar o cuero, caretas de soldar y gafas. Analiza lo que necesitan.
2. NUNCA inventes precios. Para precios o cotizaciones, indica SIEMPRE que escriban a Comercial@imgeessa.com.
3. SOLO respondes temas de IMGEESSA. Si preguntan cosas externas (recetas, chistes, política, programación, etc.), responde cortésmente que solo puedes asesorar sobre productos industriales y servicios de IMGEESSA.
4. Responde de manera fluida, no como un robot copiando y pegando viñetas. Mantén tus respuestas precisas y amables.";

        $messages = [
            ['role' => 'system', 'content' => $systemPrompt]
        ];

        // Añadir contexto previo para memoria de conversación
        $recentHistory = array_slice($history, -6);
        foreach ($recentHistory as $msg) {
            if (isset($msg['role']) && isset($msg['content']) && in_array($msg['role'], ['user', 'assistant'])) {
                $messages[] = [
                    'role' => $msg['role'],
                    'content' => $msg['content']
                ];
            }
        }

        $messages[] = ['role' => 'user', 'content' => $userMessage];

        try {
            $apiKey = env('OPENAI_API_KEY');

            if ($apiKey) {
                // Intentamos conectar con la IA de OpenAI (corrigiendo endpoint y modelo)
                $response = Http::withoutVerifying()->withHeaders([
                    'Authorization' => 'Bearer ' . $apiKey,
                    'Content-Type' => 'application/json',
                ])->timeout(10)->post('https://api.openai.com/v1/chat/completions', [
                    'model' => 'gpt-3.5-turbo', 
                    'messages' => $messages,
                    'temperature' => 0.3,
                    'max_tokens' => 500,
                ]);

                if ($response->successful()) {
                    $result = $response->json();
                    $reply = $result['choices'][0]['message']['content'];
                    return response()->json(['reply' => $reply]);
                } else {
                    Log::warning('La API falló o no tiene saldo (Cambiando a Cerebro Local): ' . $response->body());
                }
            }
        } catch (\Exception $e) {
            Log::warning('Error de conexión con OpenAI (Cambiando a Cerebro Local): ' . $e->getMessage());
        }

        // -------------------------------------------------------------
        // INTENTO 2: CEREBRO LOCAL GRATUITO (FALLBACK / RESPALDO)
        // Se ejecuta si la IA falla (por falta de saldo, error, etc.)
        // -------------------------------------------------------------
        $userMessageLower = strtolower(trim($userMessage));
        $reply = "";

        if (str_contains($userMessageLower, 'hola') || str_contains($userMessageLower, 'buenos dias') || str_contains($userMessageLower, 'buenas tardes')) {
            $reply = "¡Hola! Qué gusto saludarte. Soy el asistente de IMGEESSA. ¿En qué te puedo ayudar hoy? Puedes preguntarme sobre nuestros servicios, nuestro catálogo industrial o contacto.";
        } elseif (str_contains($userMessageLower, 'servicio') || str_contains($userMessageLower, 'hacen') || str_contains($userMessageLower, 'dedican')) {
            $reply = "En IMGEESSA somos especialistas en Sistemas de Gestión (SST, Ambiental, Calidad), Ingeniería Química y Mediciones Higiénicas. También distribuimos Equipos de Protección Personal (EPP) y herramientas industriales. ¿Qué buscas en específico?";
        } elseif (str_contains($userMessageLower, 'caida') || str_contains($userMessageLower, 'altura') || str_contains($userMessageLower, 'arnes') || str_contains($userMessageLower, 'eslinga') || str_contains($userMessageLower, 'anclaje') || str_contains($userMessageLower, 'vida')) {
            $reply = "Ofrecemos protección contra caídas y espacios confinados: arneses (en reata, poliuretano, kevlar, dieléctricos), eslingas con absorbedor, anclajes, líneas de vida, sillas de suspensión y trípodes para rescate.";
        } elseif (str_contains($userMessageLower, 'cabeza') || str_contains($userMessageLower, 'casco') || str_contains($userMessageLower, 'craneal') || str_contains($userMessageLower, 'tafilete')) {
            $reply = "En protección craneal (cascos) tenemos tipo sombrero, cachucha, dieléctricos (clase E y G), cascos para contratistas y protectores de barbilla o barbuquejos de múltiples puntos.";
        } elseif (str_contains($userMessageLower, 'ojo') || str_contains($userMessageLower, 'gafa') || str_contains($userMessageLower, 'lente') || str_contains($userMessageLower, 'monogafa') || str_contains($userMessageLower, 'visual')) {
            $reply = "Para protección ocular contamos con gafas de seguridad (claras, oscuras, in/out, anti-empañantes), monogafas, lentes para altas temperaturas y gafas para oxicorte o soldadura.";
        } elseif (str_contains($userMessageLower, 'cara') || str_contains($userMessageLower, 'facial') || str_contains($userMessageLower, 'careta') || str_contains($userMessageLower, 'visor')) {
            $reply = "Manejamos protección facial completa: caretas para soldador (fotosensibles, electrónicas), visores en policarbonato, mallas y soportes adaptables a cascos.";
        } elseif (str_contains($userMessageLower, 'respirador') || str_contains($userMessageLower, 'tapaboca') || str_contains($userMessageLower, 'mascara') || str_contains($userMessageLower, 'filtro') || str_contains($userMessageLower, 'cartucho')) {
            $reply = "En protección respiratoria distribuimos mascarillas N95, respiradores de media cara y cara completa (silicona y elastómeros), así como cartuchos y filtros para gases, vapores ácidos y material particulado.";
        } elseif (str_contains($userMessageLower, 'oido') || str_contains($userMessageLower, 'auditiva') || str_contains($userMessageLower, 'tapon') || str_contains($userMessageLower, 'fono') || str_contains($userMessageLower, 'orejera')) {
            $reply = "Para protección auditiva ofrecemos tapones de inserción (descartables y de silicona, con/sin cordón) y protectores tipo copa (orejeras) adaptables a casco o con diadema.";
        } elseif (str_contains($userMessageLower, 'mano') || str_contains($userMessageLower, 'guante') || str_contains($userMessageLower, 'manga')) {
            $reply = "Tenemos una amplia línea de protección para manos: guantes de vaqueta, carnaza, soldador, nitrilo, poliuretano, anticorte, dieléctricos y mangas protectoras de Kevlar.";
        } elseif (str_contains($userMessageLower, 'cuerpo') || str_contains($userMessageLower, 'overol') || str_contains($userMessageLower, 'chaleco') || str_contains($userMessageLower, 'ropa') || str_contains($userMessageLower, 'pantalon') || str_contains($userMessageLower, 'delantal') || str_contains($userMessageLower, 'impermeable')) {
            $reply = "Ofrecemos ropa de trabajo y protección corporal: chalecos reflectivos, overoles desechables, camisas/pantalones de dotación, trajes impermeables, delantales de carnaza y trajes químicos.";
        } elseif (str_contains($userMessageLower, 'pie') || str_contains($userMessageLower, 'bota') || str_contains($userMessageLower, 'zapato') || str_contains($userMessageLower, 'calzado')) {
            $reply = "En protección para pies tenemos botas de caucho (safety, impermeables, bomberos), botas de seguridad en cuero (dieléctricas, antideslizantes) y tenis de seguridad.";
        } elseif (str_contains($userMessageLower, 'gas') || str_contains($userMessageLower, 'detector') || str_contains($userMessageLower, 'medicion') || str_contains($userMessageLower, 'luxometro') || str_contains($userMessageLower, 'alcoholimetro')) {
            $reply = "Manejamos detectores multigas (Altair), detectores simples, luxómetros, alcoholímetros, termohigrómetros, dataloggers, contadores de partículas y cámaras termográficas.";
        } elseif (str_contains($userMessageLower, 'señal') || str_contains($userMessageLower, 'aviso') || str_contains($userMessageLower, 'letrero') || str_contains($userMessageLower, 'cono') || str_contains($userMessageLower, 'cinta') || str_contains($userMessageLower, 'barrera')) {
            $reply = "Vendemos señalización vial e industrial: avisos de seguridad/evacuación, conos plegables, cintas de peligro, resaltos, barreras plásticas y luces de emergencia.";
        } elseif (str_contains($userMessageLower, 'bloqueo') || str_contains($userMessageLower, 'etiquetado') || str_contains($userMessageLower, 'candado') || str_contains($userMessageLower, 'loto') || str_contains($userMessageLower, 'tarjeta') || str_contains($userMessageLower, 'pinza')) {
            $reply = "Para Bloqueo y Etiquetado (LOTO) ofrecemos: bloqueadores de válvulas, candados dieléctricos y de acero, pinzas múltiples, tarjetas de no operar y maletines.";
        } elseif (str_contains($userMessageLower, 'emergencia') || str_contains($userMessageLower, 'botiquin') || str_contains($userMessageLower, 'camilla') || str_contains($userMessageLower, 'lavaojo') || str_contains($userMessageLower, 'alarma')) {
            $reply = "Contamos con equipos de emergencia: estaciones lavaojos, botiquines portátiles y empotrables, camillas espinales, inmovilizadores cervicales y alarmas de humo.";
        } elseif (str_contains($userMessageLower, 'fuego') || str_contains($userMessageLower, 'incendio') || str_contains($userMessageLower, 'extintor') || str_contains($userMessageLower, 'derrame') || str_contains($userMessageLower, 'absorbente')) {
            $reply = "Ofrecemos extintores multipropósito, satélites, almohadas y barreras absorbentes, y kits completos para control de derrames químicos o de hidrocarburos.";
        } elseif (str_contains($userMessageLower, 'carga') || str_contains($userMessageLower, 'izaje') || str_contains($userMessageLower, 'grillete') || str_contains($userMessageLower, 'polea') || str_contains($userMessageLower, 'malacate')) {
            $reply = "Para izaje de cargas manejamos: eslingas de carga, ramales, tensores, grilletes, ganchos ojo, poleas, brazos de grúa y malacates.";
        } elseif (str_contains($userMessageLower, 'residuo') || str_contains($userMessageLower, 'basura') || str_contains($userMessageLower, 'caneca') || str_contains($userMessageLower, 'reciclaje') || str_contains($userMessageLower, 'guardian')) {
            $reply = "Distribuimos canecas de colores (rojas, verdes, grises, blancas), canecas de doble compartimiento y guardianes para elementos cortopunzantes.";
        } elseif (str_contains($userMessageLower, 'herramienta') || str_contains($userMessageLower, 'ferreteria') || str_contains($userMessageLower, 'taladro') || str_contains($userMessageLower, 'pulidora') || str_contains($userMessageLower, 'sierra') || str_contains($userMessageLower, 'planta') || str_contains($userMessageLower, 'aspiradora')) {
            $reply = "Distribuimos maquinaria y ferretería: taladros (inalámbricos, percutores, rotomartillos), pulidoras, sierras, motosierras, hidrolavadoras, compresores, andamios y soldadores.";
        } elseif (str_contains($userMessageLower, 'contacto') || str_contains($userMessageLower, 'telefono') || str_contains($userMessageLower, 'correo') || str_contains($userMessageLower, 'llamar')) {
            $reply = "Puedes contactarnos a los celulares 3108448788 o 3107696821. También puedes escribirnos a Comercial@imgeessa.com o Direccioncomercial@imgeessa.com. ¡Estaremos encantados de atenderte!";
        } elseif (str_contains($userMessageLower, 'ubicacion') || str_contains($userMessageLower, 'direccion') || str_contains($userMessageLower, 'donde estan')) {
            $reply = "Nuestras oficinas se encuentran ubicadas en la Av carrera 30 # 75-61, en Bogotá, Colombia.";
        } elseif (str_contains($userMessageLower, 'precio') || str_contains($userMessageLower, 'costo') || str_contains($userMessageLower, 'catalogo') || str_contains($userMessageLower, 'comprar') || str_contains($userMessageLower, 'cotiza')) {
            $reply = "Manejamos muchísimas referencias. Para conocer nuestros precios o solicitar nuestro catálogo completo, por favor escríbenos a Comercial@imgeessa.com. ¡Te armaremos una propuesta a tu medida!";
        } elseif (str_contains($userMessageLower, 'valores') || str_contains($userMessageLower, 'mision') || str_contains($userMessageLower, 'crece')) {
            $reply = "Nuestros valores se resumen en el acrónimo C.R.E.C.E.: Calidad, Responsabilidad, Enfoque al cliente, Compromiso y Excelencia.";
        } elseif (str_contains($userMessageLower, 'codigo') || str_contains($userMessageLower, 'programar') || str_contains($userMessageLower, 'politica') || str_contains($userMessageLower, 'chiste') || str_contains($userMessageLower, 'receta')) {
            $reply = "Lo siento, soy un asistente virtual estrictamente configurado para asesorarte solo en productos industriales, protección personal (EPP), ferretería y servicios HSEQ de IMGEESSA.";
        } else {
            $reply = "Entiendo. Sin embargo, mi programación está restringida únicamente a nuestros productos industriales, protección personal (EPP) y servicios HSEQ de IMGEESSA. Te invito a explorar el menú o escribir a Comercial@imgeessa.com para mayor asistencia.";
        }

        // Simulamos el "escribiendo..." en caso de que OpenAI haya fallado y estemos usando el cerebro local
        usleep(800000);
        return response()->json(['reply' => $reply]);
    }
}
