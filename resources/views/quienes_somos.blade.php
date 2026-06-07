@extends('layouts.app')

@section('title', 'Quiénes Somos | IMGEESSA')

@section('content')
<!-- Header / Hero Section -->
<section class="relative overflow-hidden py-12 lg:py-16 bg-gradient-to-b from-brand-navy-dark to-brand-navy text-white border-b border-brand-navy/30">
    <!-- Background glows -->
    <div class="absolute inset-0 -z-10 bg-[radial-gradient(45rem_20rem_at_center,rgba(0,210,211,0.15),transparent)]"></div>
    <div class="absolute -top-24 right-10 h-72 w-72 rounded-full bg-brand-cyan/10 blur-3xl"></div>
    
    <div class="mx-auto max-w-7xl px-4 md:px-8 text-center space-y-4">
        <span class="inline-flex items-center gap-1.5 rounded-full bg-brand-cyan/10 px-4 py-1.5 text-xs font-bold uppercase tracking-wider text-brand-cyan border border-brand-cyan/20 animate-pulse">
            Conoce a IMGEESSA
        </span>
        <h1 class="text-4xl font-extrabold tracking-tight sm:text-6xl text-white">
            Quiénes <span class="text-brand-cyan">Somos</span>
        </h1>
        <p class="mx-auto max-w-3xl text-lg text-zinc-300 leading-relaxed font-light">
            Especialistas dedicados a potenciar la infraestructura industrial y organizacional a través de soluciones integrales HSEQ, ingeniería química y mediciones especializadas.
        </p>
    </div>
</section>

<!-- Company Identity & Stats Section -->
<section class="py-16 bg-white dark:bg-brand-navy-dark transition-colors duration-300">
    <div class="mx-auto max-w-7xl px-4 md:px-8">
        <div class="grid grid-cols-1 gap-16 lg:grid-cols-12 lg:items-center">
            <!-- Left: Text Content -->
            <div class="lg:col-span-7 space-y-8">
                <div class="space-y-4">
                    <span class="text-xs font-bold uppercase tracking-wider text-brand-cyan bg-brand-cyan/10 px-3.5 py-1 rounded-md">
                        Nuestra Identidad HSEQ
                    </span>
                    <h2 class="text-3xl font-extrabold tracking-tight text-brand-navy dark:text-white sm:text-4xl">
                        Comprometidos con el desarrollo seguro y sostenible de la industria
                    </h2>
                </div>
                
                <div class="space-y-6 text-brand-slate dark:text-zinc-300 text-base leading-relaxed">
                    <p>
                        <strong class="text-brand-navy dark:text-brand-cyan">IMGEESSA Soluciones Integrales HSEQ</strong> es una empresa dedicada a brindar servicios especializados en Sistemas de Gestión de la Seguridad y Salud en el Trabajo, Gestión Ambiental, Gestión de Calidad, Gestión de Inocuidad Alimentaria, Ingeniería Química y Mediciones Higiénicas.
                    </p>
                    <p>
                        Apoyamos a nuestros clientes en el cumplimiento de los objetivos definidos para el cuidado y protección de sus colaboradores, la reducción del impacto ambiental, la satisfacción del cliente y la calidad de todos sus procesos operativos y técnicos.
                    </p>
                </div>
                
                <!-- Call to Action link -->
                <div class="pt-2">
                    <a href="{{ route('contacto') }}" class="inline-flex items-center gap-2 text-sm font-bold text-brand-cyan hover:text-brand-cyan-dark transition-colors group">
                        Cotiza una consultoría con nosotros
                        <svg class="h-4 w-4 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Right: PDF Graphic/Avatar with Stats summary -->
            <div class="lg:col-span-5 relative">
                <!-- Circular background glow -->
                <div class="absolute inset-0 bg-brand-cyan/5 rounded-full blur-3xl -z-10"></div>
                <div class="rounded-3xl border border-zinc-200/50 bg-slate-50/50 p-8 dark:border-brand-navy/40 dark:bg-brand-navy/45 shadow-xl relative overflow-hidden group">
                    <div class="aspect-square w-48 mx-auto overflow-hidden rounded-full border-4 border-brand-cyan/20 bg-brand-navy/5 dark:bg-brand-navy/20 shadow-inner mb-6 relative">
                        <img src="{{ asset('img/pdf_extracted/page_7_img_10.png') }}" 
                             alt="Personaje HSEQ IMGEESSA" 
                             class="h-full w-full object-contain p-2 transform group-hover:scale-105 transition-transform duration-500">
                    </div>
                    <div class="text-center space-y-2">
                        <span class="text-brand-cyan text-xs font-bold uppercase tracking-wider">HSEQ Partner</span>
                        <h3 class="text-xl font-extrabold text-brand-navy dark:text-white">IMGEESSA Colombia</h3>
                        <p class="text-sm text-brand-slate dark:text-zinc-350 leading-relaxed font-light">
                            Representamos el soporte, profesionalismo e innovación técnica que tu planta industrial necesita.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Stats Row -->
        <div class="mt-20 grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4 border-t border-zinc-200/50 dark:border-brand-navy/40 pt-16">
            <!-- Stat 1 -->
            <div class="p-6 space-y-3">
                <span class="text-4xl font-extrabold text-brand-cyan">200+</span>
                <h4 class="text-base font-bold text-brand-navy dark:text-white">Clientes Satisfechos</h4>
                <p class="text-sm text-brand-slate dark:text-zinc-400 font-light leading-relaxed">Avalados por nuestra trayectoria y resultados de alto valor.</p>
            </div>
            <!-- Stat 2 -->
            <div class="p-6 space-y-3">
                <span class="text-4xl font-extrabold text-brand-cyan">7+ Años</span>
                <h4 class="text-base font-bold text-brand-navy dark:text-white">De Experiencia</h4>
                <p class="text-sm text-brand-slate dark:text-zinc-400 font-light leading-relaxed">Brindando consultorías técnicas y de sistemas de gestión industrial.</p>
            </div>
            <!-- Stat 3 -->
            <div class="p-6 space-y-3">
                <span class="text-4xl font-extrabold text-brand-cyan">HSEQ</span>
                <h4 class="text-base font-bold text-brand-navy dark:text-white">Soluciones Integrales</h4>
                <p class="text-sm text-brand-slate dark:text-zinc-400 font-light leading-relaxed">Cuidado de colaboradores, medio ambiente y calidad de procesos.</p>
            </div>
            <!-- Stat 4 -->
            <div class="p-6 space-y-3">
                <span class="text-4xl font-extrabold text-brand-cyan">CRECER</span>
                <h4 class="text-base font-bold text-brand-navy dark:text-white">Dos Enfoques</h4>
                <p class="text-sm text-brand-slate dark:text-zinc-400 font-light leading-relaxed">Trabajamos bajo un solo gran objetivo: expandir tu organización.</p>
            </div>
        </div>
    </div>
</section>

<!-- Mission & Vision Section (With exact PDF images) -->
<section class="py-16 bg-slate-50 dark:bg-brand-navy-dark/40 border-t border-zinc-200/40 dark:border-brand-navy/30 transition-colors duration-300">
    <div class="mx-auto max-w-7xl px-4 md:px-8">
        <div class="grid grid-cols-1 gap-12 md:grid-cols-2">
            <!-- Misión -->
            <div class="flex flex-col rounded-3xl border border-zinc-200/40 bg-white dark:border-brand-navy/40 dark:bg-brand-navy/40 shadow-lg overflow-hidden group hover:shadow-xl hover:border-brand-cyan/20 transition-all duration-300">
                <!-- Cover Image from PDF (page_3_img_1.jpeg) -->
                <div class="relative aspect-video w-full overflow-hidden bg-zinc-100 dark:bg-brand-navy-dark">
                    <img src="{{ asset('img/pdf_extracted/page_3_img_1.jpeg') }}" 
                         alt="Misión IMGEESSA - Profesionales" 
                         class="h-full w-full object-cover group-hover:scale-102 transition-transform duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-black/10 to-transparent"></div>
                    <span class="absolute bottom-4 left-6 text-sm font-bold uppercase tracking-wider text-brand-cyan bg-brand-navy/80 px-3 py-1 rounded-md">
                        Objetivos y Enfoque
                    </span>
                </div>
                
                <div class="p-8 md:p-10 space-y-4 flex-grow">
                    <div class="flex items-center gap-3">
                        <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-brand-cyan/10 text-brand-cyan">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-brand-navy dark:text-white">Nuestra Misión</h3>
                    </div>
                    <p class="text-base text-brand-slate dark:text-zinc-300 leading-relaxed font-light pt-2">
                        Somos una empresa orientada en crear valor agregado en nuestros clientes con soluciones integrales en el diseño, actualización y mejora de los sistemas de gestión de seguridad y salud en el trabajo, calidad, medio ambiente, seguridad vial, inocuidad alimentaria e ingeniería química, enfocados en el cumplimiento de los requisitos legales y resultados sostenibles.
                    </p>
                </div>
            </div>

            <!-- Visión -->
            <div class="flex flex-col rounded-3xl border border-zinc-200/40 bg-white dark:border-brand-navy/40 dark:bg-brand-navy/40 shadow-lg overflow-hidden group hover:shadow-xl hover:border-brand-cyan/20 transition-all duration-300">
                <!-- Cover Image from PDF (page_4_img_1.jpeg) -->
                <div class="relative aspect-video w-full overflow-hidden bg-zinc-100 dark:bg-brand-navy-dark">
                    <img src="{{ asset('img/pdf_extracted/page_4_img_1.jpeg') }}" 
                         alt="Visión IMGEESSA - Éxito del equipo" 
                         class="h-full w-full object-cover group-hover:scale-102 transition-transform duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-black/10 to-transparent"></div>
                    <span class="absolute bottom-4 left-6 text-sm font-bold uppercase tracking-wider text-brand-cyan bg-brand-navy/80 px-3 py-1 rounded-md">
                        Rumbo al 2030
                    </span>
                </div>
                
                <div class="p-8 md:p-10 space-y-4 flex-grow">
                    <div class="flex items-center gap-3">
                        <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-brand-cyan/10 text-brand-cyan">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-brand-navy dark:text-white">Nuestra Visión</h3>
                    </div>
                    <p class="text-base text-brand-slate dark:text-zinc-300 leading-relaxed font-light pt-2">
                        En el año 2030, <strong class="text-brand-navy dark:text-brand-cyan font-bold">IMGEESSA Soluciones Integrales HSEQ</strong> será una empresa líder en proveer servicios de alto valor en sistemas de gestión de seguridad y salud en el trabajo, calidad, medio ambiente, seguridad vial, inocuidad alimentaria e ingeniería química reconocida a nivel nacional.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Interactive Values Section (C.R.E.C.E.) with Alpine.js -->
<section class="py-16 bg-white dark:bg-brand-navy-dark transition-colors duration-300 overflow-hidden" 
         x-data="{ activeValue: 1 }">
    <div class="mx-auto max-w-7xl px-4 md:px-8 space-y-16">
        <div class="text-center max-w-3xl mx-auto space-y-4">
            <span class="text-xs font-bold uppercase tracking-wider text-brand-cyan bg-brand-cyan/10 px-3.5 py-1 rounded-md animate-pulse">
                Pilares Fundamentales
            </span>
            <h2 class="text-3xl font-extrabold tracking-tight text-brand-navy dark:text-white sm:text-4xl">
                Valores Corporativos: C.R.E.C.E.
            </h2>
            <p class="text-brand-slate dark:text-zinc-300 max-w-xl mx-auto font-light text-base">
                Haz clic o pasa el cursor sobre cada letra del acrónimo para descubrir nuestra filosofía operativa de mejora continua.
            </p>
        </div>

        <!-- Interactive Panel Layout -->
        <div class="grid grid-cols-1 gap-12 lg:grid-cols-12 lg:items-center">
            
            <!-- Left side: Interactive letters menu -->
            <div class="lg:col-span-2 flex flex-row lg:flex-col justify-center gap-4 lg:gap-6 flex-wrap">
                <!-- C - Calidad -->
                <button @mouseenter="activeValue = 1" @click="activeValue = 1" type="button"
                        id="val-btn-1"
                        class="h-16 w-16 lg:h-20 lg:w-20 rounded-full border-2 text-2xl lg:text-3xl font-black transition-all duration-300 flex items-center justify-center cursor-pointer shadow-md focus:outline-none focus:ring-2 focus:ring-brand-cyan"
                        :class="activeValue === 1 ? 'bg-brand-cyan border-brand-cyan text-brand-navy scale-110 shadow-cyan-400/20' : 'bg-transparent border-zinc-200 dark:border-brand-navy/60 text-brand-navy dark:text-zinc-300 hover:border-brand-cyan hover:text-brand-cyan hover:scale-105'">
                    C
                </button>
                <!-- R - Responsabilidad -->
                <button @mouseenter="activeValue = 2" @click="activeValue = 2" type="button"
                        id="val-btn-2"
                        class="h-16 w-16 lg:h-20 lg:w-20 rounded-full border-2 text-2xl lg:text-3xl font-black transition-all duration-300 flex items-center justify-center cursor-pointer shadow-md focus:outline-none focus:ring-2 focus:ring-brand-cyan"
                        :class="activeValue === 2 ? 'bg-brand-cyan border-brand-cyan text-brand-navy scale-110 shadow-cyan-400/20' : 'bg-transparent border-zinc-200 dark:border-brand-navy/60 text-brand-navy dark:text-zinc-300 hover:border-brand-cyan hover:text-brand-cyan hover:scale-105'">
                    R
                </button>
                <!-- E - Enfoque al Cliente -->
                <button @mouseenter="activeValue = 3" @click="activeValue = 3" type="button"
                        id="val-btn-3"
                        class="h-16 w-16 lg:h-20 lg:w-20 rounded-full border-2 text-2xl lg:text-3xl font-black transition-all duration-300 flex items-center justify-center cursor-pointer shadow-md focus:outline-none focus:ring-2 focus:ring-brand-cyan"
                        :class="activeValue === 3 ? 'bg-brand-cyan border-brand-cyan text-brand-navy scale-110 shadow-cyan-400/20' : 'bg-transparent border-zinc-200 dark:border-brand-navy/60 text-brand-navy dark:text-zinc-300 hover:border-brand-cyan hover:text-brand-cyan hover:scale-105'">
                    E
                </button>
                <!-- C - Compromiso -->
                <button @mouseenter="activeValue = 4" @click="activeValue = 4" type="button"
                        id="val-btn-4"
                        class="h-16 w-16 lg:h-20 lg:w-20 rounded-full border-2 text-2xl lg:text-3xl font-black transition-all duration-300 flex items-center justify-center cursor-pointer shadow-md focus:outline-none focus:ring-2 focus:ring-brand-cyan"
                        :class="activeValue === 4 ? 'bg-brand-cyan border-brand-cyan text-brand-navy scale-110 shadow-cyan-400/20' : 'bg-transparent border-zinc-200 dark:border-brand-navy/60 text-brand-navy dark:text-zinc-300 hover:border-brand-cyan hover:text-brand-cyan hover:scale-105'">
                    C
                </button>
                <!-- E - Excelencia -->
                <button @mouseenter="activeValue = 5" @click="activeValue = 5" type="button"
                        id="val-btn-5"
                        class="h-16 w-16 lg:h-20 lg:w-20 rounded-full border-2 text-2xl lg:text-3xl font-black transition-all duration-300 flex items-center justify-center cursor-pointer shadow-md focus:outline-none focus:ring-2 focus:ring-brand-cyan"
                        :class="activeValue === 5 ? 'bg-brand-cyan border-brand-cyan text-brand-navy scale-110 shadow-cyan-400/20' : 'bg-transparent border-zinc-200 dark:border-brand-navy/60 text-brand-navy dark:text-zinc-300 hover:border-brand-cyan hover:text-brand-cyan hover:scale-105'">
                    E
                </button>
            </div>

            <!-- Center side: HSEQ Inspector Animation -->
            <div class="lg:col-span-4 flex justify-center items-center relative">
                <!-- Spotlight effect for dark mode to preserve colors -->
                <div class="absolute inset-0 z-0 hidden dark:flex justify-center items-center pointer-events-none">
                    <div class="w-[280px] h-[280px] sm:w-[380px] sm:h-[380px] lg:w-[480px] lg:h-[480px] bg-[radial-gradient(circle,rgba(255,255,255,1)_15%,rgba(255,255,255,0.6)_40%,rgba(255,255,255,0)_70%)] rounded-full"></div>
                </div>

                <video autoplay loop muted playsinline 
                       class="relative z-10 h-[350px] sm:h-[420px] lg:h-[520px] xl:h-[580px] w-auto object-contain transform scale-125 lg:scale-150 hover:scale-[1.35] lg:hover:scale-[1.6] transition-transform duration-500 mix-blend-multiply">
                    <source src="{{ asset('img/pdf_extracted/animacion_1.mp4') }}" type="video/mp4">
                    Tu navegador no soporta la reproducción de video.
                </video>
            </div>

            <!-- Right side: Dynamic Content Card -->
            <div class="lg:col-span-6 h-[280px] sm:h-[220px] flex items-center">
                <div class="w-full relative rounded-3xl border border-zinc-200/40 bg-slate-50/50 p-8 md:p-10 dark:border-brand-navy/40 dark:bg-brand-navy/40 shadow-inner overflow-hidden min-h-[220px] flex flex-col justify-center">
                    <!-- Subtle background logo shadow -->
                    <div class="absolute -right-10 -bottom-10 opacity-5 dark:opacity-5 text-brand-cyan font-black text-9xl pointer-events-none select-none">
                        CRECE
                    </div>

                    <!-- 1. CALIDAD -->
                    <div x-show="activeValue === 1" 
                         x-transition:enter="transition ease-out duration-300"
                         x-transition:enter-start="opacity-0 translate-x-12"
                         x-transition:enter-end="opacity-100 translate-x-0"
                         class="space-y-4">
                        <div class="flex items-center gap-3 text-brand-cyan">
                            <span class="text-xs font-bold uppercase tracking-widest bg-brand-cyan/15 px-3 py-1 rounded-md">Valor: C</span>
                            <span class="h-1 w-8 bg-brand-cyan rounded"></span>
                            <span class="text-sm font-bold uppercase tracking-wider text-brand-navy dark:text-white">Calidad</span>
                        </div>
                        <h3 class="text-2xl font-bold text-brand-navy dark:text-white">Perseguimos la excelencia de manera constante</h3>
                        <p class="text-sm text-brand-slate dark:text-zinc-300 leading-relaxed font-light">
                            Estamos enfocados en ofrecer el más alto nivel técnico y profesional en cada una de nuestras consultorías e instrumentaciones, garantizando la satisfacción total.
                        </p>
                    </div>

                    <!-- 2. RESPONSABILIDAD -->
                    <div x-show="activeValue === 2" 
                         x-transition:enter="transition ease-out duration-300"
                         x-transition:enter-start="opacity-0 translate-x-12"
                         x-transition:enter-end="opacity-100 translate-x-0"
                         class="space-y-4"
                         style="display: none;">
                        <div class="flex items-center gap-3 text-brand-cyan">
                            <span class="text-xs font-bold uppercase tracking-widest bg-brand-cyan/15 px-3 py-1 rounded-md">Valor: R</span>
                            <span class="h-1 w-8 bg-brand-cyan rounded"></span>
                            <span class="text-sm font-bold uppercase tracking-wider text-brand-navy dark:text-white">Responsabilidad</span>
                        </div>
                        <h3 class="text-2xl font-bold text-brand-navy dark:text-white">Bienestar social, económico y ambiental</h3>
                        <p class="text-sm text-brand-slate dark:text-zinc-300 leading-relaxed font-light">
                            Contribuimos de forma activa en minimizar el impacto negativo en el entorno de la organización, promoviendo prácticas que apoyen la sustentabilidad y el cuidado de los recursos naturales.
                        </p>
                    </div>

                    <!-- 3. ENFOQUE AL CLIENTE -->
                    <div x-show="activeValue === 3" 
                         x-transition:enter="transition ease-out duration-300"
                         x-transition:enter-start="opacity-0 translate-x-12"
                         x-transition:enter-end="opacity-100 translate-x-0"
                         class="space-y-4"
                         style="display: none;">
                        <div class="flex items-center gap-3 text-brand-cyan">
                            <span class="text-xs font-bold uppercase tracking-widest bg-brand-cyan/15 px-3 py-1 rounded-md">Valor: E</span>
                            <span class="h-1 w-8 bg-brand-cyan rounded"></span>
                            <span class="text-sm font-bold uppercase tracking-wider text-brand-navy dark:text-white">Enfoque al Cliente</span>
                        </div>
                        <h3 class="text-2xl font-bold text-brand-navy dark:text-white">Cumplimiento de compromisos y generación de valor</h3>
                        <p class="text-sm text-brand-slate dark:text-zinc-300 leading-relaxed font-light">
                            Establecemos alianzas de largo plazo, trabajando muy de cerca con nuestros clientes para crear valor agregado en sus operaciones y fomentar una arraigada cultura de servicio posventa.
                        </p>
                    </div>

                    <!-- 4. COMPROMISO -->
                    <div x-show="activeValue === 4" 
                         x-transition:enter="transition ease-out duration-300"
                         x-transition:enter-start="opacity-0 translate-x-12"
                         x-transition:enter-end="opacity-100 translate-x-0"
                         class="space-y-4"
                         style="display: none;">
                        <div class="flex items-center gap-3 text-brand-cyan">
                            <span class="text-xs font-bold uppercase tracking-widest bg-brand-cyan/15 px-3 py-1 rounded-md">Valor: C</span>
                            <span class="h-1 w-8 bg-brand-cyan rounded"></span>
                            <span class="text-sm font-bold uppercase tracking-wider text-brand-navy dark:text-white">Compromiso</span>
                        </div>
                        <h3 class="text-2xl font-bold text-brand-navy dark:text-white">Construir un mundo laboral mejor y más seguro</h3>
                        <p class="text-sm text-brand-slate dark:text-zinc-300 leading-relaxed font-light">
                            Nos apasiona proteger la integridad física y mental de los trabajadores a través de la correcta implementación del SG-SST y el control preventivo de riesgos en sitio.
                        </p>
                    </div>

                    <!-- 5. EXCELENCIA -->
                    <div x-show="activeValue === 5" 
                         x-transition:enter="transition ease-out duration-300"
                         x-transition:enter-start="opacity-0 translate-x-12"
                         x-transition:enter-end="opacity-100 translate-x-0"
                         class="space-y-4"
                         style="display: none;">
                        <div class="flex items-center gap-3 text-brand-cyan">
                            <span class="text-xs font-bold uppercase tracking-widest bg-brand-cyan/15 px-3 py-1 rounded-md">Valor: E</span>
                            <span class="h-1 w-8 bg-brand-cyan rounded"></span>
                            <span class="text-sm font-bold uppercase tracking-wider text-brand-navy dark:text-white">Excelencia</span>
                        </div>
                        <h3 class="text-2xl font-bold text-brand-navy dark:text-white">Búsqueda activa de la mejora continua</h3>
                        <p class="text-sm text-brand-slate dark:text-zinc-300 leading-relaxed font-light">
                            Evaluamos constantemente nuestros métodos de auditoría y consultoría bajo estándares internacionales (ISO 9001, ISO 14001, ISO 45001) para superar tus expectativas.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- History / Timeline Section -->
<section class="py-16 bg-slate-50 dark:bg-brand-navy-dark/40 border-t border-zinc-200/40 dark:border-brand-navy/30 transition-colors duration-300">
    <div class="mx-auto max-w-7xl px-4 md:px-8 space-y-16">
        <div class="text-center max-w-3xl mx-auto space-y-4">
            <span class="text-xs font-bold uppercase tracking-wider text-brand-cyan bg-brand-cyan/10 px-3.5 py-1 rounded-md animate-pulse">
                Nuestra Trayectoria
            </span>
            <h2 class="text-3xl font-extrabold tracking-tight text-brand-navy dark:text-white sm:text-4xl">
                Nuestra Historia
            </h2>
            <p class="text-brand-slate dark:text-zinc-300 font-light max-w-xl mx-auto">
                El camino y la evolución institucional que nos ha consolidado como un referente de solidez y confianza técnica.
            </p>
        </div>

        <!-- Timeline Container -->
        <div class="relative w-full mt-12">
            <!-- Connecting Line (Vertical on mobile, Horizontal on desktop) -->
            <div class="absolute left-7 lg:left-[10%] top-0 bottom-0 w-1.5 rounded-full bg-gradient-to-b from-brand-cyan via-indigo-500 to-brand-cyan/20 lg:w-[80%] lg:h-1.5 lg:top-8 lg:bottom-auto lg:bg-gradient-to-r shadow-[0_0_15px_rgba(0,210,211,0.4)]"></div>

            <!-- Timeline Items -->
            <div class="grid grid-cols-1 gap-12 lg:grid-cols-3 lg:gap-8 relative z-10">
                
                <!-- Hito 1: 2017 -->
                <div class="relative pl-20 lg:pl-0 lg:pt-24 flex flex-col items-start lg:items-center group cursor-default">
                    <!-- Node Icon -->
                    <div class="absolute left-7 lg:left-1/2 top-0 lg:top-8 transform -translate-x-1/2 -translate-y-1/2 flex items-center justify-center z-20">
                        <div class="relative flex h-14 w-14 lg:h-16 lg:w-16 items-center justify-center rounded-full bg-white dark:bg-brand-navy shadow-[0_0_20px_rgba(0,210,211,0.2)] border-4 border-slate-50 dark:border-brand-navy-dark group-hover:scale-110 group-hover:shadow-[0_0_35px_rgba(0,210,211,0.6)] transition-all duration-500">
                            <div class="absolute inset-0 rounded-full bg-gradient-to-br from-brand-cyan to-indigo-500 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                            <svg class="relative z-10 h-6 w-6 lg:h-7 lg:w-7 text-brand-cyan group-hover:text-white transition-colors duration-500" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                    </div>
                    
                    <!-- Content Card -->
                    <div class="w-full relative rounded-3xl border border-zinc-200/60 bg-white p-8 dark:border-brand-navy/60 dark:bg-brand-navy/60 shadow-xl group-hover:-translate-y-3 group-hover:shadow-2xl group-hover:shadow-brand-cyan/15 transition-all duration-500 overflow-hidden">
                        <!-- Background Glow on Hover -->
                        <div class="absolute -top-24 -right-24 w-48 h-48 bg-brand-cyan/10 rounded-full blur-3xl group-hover:bg-brand-cyan/20 transition-colors duration-500"></div>
                        <!-- Top accent line -->
                        <div class="absolute top-0 left-0 right-0 h-1.5 bg-gradient-to-r from-brand-cyan to-indigo-500 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-500 origin-left"></div>
                        
                        <div class="flex flex-col gap-1 mb-4 relative z-10">
                            <span class="text-4xl font-black text-brand-navy dark:text-white group-hover:text-brand-cyan transition-colors duration-300">2017</span>
                            <span class="text-xs font-bold text-indigo-500 dark:text-indigo-400 uppercase tracking-widest">El Origen</span>
                        </div>
                        
                        <p class="text-sm text-brand-slate dark:text-zinc-350 leading-relaxed font-light relative z-10">
                            Comenzamos nuestra historia operando bajo la modalidad de persona natural. Durante cuatro años, consolidamos nuestra experiencia, valores y la confianza de clientes clave en el mercado.
                        </p>
                    </div>
                </div>

                <!-- Hito 2: 2021 -->
                <div class="relative pl-20 lg:pl-0 lg:pt-24 flex flex-col items-start lg:items-center group cursor-default">
                    <!-- Node Icon -->
                    <div class="absolute left-7 lg:left-1/2 top-0 lg:top-8 transform -translate-x-1/2 -translate-y-1/2 flex items-center justify-center z-20">
                        <div class="relative flex h-14 w-14 lg:h-16 lg:w-16 items-center justify-center rounded-full bg-white dark:bg-brand-navy shadow-[0_0_20px_rgba(0,210,211,0.2)] border-4 border-slate-50 dark:border-brand-navy-dark group-hover:scale-110 group-hover:shadow-[0_0_35px_rgba(0,210,211,0.6)] transition-all duration-500 lg:delay-100">
                            <div class="absolute inset-0 rounded-full bg-gradient-to-br from-brand-cyan to-indigo-500 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                            <svg class="relative z-10 h-6 w-6 lg:h-7 lg:w-7 text-brand-cyan group-hover:text-white transition-colors duration-500" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                    </div>
                    
                    <!-- Content Card -->
                    <div class="w-full relative rounded-3xl border border-zinc-200/60 bg-white p-8 dark:border-brand-navy/60 dark:bg-brand-navy/60 shadow-xl group-hover:-translate-y-3 group-hover:shadow-2xl group-hover:shadow-brand-cyan/15 transition-all duration-500 overflow-hidden lg:delay-100">
                        <!-- Background Glow on Hover -->
                        <div class="absolute -top-24 -right-24 w-48 h-48 bg-brand-cyan/10 rounded-full blur-3xl group-hover:bg-brand-cyan/20 transition-colors duration-500"></div>
                        <!-- Top accent line -->
                        <div class="absolute top-0 left-0 right-0 h-1.5 bg-gradient-to-r from-brand-cyan to-indigo-500 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-500 origin-left"></div>
                        
                        <div class="flex flex-col gap-1 mb-4 relative z-10">
                            <span class="text-4xl font-black text-brand-navy dark:text-white group-hover:text-brand-cyan transition-colors duration-300">2021</span>
                            <span class="text-xs font-bold text-indigo-500 dark:text-indigo-400 uppercase tracking-widest">Evolución</span>
                        </div>
                        
                        <p class="text-sm text-brand-slate dark:text-zinc-350 leading-relaxed font-light relative z-10">
                            Con el objetivo de fortalecer nuestra estructura, evolucionamos oficialmente a persona jurídica bajo la identidad de <strong class="text-brand-navy dark:text-brand-cyan font-bold">IMGEESSA</strong>, manteniendo intacto nuestro compromiso y calidad.
                        </p>
                    </div>
                </div>

                <!-- Hito 3: 2026 -->
                <div class="relative pl-20 lg:pl-0 lg:pt-24 flex flex-col items-start lg:items-center group cursor-default">
                    <!-- Node Icon -->
                    <div class="absolute left-7 lg:left-1/2 top-0 lg:top-8 transform -translate-x-1/2 -translate-y-1/2 flex items-center justify-center z-20">
                        <div class="relative flex h-14 w-14 lg:h-16 lg:w-16 items-center justify-center rounded-full bg-white dark:bg-brand-navy shadow-[0_0_20px_rgba(0,210,211,0.2)] border-4 border-slate-50 dark:border-brand-navy-dark group-hover:scale-110 group-hover:shadow-[0_0_35px_rgba(0,210,211,0.6)] transition-all duration-500 lg:delay-200">
                            <div class="absolute inset-0 rounded-full bg-gradient-to-br from-brand-cyan to-indigo-500 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                            <svg class="relative z-10 h-6 w-6 lg:h-7 lg:w-7 text-brand-cyan group-hover:text-white transition-colors duration-500" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                            </svg>
                        </div>
                    </div>
                    
                    <!-- Content Card -->
                    <div class="w-full relative rounded-3xl border border-zinc-200/60 bg-white p-8 dark:border-brand-navy/60 dark:bg-brand-navy/60 shadow-xl group-hover:-translate-y-3 group-hover:shadow-2xl group-hover:shadow-brand-cyan/15 transition-all duration-500 overflow-hidden lg:delay-200">
                        <!-- Background Glow on Hover -->
                        <div class="absolute -top-24 -right-24 w-48 h-48 bg-brand-cyan/10 rounded-full blur-3xl group-hover:bg-brand-cyan/20 transition-colors duration-500"></div>
                        <!-- Top accent line -->
                        <div class="absolute top-0 left-0 right-0 h-1.5 bg-gradient-to-r from-brand-cyan to-indigo-500 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-500 origin-left"></div>
                        
                        <div class="flex flex-col gap-1 mb-4 relative z-10">
                            <span class="text-4xl font-black text-brand-navy dark:text-white group-hover:text-brand-cyan transition-colors duration-300">2026</span>
                            <span class="text-xs font-bold text-indigo-500 dark:text-indigo-400 uppercase tracking-widest">Proyección</span>
                        </div>
                        
                        <p class="text-sm text-brand-slate dark:text-zinc-350 leading-relaxed font-light relative z-10">
                            Renovamos nuestra licencia por 10 años más, un hito que refleja nuestra solidez e idoneidad. Esto respalda técnicamente nuestros servicios especializados, proyectando un crecimiento con excelencia.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
