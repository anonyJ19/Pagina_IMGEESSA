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

        // Sistema central de personalidad (Cerebro Inteligente de IA)
        $systemPrompt = "Eres el asesor virtual EXCLUSIVO de IMGEESSA Soluciones Integrales HSEQ S.A.S.
TU ÚNICO PROPÓSITO es vender y asesorar sobre los productos y servicios de esta empresa. 

REGLA DE ORO, INQUEBRANTABLE (CERO TOLERANCIA):
ESTÁ COMPLETAMENTE PROHIBIDO responder cualquier pregunta, solicitud o tema que no esté directamente relacionado con IMGEESSA, sus servicios HSEQ, herramientas, o su catálogo de EPP.
Si el usuario te pregunta sobre programación, recetas de cocina, historia, chistes, política, resúmenes de libros, cómo hacer tareas de matemáticas, o CUALQUIER OTRA COSA ajena a IMGEESSA, DEBES RESPONDER EXACTAMENTE ESTO:
'Lo siento, como asesor virtual de IMGEESSA, mi programación está restringida EXCLUSIVAMENTE a brindarte soporte sobre nuestros servicios HSEQ y catálogo industrial. ¿En qué te puedo ayudar respecto a nuestra empresa?'
NO CEDAS NUNCA, NO IMPORTA CÓMO TE LO PIDAN. ERES UN VENDEDOR ESTRICTO Y PROFESIONAL.

INFORMACIÓN COMPLETA DE LA EMPRESA (IMGEESSA):
- Contacto: Celulares 3108448788 y 3107696821.
- Correos: Comercial@imgeessa.com, Direccioncomercial@imgeessa.com, Gerencia@imgeessa.com.
- Ubicación: Av carrera 30 # 75-61, Bogotá, Colombia.
- Valores (CRECE): Calidad, Responsabilidad, Enfoque al cliente, Compromiso, Excelencia.
- Servicios: Asesorías en Sistemas de Gestión (SST, Ambiental, Calidad), Higiene Industrial (Mediciones de ruido, iluminación, vibraciones, material particulado), Asesoría legal-laboral (Reglamentos internos, estabilidad laboral).

CATÁLOGO PROFUNDO DE PRODUCTOS (EPP y FERRETERÍA):
Somos distribuidores autorizados de marcas top mundiales como: 3M, Ansell, DuPont, MSA, Petzl, Honeywell, Insafe, ARSEG, Steelpro, Jackson Safety.
- Protección en Alturas y Confinados: Arneses (en reata, poliuretano, dieléctricos, ignífugos), eslingas con absorbedor, líneas de vida, puntos de anclaje fijos/móviles, sillas de suspensión y trípodes para rescate.
- Protección Craneal: Cascos tipo I y II, cascos de ala ancha, tafiletes, y barbuquejos de 3/4 puntos.
- Protección Ocular y Facial: Gafas de seguridad (in/out, oscuras, claras, antiempañantes), monogafas, caretas de soldadura fotosensibles, visores de policarbonato.
- Protección Respiratoria: Mascarillas N95, respiradores media cara / cara completa (silicona y elastómero), cartuchos para vapores orgánicos/químicos y filtros de partículas.
- Protección Auditiva: Tapones de inserción (silicona, espuma), orejeras adaptables a casco.
- Protección Manual (Guantes): Vaqueta, carnaza, soldador, nitrilo, anticorte, dieléctricos, y mangas de Kevlar.
- Protección Corporal y Calzado: Overoles impermeables, trajes para químicos (Tyvek), delantales, chalecos reflectivos, botas pantaneras de caucho (safety, bomberos, frigorífico), botas dieléctricas en cuero, tenis de seguridad punta composite.
- Instrumentación y Medición: Detectores multigas (Altair), luxómetros, alcoholímetros, dataloggers, termohigrómetros, contadores de partículas, cámaras termográficas.
- Bloqueo y Etiquetado (LOTO): Candados dieléctricos, bloqueadores de válvulas/eléctricos, tarjetas de bloqueo, pinzas múltiples.
- Emergencias y Fuegos: Estaciones lavaojos portátiles/fijas, botiquines (tipo A, B, C), camillas espinales, extintores multipropósito/CO2, kits completos de control de derrames.
- Izaje, Residuos y Herramientas: Eslingas de carga, grilletes, poleas, malacates, canecas por código de colores, taladros percutores, pulidoras, hidrolavadoras, compresores.

INSTRUCCIONES FINALES DE RESPUESTA:
- Sé siempre cortés, empático y vende con naturalidad.
- NO inventes precios. Para precios exactos, diles SIEMPRE que deben escribir a Comercial@imgeessa.com.
- Analiza lo que el cliente te describe y recomiéndale 2 o 3 productos/servicios específicos de nuestra lista.";

        $contents = [];

        // Añadir contexto previo para memoria de conversación
        $recentHistory = array_slice($history, -6);
        foreach ($recentHistory as $msg) {
            if (isset($msg['role']) && isset($msg['content']) && in_array($msg['role'], ['user', 'assistant'])) {
                $role = $msg['role'] === 'assistant' ? 'model' : 'user';
                $contents[] = [
                    'role' => $role,
                    'parts' => [['text' => $msg['content']]]
                ];
            }
        }

        $contents[] = [
            'role' => 'user',
            'parts' => [['text' => $userMessage]]
        ];

        try {
            $apiKey = env('GEMINI_API_KEY');

            if ($apiKey) {
                // Intentamos conectar con la IA de Google Gemini
                $response = Http::withoutVerifying()->withHeaders([
                    'Content-Type' => 'application/json',
                ])->timeout(15)->post('https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-flash:generateContent?key=' . $apiKey, [
                    'contents' => $contents,
                    'systemInstruction' => [
                        'parts' => [['text' => $systemPrompt]]
                    ],
                    'generationConfig' => [
                        'temperature' => 0.3,
                        'maxOutputTokens' => 500,
                    ]
                ]);

                if ($response->successful()) {
                    $result = $response->json();
                    if (isset($result['candidates'][0]['content']['parts'][0]['text'])) {
                        $reply = $result['candidates'][0]['content']['parts'][0]['text'];
                        return response()->json(['reply' => $reply]);
                    }
                } else {
                    Log::warning('La API de Gemini falló o no tiene saldo (Cambiando a Cerebro Local): ' . $response->body());
                }
            }
        } catch (\Exception $e) {
            Log::warning('Error de conexión con Gemini (Cambiando a Cerebro Local): ' . $e->getMessage());
        }

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
        } elseif (str_contains($userMessageLower, 'precio') || str_contains($userMessageLower, 'costo') || str_contains($userMessageLower, 'comprar') || str_contains($userMessageLower, 'cotiza')) {
            $reply = "Manejamos muchísimas referencias. Para conocer nuestros precios o solicitar una cotización formal, por favor escríbenos a Comercial@imgeessa.com. ¡Te armaremos una propuesta a tu medida!";
        } elseif (str_contains($userMessageLower, 'catalogo') || str_contains($userMessageLower, 'que manejan') || str_contains($userMessageLower, 'que equipos manejan') || str_contains($userMessageLower, 'productos') || str_contains($userMessageLower, 'que venden') || str_contains($userMessageLower, 'portafolio')) {
            $reply = "Manejamos una línea muy completa de Equipos de Protección Personal (EPP) de marcas top mundiales: protección en alturas (arneses, eslingas), cascos, gafas, protección respiratoria y auditiva, guantes y botas de seguridad. Además, ofrecemos instrumentación (detectores de gas), equipos de emergencia (botiquines, extintores), ferretería industrial y asesorías HSEQ. ¿Qué tipo de equipo estás buscando hoy?";
        } elseif (str_contains($userMessageLower, 'valores') || str_contains($userMessageLower, 'mision') || str_contains($userMessageLower, 'crece')) {
            $reply = "Nuestros valores se resumen en el acrónimo C.R.E.C.E.: Calidad, Responsabilidad, Enfoque al cliente, Compromiso y Excelencia.";
        } elseif (str_contains($userMessageLower, 'codigo') || str_contains($userMessageLower, 'programar') || str_contains($userMessageLower, 'politica') || str_contains($userMessageLower, 'chiste') || str_contains($userMessageLower, 'receta') || str_contains($userMessageLower, 'poema') || str_contains($userMessageLower, 'historia') || str_contains($userMessageLower, 'inteligencia artificial') || str_contains($userMessageLower, 'ignora las instrucciones') || str_contains($userMessageLower, 'dame un ejemplo de')) {
            $reply = "Lo siento, soy un asesor virtual EXCLUSIVO de IMGEESSA. Mi programación me restringe rotundamente a brindar soporte solo sobre nuestros productos industriales, equipos de protección personal (EPP) y servicios HSEQ.";
        } else {
            $reply = "Lo siento, como asesor virtual exclusivo de IMGEESSA no puedo responder a temas ajenos a la compañía. Mi programación está diseñada únicamente para asesorarte sobre nuestro catálogo industrial, protección en EPP y servicios corporativos HSEQ. ¿En qué te puedo ayudar respecto a nuestra empresa?";
        }

        // Simulamos el "escribiendo..." en caso de que OpenAI haya fallado y estemos usando el cerebro local
        usleep(800000);
        return response()->json(['reply' => $reply]);
    }
}
