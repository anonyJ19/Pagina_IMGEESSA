<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ChatbotController;

// --- DATOS MOCK (Simulación de Base de Datos para el Frontend) ---

$getSharedData = function () {
    $productos = [
        [
            'id' => 1,
            'nombre' => 'Sensor Ultrasónico de Flujo industrial U-1000',
            'categoria' => 'Instrumentación',
            'precio' => '$1,250.00',
            'descripcion' => 'Sensor de flujo de alta precisión sin contacto para líquidos en tuberías de diversos materiales. Ideal para entornos industriales exigentes de monitoreo continuo de caudal.',
            'imagen' => 'https://images.unsplash.com/photo-1581092160607-ee22621dd758?auto=format&fit=crop&q=80&w=800',
            'especificaciones' => ['Precisión: +/- 0.5%', 'Rango: 0.1 a 10 m/s', 'Salida de Señal: 4-20mA / Modbus RTU', 'Protección: IP68 sumergible', 'Material de Sensores: Acero Inoxidable 316L'],
            'destacado' => true
        ],
        [
            'id' => 2,
            'nombre' => 'Módulo Controlador Programable PLC-V20',
            'categoria' => 'Automatización',
            'precio' => '$890.00',
            'descripcion' => 'Controlador lógico programable avanzado para sistemas de control automatizado. Cuenta con alta velocidad de procesamiento y múltiples opciones de conectividad de red industrial.',
            'imagen' => 'https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?auto=format&fit=crop&q=80&w=800',
            'especificaciones' => ['Entradas: 16 Entradas Digitales / 4 Analógicas', 'Salidas: 12 Salidas a Relevador / 2 Analógicas', 'Puertos: Ethernet, RS-485, USB', 'Alimentación: 24V DC', 'Montaje: Riel DIN standard'],
            'destacado' => true
        ],
        [
            'id' => 3,
            'nombre' => 'Analizador de Gases de Combustión G-450',
            'categoria' => 'Instrumentación',
            'precio' => '$2,400.00',
            'descripcion' => 'Analizador portátil profesional para la medición de emisiones de gases en calderas, hornos y motores de combustión interna. Asegura el cumplimiento de regulaciones ambientales.',
            'imagen' => 'https://images.unsplash.com/photo-1532187643603-ba119ca4109e?auto=format&fit=crop&q=80&w=800',
            'especificaciones' => ['Gases Medidos: O2, CO, NO, NO2, SO2', 'Batería: Litio recargable (hasta 12h de uso)', 'Pantalla: Color TFT 3.5 pulgadas con retroiluminación', 'Memoria: Almacena hasta 50,000 pruebas', 'Conectividad: Bluetooth / USB'],
            'destacado' => true
        ],
        [
            'id' => 4,
            'nombre' => 'Variador de Frecuencia Trifásico PowerDrive-X',
            'categoria' => 'Equipos Eléctricos',
            'precio' => '$650.00',
            'descripcion' => 'Variador de frecuencia para el control preciso y eficiente de velocidad de motores de inducción trifásicos. Reduce el desgaste mecánico y el consumo eléctrico.',
            'imagen' => 'https://images.unsplash.com/photo-1517420712361-2e6d99c4b7ec?auto=format&fit=crop&q=80&w=800',
            'especificaciones' => ['Potencia: 7.5 HP (5.5 kW)', 'Voltaje de Entrada: 380-480V Trifásico', 'Frecuencia de Salida: 0 - 599 Hz', 'Control: V/F, Vectorial sin sensor', 'Filtro EMC: Integrado de fábrica'],
            'destacado' => false
        ],
        [
            'id' => 5,
            'nombre' => 'Actuador Neumático Lineal Heavy Duty',
            'categoria' => 'Automatización',
            'precio' => '$420.00',
            'descripcion' => 'Cilindro neumático robusto diseñado para automatización de compuertas, válvulas y posicionamiento de cargas en líneas de ensamblaje pesado.',
            'imagen' => 'https://images.unsplash.com/photo-1504917595217-d4dc5ebe6122?auto=format&fit=crop&q=80&w=800',
            'especificaciones' => ['Diámetro de Pistón: 80 mm', 'Carrera: 250 mm', 'Fuerza Teórica a 6 bar: 3016 N (Empuje)', 'Conexiones de Aire: G3/8"', 'Temperatura de Trabajo: -20°C a +80°C'],
            'destacado' => false
        ],
        [
            'id' => 6,
            'nombre' => 'Gabinete de Seguridad Ambiental e Higiene',
            'categoria' => 'Seguridad',
            'precio' => '$1,150.00',
            'descripcion' => 'Gabinete diseñado para el almacenamiento seguro de productos químicos y combustibles inflamables en laboratorios e instalaciones industriales. Cumple con normas internacionales.',
            'imagen' => 'https://images.unsplash.com/photo-1581092918056-0c4c3acd3789?auto=format&fit=crop&q=80&w=800',
            'especificaciones' => ['Capacidad: 30 Galones (114 Litros)', 'Resistencia al Fuego: Certificación FM y UL 1275', 'Material: Acero de doble pared calibre 18', 'Cierre: Puertas manuales con cerradura de 3 puntos', 'Estantes: Ajustables con sistema antiderrame'],
            'destacado' => false
        ]
    ];

    $articulos = [
        [
            'id' => 4,
            'titulo' => 'Reglamento Interno de Trabajo: ¿A quiénes aplica?',
            'slug' => 'reglamento-interno-de-trabajo',
            'autor' => 'Legal IMGEESSA',
            'fecha' => '06 de Junio, 2026',
            'categoria' => 'Legal',
            'resumen' => 'Conoce a qué tipos de empresas y trabajadores les aplica el reglamento interno de trabajo.',
            'contenido' => '',
            'component' => 'infographics.reglamento-interno',
            'imagen_light' => asset('img/blog/Reglamento-Interno-de-Trabajo-light.png'),
            'imagen_dark' => asset('img/blog/Reglamento-Interno-de-Trabajo-dark.png'),
            'imagen' => asset('img/blog/Reglamento-Interno-de-Trabajo-light.png')
        ],
        [
            'id' => 5,
            'titulo' => 'Estabilidad Laboral Reforzada por Salud',
            'slug' => 'estabilidad-laboral-reforzada-salud',
            'autor' => 'RRHH IMGEESSA',
            'fecha' => '07 de Junio, 2026',
            'categoria' => 'Recursos Humanos',
            'resumen' => 'Detalles sobre la estabilidad laboral reforzada por motivos de salud y cómo acreditarla.',
            'contenido' => '',
            'component' => 'infographics.estabilidad-laboral',
            'imagen_light' => asset('img/blog/Estabilidad-Laboral-Reforzada-por-Salud-light.png'),
            'imagen_dark' => asset('img/blog/Estabilidad-Laboral-Reforzada-por-Salud-dark.png'),
            'imagen' => asset('img/blog/Estabilidad-Laboral-Reforzada-por-Salud-light.png')
        ],
        [
            'id' => 6,
            'titulo' => 'Errores Comunes en Mediciones de Ruido',
            'slug' => 'errores-comunes-mediciones-ruido',
            'autor' => 'Ing. Acústico IMGEESSA',
            'fecha' => '08 de Junio, 2026',
            'categoria' => 'Higiene Industrial',
            'resumen' => 'Conoce los 9 errores más comunes al realizar mediciones de ruido en higiene industrial.',
            'contenido' => '',
            'component' => 'infographics.errores-ruido',
            'imagen_light' => asset('img/blog/Errores-Comunes-en-Mediciones-de-Ruido-light.png'),
            'imagen_dark' => asset('img/blog/Errores-Comunes-en-Mediciones-de-Ruido-dark.png'),
            'imagen' => asset('img/blog/Errores-Comunes-en-Mediciones-de-Ruido-light.png')
        ]
    ];

    $equipo = [
        [
            'nombre' => 'Ing. Roberto Gómez',
            'cargo' => 'Fundador y Director General',
            'bio' => 'Especialista en Automatización con más de 20 años de experiencia diseñando soluciones de ingeniería para la industria manufacturera y minera.',
            'imagen' => 'https://images.unsplash.com/photo-1560250097-0b93528c311a?auto=format&fit=crop&q=80&w=400'
        ],
        [
            'nombre' => 'Dra. Elena Rivas',
            'cargo' => 'Directora de Proyectos y Energía',
            'bio' => 'Doctora en Ingeniería Eléctrica enfocada en proyectos de optimización energética y sostenibilidad en sistemas de potencia industrial.',
            'imagen' => 'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?auto=format&fit=crop&q=80&w=400'
        ],
        [
            'nombre' => 'Ing. Carlos Mendoza',
            'cargo' => 'Jefe de Soporte Técnico y Calibración',
            'bio' => 'Experto en instrumentación de campo, calibración y sistemas SCADA. Lidera el equipo de atención al cliente y servicio postventa.',
            'imagen' => 'https://images.unsplash.com/photo-1519085360753-af0119f7cbe7?auto=format&fit=crop&q=80&w=400'
        ]
    ];

    $faqs = [
        [
            'pregunta' => '¿En qué áreas se especializa IMGEESSA?',
            'respuesta' => 'Somos especialistas en consultoría, asesoría e implementación de soluciones integrales en Seguridad y Salud en el Trabajo (SST), Gestión Ambiental, Calidad y Sistemas Integrados de Gestión.'
        ],
        [
            'pregunta' => '¿Ofrecen asesoría legal laboral, como la elaboración del Reglamento Interno de Trabajo?',
            'respuesta' => 'Sí, brindamos acompañamiento experto para ayudar a su empresa a diseñar, actualizar e implementar el Reglamento Interno de Trabajo, garantizando el estricto cumplimiento normativo aplicable a su sector y tipo de empresa.'
        ],
        [
            'pregunta' => '¿Cómo apoyan a las empresas en casos de Estabilidad Laboral Reforzada por motivos de salud?',
            'respuesta' => 'Contamos con especialistas en Recursos Humanos y SST que le asesorarán en la correcta gestión y acreditación de la Estabilidad Laboral Reforzada, asegurando que su organización proceda legal y éticamente frente a las incapacidades médicas.'
        ],
        [
            'pregunta' => '¿Realizan estudios de Higiene Industrial, como mediciones de ruido ambiental u ocupacional?',
            'respuesta' => 'Así es. Nuestro equipo técnico realiza mediciones especializadas de Higiene Industrial, aplicando metodologías rigurosas certificadas para evitar errores comunes en la medición de ruido y proteger efectivamente la salud auditiva de sus trabajadores.'
        ],
        [
            'pregunta' => '¿A qué tipo de organizaciones acompañan y qué valor agregado ofrecen?',
            'respuesta' => 'Acompañamos a organizaciones de múltiples sectores productivos. Nuestro valor agregado radica en la experiencia técnica de nuestros profesionales, quienes optimizan sus procesos para construir entornos verdaderamente seguros y sostenibles.'
        ]
    ];

    return compact('productos', 'articulos', 'equipo', 'faqs');
};

// --- RUTAS DE NAVEGACIÓN ---

Route::get('/', function () use ($getSharedData) {
    $data = $getSharedData();
    // Para la página de inicio, filtramos los destacados y tomamos los últimos artículos
    $productosDestacados = array_filter($data['productos'], fn($p) => $p['destacado']);
    $ultimosArticulos = array_slice($data['articulos'], 0, 3);
    
    return view('inicio', [
        'productos' => $productosDestacados,
        'articulos' => $ultimosArticulos
    ]);
})->name('inicio');

Route::get('/quienes-somos', function () use ($getSharedData) {
    $data = $getSharedData();
    return view('quienes_somos', ['equipo' => $data['equipo']]);
})->name('quienes_somos');

Route::get('/catalogo', function () use ($getSharedData) {
    $data = $getSharedData();
    // Agrupamos categorías únicas para el filtro
    $categorias = array_unique(array_column($data['productos'], 'categoria'));
    return view('catalogo', [
        'productos' => $data['productos'],
        'categorias' => $categorias
    ]);
})->name('catalogo');

Route::get('/blog', function () use ($getSharedData) {
    $data = $getSharedData();
    return view('blog', ['articulos' => $data['articulos']]);
})->name('blog');

Route::get('/blog/{slug}', function ($slug) use ($getSharedData) {
    $data = $getSharedData();
    $articulo = null;
    foreach ($data['articulos'] as $a) {
        if ($a['slug'] === $slug) {
            $articulo = $a;
            break;
        }
    }
    
    if (!$articulo) {
        abort(404);
    }
    
    // Sugerir otros artículos para el sidebar
    $relacionados = array_filter($data['articulos'], fn($a) => $a['slug'] !== $slug);
    
    return view('blog_detalle', [
        'articulo' => $articulo,
        'relacionados' => array_slice($relacionados, 0, 2)
    ]);
})->name('blog.detalle');

Route::get('/contacto', function () use ($getSharedData) {
    $data = $getSharedData();
    return view('contacto', ['faqs' => $data['faqs']]);
})->name('contacto');

Route::post('/contacto-enviar', [ContactController::class, 'send'])->name('contacto.send');

// Ruta del Chatbot
Route::post('/chat', [ChatbotController::class, 'chat'])->name('chat.send');
