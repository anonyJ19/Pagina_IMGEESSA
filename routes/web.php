<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

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
            'id' => 1,
            'titulo' => 'El impacto del Mantenimiento Predictivo en la industria 4.0',
            'slug' => 'impacto-mantenimiento-predictivo-industria-4-0',
            'autor' => 'Ing. Carlos Mendoza',
            'fecha' => '15 de Mayo, 2026',
            'categoria' => 'Tecnología',
            'resumen' => 'Descubre cómo los sensores IoT y el análisis de vibraciones están ayudando a prevenir paradas no programadas en las plantas industriales modernas.',
            'contenido' => 'El mantenimiento predictivo es una técnica que utiliza herramientas de análisis de datos para detectar anomalías en el funcionamiento de los equipos y procesos, y posibles defectos en los equipos y procesos, con el fin de poder corregirlos antes de que provoquen fallos.

En la era de la Industria 4.0, esta estrategia se ha vuelto indispensable. A través del monitoreo continuo mediante sensores inteligentes de flujo, temperatura y vibraciones, los ingenieros pueden predecir con exactitud cuándo un rodamiento o un motor eléctrico fallará. Esto disminuye drásticamente el tiempo de inactividad no planificado, ahorrando millones en costos operativos anuales.

Al integrar estas variables directamente con plataformas analíticas, el departamento de mantenimiento puede programar reparaciones precisamente en ventanas de baja producción, mejorando tanto la eficiencia como la seguridad del personal.',
            'imagen' => 'https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?auto=format&fit=crop&q=80&w=800'
        ],
        [
            'id' => 2,
            'titulo' => 'Eficiencia energética en sistemas de bombeo industrial',
            'slug' => 'eficiencia-energetica-sistemas-bombeo-industrial',
            'autor' => 'Dra. Elena Rivas',
            'fecha' => '28 de Mayo, 2026',
            'categoria' => 'Eficiencia Energética',
            'resumen' => 'Optimizar los motores eléctricos y la regulación de flujos mediante variadores puede reducir el consumo eléctrico industrial hasta en un 40%.',
            'contenido' => 'Los sistemas de bombeo representan más del 20% del consumo de energía eléctrica en las plantas industriales a nivel global. Sin embargo, una gran parte de estas instalaciones operan con niveles de eficiencia inferiores al 50% debido a un sobredimensionamiento de equipos o métodos de control obsoletos.

La clave para mejorar la eficiencia reside en el control de velocidad variable. En lugar de utilizar válvulas de estrangulamiento para limitar el flujo (lo cual desperdicia energía disipándola en forma de fricción), la instalación de un variador de frecuencia (VDF) permite ajustar la velocidad del motor para cumplir exactamente con la demanda del proceso.

Implementar estas mejoras no solo reduce la huella de carbono de la empresa, sino que ofrece un Retorno de Inversión (ROI) típicamente inferior a 18 meses, prolongando la vida útil de las tuberías y las bombas al reducir golpes de ariete.',
            'imagen' => 'https://images.unsplash.com/photo-1504917595217-d4dc5ebe6122?auto=format&fit=crop&q=80&w=800'
        ],
        [
            'id' => 3,
            'titulo' => 'Normativas de seguridad ambiental para el almacenamiento químico',
            'slug' => 'normativas-seguridad-ambiental-almacenamiento-quimico',
            'autor' => 'MSc. Javier Soto',
            'fecha' => '04 de Junio, 2026',
            'categoria' => 'Seguridad',
            'resumen' => 'Una guía práctica sobre las mejores prácticas y regulaciones internacionales para el manejo de sustancias peligrosas en planta.',
            'contenido' => 'El almacenamiento inadecuado de productos químicos peligrosos representa un riesgo severo para la salud de los trabajadores, la integridad física de las instalaciones y el medio ambiente que rodea a las industrias.

Para mitigar estos peligros, las empresas deben adoptar prácticas alineadas con estándares como las regulaciones de la OSHA, NFPA 30 y las normativas nacionales vigentes. Los gabinetes de seguridad aprobados por FM, por ejemplo, proveen una barrera de resistencia al fuego de hasta 30 minutos, tiempo crítico para la evacuación del personal y control de incendios.

Adicionalmente, el etiquetado correcto de contenedores bajo el Sistema Globalmente Armonizado (SGA), la separación física de sustancias reactivas incompatibles y la presencia de diques de contención de derrames son fundamentales para mantener un ambiente de trabajo seguro y sustentable.',
            'imagen' => 'https://images.unsplash.com/photo-1581092918056-0c4c3acd3789?auto=format&fit=crop&q=80&w=800'
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
            'pregunta' => '¿Ofrecen servicios de instalación y calibración en sitio?',
            'respuesta' => 'Sí, en IMGEESA contamos con un equipo técnico especializado disponible para realizar servicios de montaje, puesta en marcha y calibración de instrumentos de flujo, presión y temperatura directamente en sus instalaciones con certificación de fábrica.'
        ],
        [
            'pregunta' => '¿Hacen envíos de equipos a nivel nacional?',
            'respuesta' => 'Sí, realizamos envíos seguros y asegurados a todo el país. Trabajamos con las principales empresas transportadoras para garantizar que los equipos de precisión lleguen en perfectas condiciones y a tiempo.'
        ],
        [
            'pregunta' => '¿Qué garantía tienen los productos del catálogo?',
            'respuesta' => 'Todos nuestros equipos nuevos cuentan con una garantía mínima de 12 meses contra defectos de fabricación. Adicionalmente, ofrecemos planes de mantenimiento y extensión de garantía opcionales.'
        ],
        [
            'pregunta' => '¿Cómo puedo solicitar una cotización formal para un proyecto?',
            'respuesta' => 'Puede enviarnos un mensaje con sus requerimientos técnicos detallados a través de nuestro formulario de contacto en esta web, escribirnos al correo cotizaciones@imgeesa.com o contactarnos telefónicamente para una atención inmediata.'
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
