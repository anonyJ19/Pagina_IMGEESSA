@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<section class="relative overflow-hidden pt-8 pb-12 lg:pt-12 lg:pb-16 bg-slate-50 dark:bg-brand-navy-dark transition-colors duration-300">
    <!-- Background Grid and Gradient Blob -->
    <div class="absolute inset-0 -z-10 bg-[radial-gradient(37.5rem_37.5rem_at_top,rgba(0,210,211,0.15),transparent)] dark:bg-[radial-gradient(37.5rem_37.5rem_at_top,rgba(0,210,211,0.08),transparent)]"></div>
    <div class="absolute top-0 right-0 -z-10 h-96 w-96 rounded-full bg-brand-cyan/10 blur-3xl dark:bg-brand-cyan/5"></div>
    
    <div class="mx-auto max-w-7xl px-4 md:px-8">
        <div class="grid grid-cols-1 gap-12 lg:grid-cols-12 lg:items-center">
            <!-- Hero Left: Text & CTAs -->
            <div class="space-y-6 lg:col-span-7 text-center lg:text-left">
                <h1 class="text-4xl font-extrabold tracking-tight text-brand-navy dark:text-white sm:text-5xl lg:text-6xl leading-[1.1] sm:leading-[1.05]">
                    Impulsamos organizaciones <br class="hidden md:block" />
                    <span class="bg-gradient-to-r from-brand-cyan to-indigo-500 bg-clip-text text-transparent">más seguras, sostenibles y competitivas</span>
                </h1>
                <p class="mx-auto lg:mx-0 max-w-2xl text-base md:text-lg text-brand-slate dark:text-zinc-300 leading-relaxed">
                    Somos una empresa especializada en consultoría, asesoría e implementación de soluciones integrales en Seguridad y Salud en el Trabajo, Gestión Ambiental, Calidad y Sistemas Integrados de Gestión. Acompañamos a organizaciones de diferentes sectores en el cumplimiento de sus requisitos legales, la optimización de sus procesos y la construcción de entornos laborales seguros y sostenibles. Nuestro portafolio de servicios, respaldado por profesionales altamente calificados y una amplia experiencia técnica, nos permite generar valor agregado, promover la mejora continua y contribuir al crecimiento sostenible de nuestros clientes.
                </p>
                <div class="flex flex-wrap justify-center lg:justify-start gap-4 pt-2">
                    <a href="{{ route('catalogo') }}" class="inline-flex items-center justify-center rounded-xl bg-gradient-to-r from-brand-cyan to-indigo-600 px-6 py-3 text-sm font-bold text-brand-navy shadow-lg transition-all duration-300 hover:shadow-xl hover:-translate-y-0.5">
                        Explorar Catálogo
                        <svg class="ml-2 h-4 w-4 text-brand-navy" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                        </svg>
                    </a>
                    <a href="{{ route('quienes_somos') }}" class="inline-flex items-center justify-center rounded-xl border border-zinc-300 bg-white/40 dark:border-brand-navy dark:bg-brand-navy/40 px-6 py-3 text-sm font-semibold text-brand-navy dark:text-zinc-200 hover:bg-zinc-100 hover:text-zinc-900 dark:hover:bg-brand-navy/60 dark:hover:text-white transition-all duration-300 hover:-translate-y-0.5">
                        Conócenos Más
                    </a>
                </div>
            </div>

            <!-- Hero Right: Dynamic Visual Block -->
            <div class="lg:col-span-5 relative flex justify-center">
                <div class="relative w-full max-w-lg aspect-[4/3] rounded-3xl bg-gradient-to-tr from-brand-cyan to-indigo-600 p-1 shadow-2xl overflow-hidden group"
                     x-data="{ 
                        activeSlide: 0, 
                        slides: [
                            'mediciones-higienicas.jpg',
                            'SISTEMA-DE-GESTIÓN-AMBIENTAL.jpg',
                            'epp.jpg',
                            'ingenieria-quimica.jpg',
                            'iso.jpg',
                            'mediciones-ambientales.jpg',
                            'plan_estructura_vial.jfif',
                            'salud -seguridad-en-el-trabajo.webp'
                        ] 
                     }"
                     x-init="setInterval(() => activeSlide = activeSlide === slides.length - 1 ? 0 : activeSlide + 1, 3500)">
                    
                    <div class="absolute inset-0 bg-brand-navy/10 group-hover:bg-brand-navy/0 transition-colors duration-300 z-20 pointer-events-none rounded-[22px]"></div>
                    
                    <div class="relative h-full w-full rounded-[22px] overflow-hidden bg-white dark:bg-brand-navy">
                        <template x-for="(slide, index) in slides" :key="index">
                            <img :src="'{{ asset('img/inicio/carrusel') }}/' + encodeURI(slide)" 
                                 :alt="'IMGEESSA Imagen ' + (index + 1)" 
                                 class="absolute inset-0 h-full w-full object-cover transform transition-all duration-1000 ease-in-out"
                                 :class="activeSlide === index ? 'opacity-100 scale-100 z-10' : 'opacity-0 scale-105 z-0'">
                        </template>
                    </div>

                    <!-- Indicadores del Carrusel -->
                    <div class="absolute bottom-4 left-0 right-0 z-30 flex justify-center gap-2">
                        <template x-for="(slide, index) in slides" :key="index">
                            <button @click="activeSlide = index" 
                                    class="h-2 w-2 rounded-full transition-all duration-300 shadow-sm"
                                    :class="activeSlide === index ? 'bg-brand-cyan w-4' : 'bg-white/70 hover:bg-white'"></button>
                        </template>
                    </div>
                    <!-- Glassmorphism badge overlay -->
                    <div class="absolute bottom-6 left-6 right-6 backdrop-blur-md bg-white/70 dark:bg-brand-navy-dark/90 p-4 rounded-2xl border border-white/20 dark:border-brand-navy/30 z-20 shadow-lg">
                        <p class="text-xs text-indigo-600 dark:text-indigo-400 font-bold uppercase tracking-wider">Consultoría Especializada HSEQ</p>
                        <p class="text-sm font-bold text-brand-navy dark:text-white mt-1">Entornos laborales seguros, sostenibles y cumplimiento legal.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Stats Grid Section
<section class="py-8 border-y border-zinc-200/40 dark:border-brand-navy/30 bg-white dark:bg-brand-navy/30 transition-colors duration-300">
    <div class="mx-auto max-w-7xl px-4 md:px-8">
        <div class="grid grid-cols-2 gap-6 md:grid-cols-4 text-center">
            <div class="space-y-1">
                <p class="text-4xl font-extrabold text-brand-cyan">+150</p>
                <p class="text-xs font-semibold uppercase tracking-wider text-brand-slate dark:text-zinc-400">Proyectos Industriales</p>
            </div>
            <div class="space-y-1">
                <p class="text-4xl font-extrabold text-indigo-500 dark:text-indigo-400">99.8%</p>
                <p class="text-xs font-semibold uppercase tracking-wider text-brand-slate dark:text-zinc-400">Eficiencia Operativa</p>
            </div>
            <div class="space-y-1">
                <p class="text-4xl font-extrabold text-brand-cyan">12+</p>
                <p class="text-xs font-semibold uppercase tracking-wider text-brand-slate dark:text-zinc-400">Años de Trayectoria</p>
            </div>
            <div class="space-y-1">
                <p class="text-4xl font-extrabold text-indigo-500 dark:text-indigo-400">24h</p>
                <p class="text-xs font-semibold uppercase tracking-wider text-brand-slate dark:text-zinc-400">Respuesta de Soporte</p>
            </div>
        </div>
    </div>
</section> -->

<!-- Core Services / Value Cards Section -->
<section class="py-10 bg-slate-50 dark:bg-brand-navy-dark transition-colors duration-300">
    <div class="mx-auto max-w-7xl px-4 md:px-8 space-y-12">
        <div class="text-center max-w-3xl mx-auto space-y-4">
            <h2 class="text-3xl font-bold tracking-tight text-brand-navy dark:text-white sm:text-4xl">
                ¿Por qué elegir las soluciones de IMGEESSA?
            </h2>
            <p class="text-brand-slate dark:text-zinc-400">
                Acompañamos a organizaciones en el cumplimiento de sus requisitos legales, la optimización de sus procesos y la construcción de entornos laborales seguros y sostenibles.
            </p>
        </div>

        <div class="grid grid-cols-1 gap-8 md:grid-cols-3">
            <!-- Card 1 -->
            <div class="rounded-2xl border border-zinc-200/40 bg-white p-8 dark:border-brand-navy/40 dark:bg-brand-navy/40 shadow-sm hover:shadow-md transition-all duration-300 hover:-translate-y-1 group">
                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-brand-cyan/10 text-brand-cyan group-hover:bg-brand-cyan group-hover:text-brand-navy transition-all duration-300">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                    </svg>
                </div>
                <h3 class="mt-6 text-xl font-bold text-brand-navy dark:text-white">Seguridad y Salud en el Trabajo</h3>
                <p class="mt-2 text-sm text-brand-slate dark:text-zinc-400 leading-relaxed">
                    Implementamos soluciones integrales para garantizar la seguridad de su personal y promover entornos laborales sanos, sostenibles y libres de riesgos.
                </p>
            </div>

            <!-- Card 2 -->
            <div class="rounded-2xl border border-zinc-200/40 bg-white p-8 dark:border-brand-navy/40 dark:bg-brand-navy/40 shadow-sm hover:shadow-md transition-all duration-300 hover:-translate-y-1 group">
                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-brand-cyan/10 text-brand-cyan group-hover:bg-brand-cyan group-hover:text-brand-navy transition-all duration-300">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h3 class="mt-6 text-xl font-bold text-brand-navy dark:text-white">Gestión Ambiental y Calidad</h3>
                <p class="mt-2 text-sm text-brand-slate dark:text-zinc-400 leading-relaxed">
                    Brindamos asesoría especializada para la optimización de sus procesos y la implementación de Sistemas Integrados de Gestión que cumplan con la normativa legal.
                </p>
            </div>

            <!-- Card 3 -->
            <div class="rounded-2xl border border-zinc-200/40 bg-white p-8 dark:border-brand-navy/40 dark:bg-brand-navy/40 shadow-sm hover:shadow-md transition-all duration-300 hover:-translate-y-1 group">
                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-brand-cyan/10 text-brand-cyan group-hover:bg-brand-cyan group-hover:text-brand-navy transition-all duration-300">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                    </svg>
                </div>
                <h3 class="mt-6 text-xl font-bold text-brand-navy dark:text-white">Profesionalismo Técnico</h3>
                <p class="mt-2 text-sm text-brand-slate dark:text-zinc-400 leading-relaxed">
                    Contamos con profesionales altamente calificados y una amplia experiencia técnica para generar valor agregado y promover el crecimiento continuo de su empresa.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Lineas de Negocio Section -->
<section class="py-10 bg-white dark:bg-brand-navy-dark/40 border-t border-zinc-200/40 dark:border-brand-navy/30 transition-colors duration-300"
         x-data="{
             modalOpen: false,
             activeService: null,
             services: [
                 { 
                    id: 6, 
                     title: 'BATERIAS DE RIESGO PSICOSOCIAL Y MEDICIONES AMBIENTALES', 
                     category: 'Diagnóstico Psicosocial y Ambiental',
                     price: 'Consultar',
                     image: '{{ asset('img/inicio/lineas_de_negocio/MEDICIONES-AMBIENTALES.jpg') }}',
                     desc: 'Implementación de baterías de riesgo psicosocial, intervenciones y mediciones precisas de higiene industrial y entorno de trabajo.',
                     specs: [
                         'Implementación baterías de riesgo psicosocial e intervenciones psicosociales.',
                         'Diseño, implementación y mejora del sistema de vigilancia epidemiológico psicosocial.',
                         'Análisis de puesto de trabajo.',
                         'Mediciones físicas: Sonometría, Luxometría, Radiometría, Dosimetría, Vibrometría, Confort térmico.',
                         'Medición de Material particulado, Polvo fracción respirable e inhalable, Sílice cristalina.',
                         'Medición de Vapores inorgánicos, Compuestos orgánicos volátiles (COV) y Humos metálicos/soldadura.',
                         'Medición de Metano CH4, Ácido sulfhídrico, Gases de combustión, Nieblas y rocíos.'
                     ]
                 },
                 { 
                     id: 1, 
                     title: 'MEDICIONES HIGIÉNICAS', 
                     category: 'Mediciones Higiénicas',
                     price: 'Consultar',
                     image: '{{ asset('img/inicio/lineas_de_negocio/mediciones-higienicas.jpg') }}',
                     desc: 'Brindamos soluciones integrales en higiene industrial, realizando mediciones precisas y asesoría especializada para garantizar entornos laborales seguros y cumpliendo con la normatividad vigente.',
                     specs: [
                         'Mediciones de ruido.',
                         'Iluminación.',
                         'Material particulado.',
                         'Vapores orgánicos e inorgánicos.',
                         'Gases de combustión.',
                         'Vibración.',
                         'Confort térmico.',
                         'Radiación.',
                         'Polvo respirable e inhalable.',
                         'Sílice cristalina.',
                         'Metano CH4, Ácido sulfhídrico H2S.',
                         'Humo de soldadura.',
                         'Compuestos orgánicos volátiles (COV).',
                         'Nieblas y rocíos.',
                         'Monóxido de carbono (CO).',
                         'Dióxido de carbono (CO2).',
                         'Ácido sulfhídrico (H2S).',
                         'Oxidos de nitrógeno (NOx).',
                         'Metales pesados.'
                     ]
                     
                 },
                 { 
                     id: 3, 
                     title: 'SISTEMA DE GESTIÓN DE SEGURIDAD Y SALUD EN EL TRABAJO', 
                     category: 'SST',
                     price: 'Consultar',
                     image: '{{ asset('img/inicio/lineas_de_negocio/SEGURIDAD-Y-SALUD-EN-EL-TRABAJO.jpg') }}',
                     desc: 'Diseño, implementación y mejora de sistemas de gestión de SST, medicina laboral, auditorías y administración del SG-SST.',
                     specs: [
                         'Diseño, implementación y mejora de sistemas de gestión de seguridad y salud en el trabajo.',
                         'Diseño, implementación y mejora de sistemas de vigilancia epidemiológica.',
                         'Asesoría en seguridad y salud en el trabajo.',
                         'Administración del SG-SST con profesionales altamente calificados.',
                         'Auditorias bajo lineamientos ISO 45001, RUC, Decreto 1072/2015 y Resolución 0312/2019.',
                         'Asesorías en procesos de rehabilitación y reintegro laboral.',
                         'Asesorías en Medicina Laboral.',
                         'Diseño de profesiogramas.',
                         'Implementación del Sistema Globalmente Armonizado SGA.'
                     ]
                 },
                 { 
                     id: 4, 
                     title: 'SISTEMA DE GESTIÓN AMBIENTAL', 
                     category: 'Gestión Ambiental',
                     price: 'Consultar',
                     image: '{{ asset('img/inicio/lineas_de_negocio/GESTION-AMBIENTAL.webp') }}',
                     desc: 'Diseño, implementación y mantenimiento de Sistemas de Gestión Ambiental, sostenibilidad, auditorías ISO 14001 y trámites normativos.',
                     specs: [
                         'Diseño, implementación y mantenimiento de sistemas de Gestión Ambiental SGA y sostenibilidad.',
                         'Auditoria bajo lineamientos de ISO 14001:2015.',
                         'Sistemas de gestión de la sostenibilidad para establecimientos de alojamiento (NTC 6503).',
                         'Sistemas de gestión de la sostenibilidad para agencias de Viajes (NTC 6502).',
                         'Sistemas de gestión de la sostenibilidad para establecimientos Gastronómicos, bares y similares (NTC 6496).',
                         'Trámites de vertimientos de Agua y residuos líquidos.',
                         'Implementación y Asesoría en el registro único ambiental RUA.',
                         'Diseño e implementación: programa de vertimientos, uso eficiente de agua/energía, manejo de residuos sólidos y educación ambiental.'
                     ]
                 },
                 { 
                     id: 5, 
                     title: 'PLAN ESTRATEGICO DE SEGURIDAD VIAL', 
                     category: 'Seguridad Vial',
                     price: 'Consultar',
                     image: '{{ asset('img/inicio/lineas_de_negocio/SEGURIDAD-VIAL.webp') }}',
                     desc: 'Diseño, implementación y mejora de Planes Estratégicos de Seguridad Vial (PESV), auditorías e investigación de siniestros.',
                     specs: [
                         'Diseño, implementación y mejora de planes estratégicos de seguridad vial.',
                         'Auditoria bajo lineamientos ISO 39001 y Resolución 40595/2022.',
                         'Diagnóstico de planes estratégicos de seguridad vial.',
                         'Investigación de siniestros viales.'
                     ]
                 },
                 { 
                     id: 2, 
                     title: 'SISTEMA DE GESTIÓN DE CALIDAD', 
                     category: 'Gestión de Calidad',
                     price: 'Consultar',
                     image: '{{ asset('img/inicio/lineas_de_negocio/SISTEMA-DE-GESTION-DE-CALIDAD.webp') }}',
                     desc: 'Diseño, implementación y mejora de Sistemas de Gestión de Calidad SGC.',
                     specs: [
                         'Auditoría bajo lineamientos ISO 9001:2015.',
                         'Evaluación de desempeño.',
                         'Evaluación de proveedores.',
                         'Control y seguimiento de productos o servicios no conformes.'
                     ]
                 },
                 { 
                     id: 7, 
                     title: 'VENTA DE EPP Y FERRETERIA', 
                     category: 'Suministros EPP y Ferretería',
                     price: 'Cotizar',
                     image: '{{ asset('img/inicio/lineas_de_negocio/EPP-Y-FERRETERIA.jpg') }}',
                     desc: 'Suministro integral de Equipos de Protección Personal (EPP), seguridad industrial, maquinaria y ferretería.',
                     specs: [
                         'Protección EPP: Craneal, facial, ocular, auditiva y respiratoria.',
                         'Protección EPP: Para manos, pies y corporal.',
                         'Protección contra caídas y espacios confinados.',
                         'Detección de gases, medición y señalización.',
                         'Bloqueo, etiquetado, izaje para cargas, maquinaria y ferretería.',
                         'Equipos contraincendios, manejo de derrames, residuos y desechos.',
                         'Atención prehospitalaria, emergencias y control de nieblas/rocíos.'
                     ]
                 },
                 { 
                     id: 8, 
                     title: 'PROCESOS, INGENIERÍA QUÍMICA Y PRODUCCIÓN BASADA EN SISTEMAS DE GESTIÓN', 
                     category: 'Ingeniería y Producción',
                     price: 'Consultar',
                     image: '{{ asset('img/inicio/lineas_de_negocio/INGENIERIA-QUIMICA.jpg') }}',
                     desc: 'Desarrollo, optimización y montaje de procesos industriales, plantas de producción y laboratorios químicos.',
                     specs: [
                         'Desarrollo, diseño, operación, mantenimiento y optimización de procesos industriales que generan cambios físicos, químicos y/o bioquímicos en la materia.',
                         'Montaje de laboratorios y plantas industriales.'
                     ]
                 }
             ]
         }">
    <div class="mx-auto max-w-7xl px-4 md:px-8 space-y-12">
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-4">
            <div class="space-y-3 max-w-2xl">
                <h2 class="text-3xl font-bold tracking-tight text-brand-navy dark:text-white sm:text-4xl">
                    Nuestras Líneas de Negocio
                </h2>
                <p class="text-brand-slate dark:text-zinc-400">
                    Conoce todas nuestras áreas de especialización y servicios diseñados para proteger y fortalecer tu organización.
                </p>
            </div>
        </div>

        <!-- Catalog Grid -->
        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">
            <template x-for="service in services" :key="service.id">
                <div class="flex flex-col overflow-hidden rounded-2xl border border-zinc-200/40 bg-white dark:border-brand-navy/40 dark:bg-brand-navy/50 group shadow-md hover:shadow-xl hover:shadow-brand-cyan/40 dark:hover:shadow-brand-cyan/20 hover:-translate-y-1.5 transition-all duration-300 ease-out">
                    <div class="relative aspect-video w-full overflow-hidden bg-zinc-100 dark:bg-brand-navy-dark">
                        <img :src="service.image" 
                             :alt="service.title" 
                             class="h-full w-full object-cover group-hover:scale-105 transition-transform duration-500">
                        <span class="absolute top-4 left-4 rounded-full bg-brand-cyan px-3 py-1 text-xs font-bold text-brand-navy shadow-sm" x-text="service.category">
                        </span>
                    </div>
                    <div class="flex flex-1 flex-col p-6 space-y-4">
                        <div class="space-y-2 flex-grow">
                            <h3 class="text-lg font-bold text-brand-navy dark:text-white leading-tight" x-text="service.title"></h3>
                            <p class="text-sm text-brand-slate dark:text-zinc-400 line-clamp-2" x-text="service.desc"></p>
                        </div>
                        <div class="flex items-center justify-end border-t border-zinc-100 dark:border-brand-navy/40 pt-4">
                            <button @click="activeService = service; modalOpen = true" 
                               class="inline-flex items-center justify-center rounded-lg bg-blue-900 hover:bg-blue-700 text-white px-4 py-2 text-sm font-bold transition-colors duration-300">
                                Detalles
                            </button>
                        </div>
                    </div>
                </div>
            </template>
        </div>
    </div>

    <!-- Modal for Service Details -->
    <div x-show="modalOpen" 
         x-cloak
         style="display: none;"
         class="fixed inset-0 z-50 flex items-center justify-center p-4 sm:p-6 bg-brand-navy-dark/80 backdrop-blur-sm transition-opacity"
         x-transition:enter="ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0">
        
        <div x-show="modalOpen" 
             @click.away="modalOpen = false"
             class="relative bg-white dark:bg-brand-navy rounded-2xl overflow-hidden shadow-2xl transform transition-all w-full max-w-6xl max-h-[90vh] flex flex-col md:flex-row"
             x-transition:enter="ease-out duration-300"
             x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
             x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
             x-transition:leave="ease-in duration-200"
             x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
             x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
             
            <!-- Left: Image -->
            <div class="md:w-5/12 w-full h-64 md:h-auto relative bg-zinc-100 shrink-0">
                <img :src="activeService?.image" class="absolute inset-0 w-full h-full object-cover">
            </div>

            <!-- Right: Content -->
            <div class="md:w-7/12 w-full flex flex-col p-5 sm:p-6 overflow-y-auto relative">
                <!-- Close Button -->
                <button @click="modalOpen = false" class="absolute top-4 right-4 bg-zinc-100 hover:bg-zinc-200 dark:bg-brand-navy-dark dark:hover:bg-brand-navy-dark/80 p-2 rounded-full transition-colors z-10 focus:outline-none">
                    <svg class="h-5 w-5 text-zinc-500 dark:text-zinc-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
                
                <div class="space-y-4 flex-grow">
                    <!-- Title Area -->
                    <div class="pr-8">
                        <span class="inline-block px-3 py-1 bg-brand-cyan/20 text-brand-cyan-dark dark:text-brand-cyan rounded-full text-xs font-bold mb-2" x-text="activeService?.category"></span>
                        <h2 class="text-2xl font-extrabold text-brand-navy dark:text-white leading-tight" x-text="activeService?.title"></h2>
                    </div>
                    
                    <!-- Description -->
                    <div>
                        <h4 class="text-xs font-bold text-brand-slate uppercase tracking-wider mb-2">Descripción</h4>
                        <p class="text-sm text-zinc-600 dark:text-zinc-300 leading-relaxed" x-text="activeService?.desc"></p>
                    </div>

                    <!-- Specs -->
                    <template x-if="activeService?.specs && activeService.specs.length > 0">
                        <div>
                            <h4 class="text-xs font-bold text-brand-slate uppercase tracking-wider mb-2">Especificaciones Técnicas</h4>
                            <ul class="text-sm text-zinc-600 dark:text-zinc-300 space-y-1 list-disc pl-4">
                                <template x-for="spec in activeService.specs" :key="spec">
                                    <li x-text="spec"></li>
                                </template>
                            </ul>
                        </div>
                    </template>
                </div>

                <!-- Footer CTA -->
                <div class="pt-5 mt-auto flex justify-end">
                    <a href="{{ route('contacto') }}" class="inline-flex items-center justify-center rounded-lg bg-indigo-600 px-6 py-2.5 text-sm font-bold text-white hover:bg-indigo-700 transition-colors shadow-md">
                        Cotizar Servicio
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Catalog Collage Section -->
<section class="py-10 md:py-16 bg-white dark:bg-brand-navy-dark transition-colors duration-300">
    <div class="mx-auto max-w-7xl px-4 md:px-8 space-y-10">
        <div class="text-center max-w-3xl mx-auto space-y-4">
            <h2 class="text-3xl font-bold tracking-tight text-brand-navy dark:text-white sm:text-4xl">
                Explora Nuestro Catálogo
            </h2>
            <p class="text-brand-slate dark:text-zinc-400">
                Descubre nuestra amplia gama de productos, equipos de protección y servicios especializados.
            </p>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 auto-rows-[200px]">
            <!-- Item 1 (Large) -->
            <a href="{{ route('catalogo') }}" class="group relative overflow-hidden rounded-2xl col-span-2 md:col-span-2 row-span-2 md:row-span-2 shadow-sm hover:shadow-xl hover:shadow-brand-cyan/20 transition-all duration-300">
                <img src="{{ asset('img/catalogo/equipo-de-proteccion-industrial.webp') }}" alt="EPP y Ferretería" class="absolute inset-0 h-full w-full object-cover transition-transform duration-700 group-hover:scale-105">
                <div class="absolute inset-0 bg-gradient-to-t from-brand-navy-dark/90 via-brand-navy-dark/30 to-transparent transition-opacity"></div>
                <div class="absolute bottom-6 left-6 right-6 flex flex-col justify-end items-start h-full pb-2">
                    <span class="inline-flex items-center gap-1.5 rounded-full bg-brand-cyan/90 px-3 py-1 text-xs font-bold uppercase tracking-wider text-brand-navy shadow-sm mb-3">Suministros Industriales</span>
                    <h3 class="text-2xl md:text-3xl font-extrabold text-white">EPP y Ferretería</h3>
                    <p class="mt-2 text-zinc-300 text-sm max-w-sm hidden sm:block opacity-0 group-hover:opacity-100 transition-opacity duration-500 delay-100">Equipos de protección personal, herramientas y materiales de alta calidad.</p>
                </div>
            </a>

            <!-- Item 2 -->
            <a href="{{ route('catalogo') }}" class="group relative overflow-hidden rounded-2xl col-span-2 md:col-span-1 row-span-1 md:row-span-1 shadow-sm hover:shadow-lg transition-all duration-300">
                <img src="{{ asset('img/catalogo/seguridad_salud_salud_en_el_trabajo.webp') }}" alt="Seguridad y Salud" class="absolute inset-0 h-full w-full object-cover transition-transform duration-700 group-hover:scale-110">
                <div class="absolute inset-0 bg-gradient-to-t from-brand-navy-dark/80 to-transparent transition-opacity"></div>
                <div class="absolute bottom-4 left-4 right-4">
                    <h3 class="text-lg font-bold text-white group-hover:text-brand-cyan transition-colors">Seguridad y Salud</h3>
                </div>
            </a>

            <!-- Item 3 -->
            <a href="{{ route('catalogo') }}" class="group relative overflow-hidden rounded-2xl col-span-2 md:col-span-1 row-span-1 md:row-span-2 shadow-sm hover:shadow-lg transition-all duration-300">
                <img src="{{ asset('img/catalogo/sistema-de-gestion-ambiental.jpg') }}" alt="Gestión Ambiental" class="absolute inset-0 h-full w-full object-cover transition-transform duration-700 group-hover:scale-110">
                <div class="absolute inset-0 bg-gradient-to-t from-brand-navy-dark/90 via-brand-navy-dark/20 to-transparent transition-opacity"></div>
                <div class="absolute bottom-4 left-4 right-4 md:bottom-6 md:left-6">
                    <h3 class="text-xl font-bold text-white group-hover:text-brand-cyan transition-colors">Gestión Ambiental</h3>
                </div>
            </a>

            <!-- Item 4 -->
            <a href="{{ route('catalogo') }}" class="group relative overflow-hidden rounded-2xl col-span-2 md:col-span-1 row-span-1 md:row-span-1 shadow-sm hover:shadow-lg transition-all duration-300">
                <img src="{{ asset('img/catalogo/Mediciones-ambientales.png') }}" alt="Mediciones" class="absolute inset-0 h-full w-full object-cover transition-transform duration-700 group-hover:scale-110">
                <div class="absolute inset-0 bg-gradient-to-t from-brand-navy-dark/80 to-transparent transition-opacity"></div>
                <div class="absolute bottom-4 left-4 right-4">
                    <h3 class="text-lg font-bold text-white group-hover:text-brand-cyan transition-colors">Mediciones</h3>
                </div>
            </a>
        </div>
        
        <div class="flex justify-center pt-2">
            <a href="{{ route('catalogo') }}" class="inline-flex items-center gap-2 text-sm font-bold text-brand-cyan hover:text-brand-cyan-dark transition-colors group">
                Ver Todo el Catálogo
                <svg class="h-4 w-4 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
            </a>
        </div>
    </div>
</section>

<!-- Our Clients Section (Auto-sliding Marquee) -->
@php
    $clientesImages = [
        '3HTPC.png', 'Aviomar.png', 'JAG.png', 'aec.png', 'amarillo.png', 
        'arl_sura.webp', 'celuvans.png', 'conbel.png', 'corona.jfif', 'desigual.jpg',
        'dvo.jpg', 'gema.png', 'handel.png', 'induser.png', 'large.webp', 
        'mascosas.jfif', 'multigecon.jfif', 'olam.jfif', 'prodesa.png', 'pronabell.jpg', 
        'proquimort.jfif', 'real transportadora.png', 'ryg.png', 'seguros_Bolivar.jpg', 
        'sercapetrol.jpeg', 'skalar.jfif', 'snider.png', 'taxisya.png', 'trocadero.png', 'zonamedica.jfif'
    ];
@endphp

<style>
@keyframes slide-left {
  0% { transform: translateX(0); }
  100% { transform: translateX(-100%); }
}
.animate-slide-left {
  animation: slide-left 120s linear infinite;
}
.pause-animation:hover .animate-slide-left {
  animation-play-state: paused;
}
</style>
<section class="py-10 bg-slate-50 dark:bg-brand-navy-dark transition-colors duration-300 overflow-hidden">
    <div class="mx-auto max-w-7xl px-4 md:px-8 space-y-12">
        <div class="text-center max-w-3xl mx-auto space-y-4">
            <h2 class="text-3xl font-bold tracking-tight text-brand-navy dark:text-white sm:text-4xl">
                Nuestros Clientes
            </h2>
            <p class="text-brand-slate dark:text-zinc-400">
                Organizaciones de diversos sectores confían en nuestra experiencia y soluciones para el cumplimiento normativo y la gestión eficiente de sus procesos.
            </p>
        </div>

        <!-- Marquee Container -->
        <div class="relative flex overflow-hidden pause-animation group">
            <!-- Fade overlays for smooth entry/exit -->
            <div class="pointer-events-none absolute inset-y-0 left-0 z-10 w-24 bg-gradient-to-r from-slate-50 dark:from-brand-navy-dark to-transparent"></div>
            <div class="pointer-events-none absolute inset-y-0 right-0 z-10 w-24 bg-gradient-to-l from-slate-50 dark:from-brand-navy-dark to-transparent"></div>

            <!-- First Marquee Track -->
            <div class="flex animate-slide-left whitespace-nowrap items-center shrink-0 space-x-6 px-3">
                @foreach($clientesImages as $img)
                <div class="flex h-40 w-64 shrink-0 items-center justify-center rounded-2xl border border-zinc-200/60 bg-white p-6 dark:border-brand-navy/50 dark:bg-white grayscale-0 md:grayscale group-hover:grayscale-0 transition-all duration-500 shadow-sm">
                    <img src="{{ asset('img/inicio/nuestros_clientes/' . $img) }}" alt="Cliente" class="max-h-full max-w-full object-contain">
                </div>
                @endforeach
            </div>

            <!-- Second Marquee Track (Duplicate for infinite loop) -->
            <div class="flex animate-slide-left whitespace-nowrap items-center shrink-0 space-x-6 px-3">
                @foreach($clientesImages as $img)
                <div class="flex h-40 w-64 shrink-0 items-center justify-center rounded-2xl border border-zinc-200/60 bg-white p-6 dark:border-brand-navy/50 dark:bg-white grayscale-0 md:grayscale group-hover:grayscale-0 transition-all duration-500 shadow-sm">
                    <img src="{{ asset('img/inicio/nuestros_clientes/' . $img) }}" alt="Cliente" class="max-h-full max-w-full object-contain">
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<!-- Call to Action Section -->
<section class="py-8 md:py-10 bg-white dark:bg-brand-navy-dark transition-colors duration-300">
    <div class="mx-auto max-w-7xl px-4 md:px-8">
        <div class="relative rounded-3xl overflow-hidden bg-gradient-to-tr from-brand-navy to-indigo-950 px-8 py-8 md:px-12 md:py-8 shadow-2xl text-center md:text-left">
            <div class="absolute inset-0 opacity-10 bg-[radial-gradient(ellipse_at_center,_var(--tw-gradient-stops))] from-brand-cyan to-transparent"></div>
            <div class="relative grid grid-cols-1 gap-6 md:grid-cols-12 items-center z-10">
                <div class="md:col-span-8 space-y-2.5">
                    <h2 class="text-2xl md:text-3xl font-bold tracking-tight text-white">
                        ¿Listo para potenciar la gestión y seguridad de su organización?
                    </h2>
                    <p class="text-zinc-300 text-sm max-w-2xl leading-relaxed">
                        Póngase en contacto hoy mismo con nuestro equipo de profesionales para recibir asesoría especializada en sistemas de gestión integrados, normativas, prevención de riesgos e ingeniería de procesos.
                    </p>
                </div>
                <div class="md:col-span-4 flex justify-center md:justify-end">
                    <a href="{{ route('contacto') }}" class="inline-flex items-center justify-center rounded-xl bg-brand-cyan hover:bg-brand-cyan-dark px-6 py-3 text-sm font-bold text-brand-navy shadow hover:shadow-lg transition-all duration-300 hover:scale-105">
                        Agendar Consultoría Gratuita
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
