<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ChatbotController;

// --- DATOS MOCK (Simulación de Base de Datos para el Frontend) ---

$getSharedData = function () {
    $jsonPath = public_path('img/catalogo/productos_parsed.json');
    if (file_exists($jsonPath)) {
        $productos = json_decode(file_get_contents($jsonPath), true);
    } else {
        $productos = [];
    }


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
