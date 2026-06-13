<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ChatbotController extends Controller
{
    public function chat(Request $request)
    {
        $request->validate([
            'message' => 'required|string|max:1000',
        ]);

        $userMessage = $request->input('message');
        $userMessageLower = strtolower(trim($userMessage));
        
        $reply = "";
        $options = [];

        // Definir cuáles son las opciones rápidas (botones exactos)
        $knownButtonsLower = [
            '🏠 inicio', '🏢 quiénes somos', '🧰 catálogo', '📝 blog', '📞 contacto',
            '💼 líneas de negocio', '🤔 ¿por qué elegirnos?', '👥 nuestros clientes',
            '🔙 volver al menú principal', '📖 historia y trayectoria', '🎯 misión y visión',
            '🌟 valores c.r.e.c.e', '👷 cabeza, ojos y oídos', '🫁 protección respiratoria',
            '🧤 corporal y manos', '🧗 alturas y confinados', '📰 artículos recientes',
            '📍 ubicación sede central', '📞 teléfonos y whatsapp', '📧 correos electrónicos',
            '🛡️ sistemas de gestión hseq', '📉 mediciones higiénicas', '⚙️ sst (salud y seguridad)',
            '🌱 ambiental (iso 14001)', '✅ calidad (iso 9001)', '🚗 seguridad vial (pesv)', 'menu_principal'
        ];

        $isQuickOption = in_array($userMessageLower, $knownButtonsLower);

        // Añadir el enlace genérico de WhatsApp (se utiliza en Gemini y en el árbol)
        $whatsappLink = '<div style="margin-top: 15px; border-top: 1px solid #e2e8f0; padding-top: 10px;"><a href="https://api.whatsapp.com/send?phone=573108448788&text=Hola,%20vengo%20del%20chatbot%20y%20necesito%20atenci%C3%B3n%20humana" target="_blank" style="color: #10b981; font-weight: bold; text-decoration: none; display: flex; align-items: center; gap: 5px;"><svg style="width: 16px; height: 16px;" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51a12.8 12.8 0 00-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z" /></svg> Comunícate por el canal de WhatsApp</a></div>';

        // 1. INTENTAR CON GROQ API (Llama 3) SI NO ES UNA OPCIÓN RÁPIDA EXACTA
        if (!$isQuickOption) {
            try {
                $apiKey = env('GROQ_API_KEY');
                $systemPrompt = "Eres el asesor virtual exclusivo de IMGEESSA. Somos expertos en consultoría HSEQ y venta de Elementos de Protección Personal (EPP). REGLAS OBLIGATORIAS: 1. Tus respuestas deben ser EXTREMADAMENTE CORTAS (máximo 2 a 3 renglones). 2. NUNCA uses listas largas con viñetas; si debes listar algo, usa comas en un solo párrafo. 3. Responde solo sobre la empresa.";
                
                $response = Http::timeout(10)->withoutVerifying()->withToken($apiKey)->withHeaders([
                    'Content-Type' => 'application/json'
                ])->post("https://api.groq.com/openai/v1/chat/completions", [
                    'model' => 'llama-3.1-8b-instant',
                    'messages' => [
                        ['role' => 'system', 'content' => $systemPrompt],
                        ['role' => 'user', 'content' => $userMessage],
                    ],
                    'max_tokens' => 120,
                    'temperature' => 0.4
                ]);

                if ($response->successful()) {
                    $data = $response->json();
                    if (isset($data['choices'][0]['message']['content'])) {
                        $aiReply = $data['choices'][0]['message']['content'];
                        $aiReply = nl2br(preg_replace('/\*\*(.*?)\*\*/', '<strong>$1</strong>', $aiReply));
                        
                        $aiReply .= "<br><br><strong>Si necesitas más información, comunícate al canal de WhatsApp.</strong>";
                        
                        $options = [
                            '🏠 Inicio',
                            '🏢 Quiénes somos',
                            '🧰 Catálogo',
                            '📝 Blog',
                            '📞 Contacto'
                        ];
                        
                        return response()->json([
                            'reply' => $aiReply . $whatsappLink,
                            'options' => $options
                        ]);
                    }
                }
            } catch (\Exception $e) {
                Log::error("Groq API Error: " . $e->getMessage());
            }
        }

        // Función auxiliar para verificar coincidencias de palabras clave en el árbol de fallback
        $containsAny = function($haystack, $needles) {
            foreach ($needles as $needle) {
                if (str_contains($haystack, $needle)) return true;
            }
            return false;
        };

        // ====== 2. ÁRBOL DE DECISIONES DE FALLBACK / OPCIONES RÁPIDAS ======
        
        // 1. MENU PRINCIPAL
        if ($userMessageLower === 'menu_principal' || $containsAny($userMessageLower, ['volver al menú', 'volver al menu', 'hola', 'menu principal', 'buenas'])) {
            $reply = "¡Hola! Soy el asesor de IMGEESSA. Por favor selecciona una de las opciones de nuestro menú principal:";
            $options = [
                '🏠 Inicio',
                '🏢 Quiénes somos',
                '🧰 Catálogo',
                '📝 Blog',
                '📞 Contacto'
            ];
        }
        
        // 2. INICIO
        elseif ($userMessageLower === 'inicio' || $containsAny($userMessageLower, ['🏠 inicio'])) {
            $reply = "Bienvenido a la página de Inicio. Aquí encontrarás un resumen de toda nuestra organización. ¿Qué sección te gustaría explorar?";
            $options = [
                '💼 Líneas de Negocio',
                '🤔 ¿Por qué elegirnos?',
                '👥 Nuestros Clientes',
                '🔙 Volver al Menú Principal'
            ];
        }
        elseif ($containsAny($userMessageLower, ['líneas de negocio', 'lineas de negocio'])) {
            $reply = "Contamos con múltiples líneas principales: SST, Gestión Ambiental, Calidad, Seguridad Vial (PESV), Mediciones Higiénicas, Baterías Psicosociales, Venta de EPP e Ingeniería Química.";
            $options = ['🔙 Volver al Menú Principal'];
        }
        elseif ($containsAny($userMessageLower, ['por qué elegirnos', 'por que elegirnos'])) {
            $reply = "Destacamos por nuestra experiencia integral en Seguridad y Salud en el Trabajo, Gestión Ambiental y Calidad, brindando profesionalismo técnico para asegurar entornos sostenibles.";
            $options = ['🔙 Volver al Menú Principal'];
        }
        elseif ($containsAny($userMessageLower, ['nuestros clientes', 'clientes'])) {
            $reply = "A lo largo de más de 7 años, hemos participado en más de 150 proyectos industriales, asesorando a grandes empresas a nivel nacional con un 99.8% de eficiencia operativa.";
            $options = ['🔙 Volver al Menú Principal'];
        }

        // 3. INTENCIONES NLP (Sin API) - SISTEMAS DE GESTIÓN Y MEDICIONES
        elseif ($containsAny($userMessageLower, ['mediciones', 'higiénicas', 'higienicas', 'btx', 'ruido', 'dosimetría', 'dosimetria', 'luxometría', 'luxometria', 'gases', 'estrés térmico', 'estres termico'])) {
            $reply = "Prestamos servicios precisos de mediciones ambientales e higiénicas:<br>- Sonometría y Dosimetría (Ruido)<br>- Luxometría (Iluminación)<br>- Material Particulado y Gases (incluyendo análisis de BTX)<br>- Estrés térmico.<br><br>También distribuimos detectores multigas portátiles y alcoholímetros.";
            $options = ['🔙 Volver al Menú Principal'];
        }
        elseif ($containsAny($userMessageLower, ['sistemas de gestión', 'sistema de gestion', 'sst', 'iso 9001', 'iso 14001', 'calidad', 'ambiental', 'pesv', 'seguridad vial'])) {
            $reply = "Diseñamos e implementamos sistemas de gestión estructurados para tu tranquilidad empresarial:<br>- SG-SST (Salud y Seguridad)<br>- Gestión Ambiental (ISO 14001)<br>- Calidad (ISO 9001)<br>- Plan Estratégico de Seguridad Vial (PESV)";
            $options = ['🔙 Volver al Menú Principal'];
        }

        // 4. QUIÉNES SOMOS
        elseif ($containsAny($userMessageLower, ['quiénes somos', 'quienes somos', 'filosofía', 'filosofia'])) {
            $reply = "Conoce más sobre la esencia y la cultura de IMGEESSA. ¿Qué te interesa?";
            $options = [
                '📖 Historia y Trayectoria',
                '🎯 Misión y Visión',
                '🌟 Valores C.R.E.C.E',
                '🔙 Volver al Menú Principal'
            ];
        }
        elseif ($containsAny($userMessageLower, ['historia', 'trayectoria'])) {
            $reply = "Nuestra organización fue concebida en 2017 por visionarios apasionados y nos consolidamos legalmente en 2021, evolucionando para ofrecer consultoría integral de alta calidad.";
            $options = ['🔙 Volver al Menú Principal'];
        }
        elseif ($containsAny($userMessageLower, ['misión', 'mision', 'visión', 'vision'])) {
            $reply = "<strong>Misión:</strong> Crear valor agregado con soluciones integrales enfocadas en cumplimiento legal y resultados sostenibles.<br><br><strong>Visión:</strong> Ser líderes a nivel nacional en HSEQ para el año 2030.";
            $options = ['🔙 Volver al Menú Principal'];
        }
        elseif ($containsAny($userMessageLower, ['valores', 'crece'])) {
            $reply = "Nuestros pilares son el modelo <strong>C.R.E.C.E</strong>:<br><br>- <strong>C</strong>alidad<br>- <strong>R</strong>esponsabilidad<br>- <strong>E</strong>nfoque al Cliente<br>- <strong>C</strong>ompromiso<br>- <strong>E</strong>xcelencia";
            $options = ['🔙 Volver al Menú Principal'];
        }

        // 5. CATÁLOGO / EPP INTENCIONES
        elseif ($containsAny($userMessageLower, ['catálogo', 'catalogo', 'productos', 'epp', 'dotación', 'dotacion', 'comprar'])) {
            $reply = "Nuestro catálogo incluye las mejores marcas mundiales (3M, MSA, Ansell, Honeywell). ¿Qué línea de productos buscas?";
            $options = [
                '👷 Cabeza, Ojos y Oídos',
                '🫁 Protección Respiratoria',
                '🧤 Corporal y Manos',
                '🧗 Alturas y Confinados',
                '🔙 Volver al Menú Principal'
            ];
        }
        elseif ($containsAny($userMessageLower, ['cabeza', 'ojos', 'oídos', 'oidos', 'casco', 'gafas', 'tapones', 'orejeras', 'visual', 'auditiva'])) {
            $reply = "Tenemos para entrega:<br>- <strong>Cascos:</strong> Tipo I y II, dieléctricos.<br>- <strong>Visual:</strong> Gafas in/out, oscuras, antiempañantes, caretas de soldador.<br>- <strong>Auditiva:</strong> Tapones de inserción y orejeras de copa.";
            $options = ['🧰 Catálogo', '🔙 Volver al Menú Principal'];
        }
        elseif ($containsAny($userMessageLower, ['respiratoria', 'respirador', 'mascarilla', 'n95', 'filtro', 'cartucho'])) {
            $reply = "Contamos con mascarillas N95, respiradores de media cara y cara completa (Full Face) en silicona, además de cartuchos químicos y filtros particulados.";
            $options = ['🧰 Catálogo', '🔙 Volver al Menú Principal'];
        }
        elseif ($containsAny($userMessageLower, ['corporal', 'manos', 'guantes', 'botas', 'overol', 'chaleco', 'calzado', 'nitrilo'])) {
            $reply = "Ofrecemos:<br>- <strong>Guantes:</strong> Vaqueta, nitrilo, anticorte, dieléctricos, soldador.<br>- <strong>Corporal y Calzado:</strong> Overoles antifluido, Tyvek, chalecos y botas de seguridad.";
            $options = ['🧰 Catálogo', '🔙 Volver al Menú Principal'];
        }
        elseif ($containsAny($userMessageLower, ['alturas', 'confinados', 'arnes', 'eslinga', 'linea de vida', 'rescate', 'posicionamiento'])) {
            $reply = "Vendemos equipos certificados: Arneses en poliuretano/kevlar/dieléctricos, eslingas, líneas de vida, puntos de anclaje, sillas de suspensión y trípodes de rescate.";
            $options = ['🧰 Catálogo', '🔙 Volver al Menú Principal'];
        }

        // 6. BLOG
        elseif ($containsAny($userMessageLower, ['blog', 'noticias', 'artículos', 'articulos', 'novedades'])) {
            $reply = "En la sección de Blog publicamos contenido de valor sobre prevención y normatividad. ¿Qué deseas explorar?";
            $options = [
                '📰 Artículos Recientes',
                '🔙 Volver al Menú Principal'
            ];
        }
        elseif ($containsAny($userMessageLower, ['recientes'])) {
            $reply = "Puedes leer sobre últimas actualizaciones normativas, tendencias en SST, consejos ambientales y guías de calidad dando clic directamente en la pestaña <strong>Blog</strong> de nuestra barra superior.";
            $options = ['🔙 Volver al Menú Principal'];
        }

        // 7. CONTACTO / COTIZAR INTENCIONES
        elseif ($containsAny($userMessageLower, ['contacto', 'cotizar', 'precio', 'costo', 'valor', 'cuánto', 'cuanto', 'dónde', 'donde'])) {
            $reply = "¡Estamos listos para atenderte y enviarte una cotización! ¿Qué información de contacto necesitas?";
            $options = [
                '📍 Ubicación Sede Central',
                '📞 Teléfonos y WhatsApp',
                '📧 Correos Electrónicos',
                '🔙 Volver al Menú Principal'
            ];
        }
        elseif ($containsAny($userMessageLower, ['ubicación', 'ubicacion', 'sede', 'central', 'dirección', 'direccion'])) {
            $reply = "Nuestra sede principal está ubicada en la Av Carrera 30 # 75-61 en Bogotá y tenemos otra sede en la Av 12a #17-76 Barrio la Libertad en Cúcuta.";
            $options = ['📞 Contacto', '🔙 Volver al Menú Principal'];
        }
        elseif ($containsAny($userMessageLower, ['teléfonos', 'telefonos', 'whatsapp', 'llamar', 'numero', 'celular'])) {
            $reply = "Puedes llamarnos o escribirnos por WhatsApp a los números:<br>📲 310 8448788<br>📲 310 7696821";
            $options = ['📞 Contacto', '🔙 Volver al Menú Principal'];
        }
        elseif ($containsAny($userMessageLower, ['correos', 'correo', 'email'])) {
            $reply = "Escríbenos a cualquiera de nuestros correos:<br>✉️ direccioncomercial@imgeessa.com<br>✉️ comercial@imgeessa.com<br>✉️ gerencia@imgeessa.com";
            $options = ['📞 Contacto', '🔙 Volver al Menú Principal'];
        }

        // DEFAULT (INICIO REQUERIDO O ENTRADA NO RECONOCIDA)
        else {
            $reply = "¡Hola! Entiendo tu solicitud, pero para brindarte la información más exacta, por favor selecciona una de las siguientes opciones:";
            $options = [
                '🏠 Inicio',
                '🏢 Quiénes somos',
                '🧰 Catálogo',
                '📝 Blog',
                '📞 Contacto'
            ];
        }

        // Añadir mensaje sugerido si es una respuesta final
        if (count($options) === 1 && str_contains($options[0], 'Volver al Menú Principal')) {
            $reply .= "<br><br><strong>Si necesitas más información sobre esto, comunícate con nosotros.</strong>";
        }

        // Añadir el enlace genérico de WhatsApp al final de cada respuesta de forma sutil
        $whatsappLink = '<div style="margin-top: 15px; border-top: 1px solid #e2e8f0; padding-top: 10px;"><a href="https://api.whatsapp.com/send?phone=573108448788&text=Hola,%20vengo%20del%20chatbot%20y%20necesito%20atenci%C3%B3n%20humana" target="_blank" style="color: #10b981; font-weight: bold; text-decoration: none; display: flex; align-items: center; gap: 5px;"><svg style="width: 16px; height: 16px;" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51a12.8 12.8 0 00-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z" /></svg> Hablar con un asesor (WhatsApp)</a></div>';
        $reply .= $whatsappLink;

        // Breve retraso para simular tiempo de "escribiendo..."
        usleep(400000);
        
        return response()->json([
            'reply' => $reply,
            'options' => $options
        ]);
    }
}
