@extends('layouts.app')

@section('title', 'Inicio | IMGEESSA Soluciones Industriales')

@section('content')
<!-- Hero Section -->
<section class="relative overflow-hidden py-20 lg:py-32 bg-slate-50 dark:bg-brand-navy-dark transition-colors duration-300">
    <!-- Background Grid and Gradient Blob -->
    <div class="absolute inset-0 -z-10 bg-[radial-gradient(37.5rem_37.5rem_at_top,rgba(0,210,211,0.15),transparent)] dark:bg-[radial-gradient(37.5rem_37.5rem_at_top,rgba(0,210,211,0.08),transparent)]"></div>
    <div class="absolute top-0 right-0 -z-10 h-96 w-96 rounded-full bg-brand-cyan/10 blur-3xl dark:bg-brand-cyan/5"></div>
    
    <div class="mx-auto max-w-7xl px-4 md:px-8">
        <div class="grid grid-cols-1 gap-12 lg:grid-cols-12 lg:items-center">
            <!-- Hero Left: Text & CTAs -->
            <div class="space-y-6 lg:col-span-7 text-center lg:text-left">
                <div class="inline-flex items-center gap-1.5 rounded-full bg-brand-cyan/20 px-3 py-1 text-xs font-semibold text-brand-navy dark:text-brand-cyan">
                    <span class="flex h-2.5 w-2.5 rounded-full bg-brand-cyan animate-pulse"></span>
                    Innovación Industrial 2026
                </div>
                <h1 class="text-4xl font-extrabold tracking-tight text-brand-navy dark:text-white sm:text-5xl md:text-6xl leading-tight">
                    Lideramos la <span class="bg-gradient-to-r from-brand-cyan to-indigo-500 bg-clip-text text-transparent">Ingeniería y Automatización</span> de Vanguardia
                </h1>
                <p class="mx-auto lg:mx-0 max-w-2xl text-base md:text-lg text-brand-slate dark:text-zinc-300 leading-relaxed">
                    Suministramos equipos de instrumentación de flujo, control eléctrico y automatización pesada. Diseñamos soluciones eficientes con soporte técnico de alta precisión.
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
                <div class="relative w-full max-w-md aspect-square rounded-3xl bg-gradient-to-tr from-brand-cyan to-indigo-600 p-1 shadow-2xl overflow-hidden group">
                    <div class="absolute inset-0 bg-brand-navy/10 group-hover:bg-brand-navy/0 transition-colors duration-300 z-10"></div>
                    <img src="https://images.unsplash.com/photo-1581092160607-ee22621dd758?auto=format&fit=crop&q=80&w=600" 
                         alt="Ingeniería IMGEESSA" 
                         class="h-full w-full object-cover rounded-[22px] transform scale-100 group-hover:scale-105 transition-all duration-700">
                    <!-- Glassmorphism badge overlay -->
                    <div class="absolute bottom-6 left-6 right-6 backdrop-blur-md bg-white/70 dark:bg-brand-navy-dark/90 p-4 rounded-2xl border border-white/20 dark:border-brand-navy/30 z-20 shadow-lg">
                        <p class="text-xs text-brand-cyan font-bold uppercase tracking-wider">Servicio Técnico Garantizado</p>
                        <p class="text-sm font-semibold text-brand-navy dark:text-white mt-1">Soporte postventa 24/7 y calibración especializada.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Stats Grid Section -->
<section class="py-12 border-y border-zinc-200/40 dark:border-brand-navy/30 bg-white dark:bg-brand-navy/30 transition-colors duration-300">
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
</section>

<!-- Core Services / Value Cards Section -->
<section class="py-20 bg-slate-50 dark:bg-brand-navy-dark transition-colors duration-300">
    <div class="mx-auto max-w-7xl px-4 md:px-8 space-y-12">
        <div class="text-center max-w-3xl mx-auto space-y-4">
            <h2 class="text-3xl font-bold tracking-tight text-brand-navy dark:text-white sm:text-4xl">
                ¿Por qué elegir las soluciones de IMGEESSA?
            </h2>
            <p class="text-brand-slate dark:text-zinc-400">
                Ofrecemos un catálogo curado de productos de instrumentación de marcas líderes, respaldado por un equipo de ingeniería listo para resolver cualquier reto en planta.
            </p>
        </div>

        <div class="grid grid-cols-1 gap-8 md:grid-cols-3">
            <!-- Card 1 -->
            <div class="rounded-2xl border border-zinc-200/40 bg-white p-8 dark:border-brand-navy/40 dark:bg-brand-navy/40 shadow-sm hover:shadow-md transition-all duration-300 hover:-translate-y-1 group">
                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-brand-cyan/10 text-brand-cyan group-hover:bg-brand-cyan group-hover:text-brand-navy transition-all duration-300">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                    </svg>
                </div>
                <h3 class="mt-6 text-xl font-bold text-brand-navy dark:text-white">Ingeniería Personalizada</h3>
                <p class="mt-2 text-sm text-brand-slate dark:text-zinc-400 leading-relaxed">
                    No solo vendemos equipos; diseñamos planos de integración e instrumentación que se acoplan exactamente a los flujos y tuberías de sus procesos industriales.
                </p>
            </div>

            <!-- Card 2 -->
            <div class="rounded-2xl border border-zinc-200/40 bg-white p-8 dark:border-brand-navy/40 dark:bg-brand-navy/40 shadow-sm hover:shadow-md transition-all duration-300 hover:-translate-y-1 group">
                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-brand-cyan/10 text-brand-cyan group-hover:bg-brand-cyan group-hover:text-brand-navy transition-all duration-300">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                    </svg>
                </div>
                <h3 class="mt-6 text-xl font-bold text-brand-navy dark:text-white">Certificación y Garantía</h3>
                <p class="mt-2 text-sm text-brand-slate dark:text-zinc-400 leading-relaxed">
                    Suministramos productos certificados por normas mundiales (UL, FM, CE). Garantizamos una alta durabilidad incluso en las condiciones de planta más extremas.
                </p>
            </div>

            <!-- Card 3 -->
            <div class="rounded-2xl border border-zinc-200/40 bg-white p-8 dark:border-brand-navy/40 dark:bg-brand-navy/40 shadow-sm hover:shadow-md transition-all duration-300 hover:-translate-y-1 group">
                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-brand-cyan/10 text-brand-cyan group-hover:bg-brand-cyan group-hover:text-brand-navy transition-all duration-300">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>
                </div>
                <h3 class="mt-6 text-xl font-bold text-brand-navy dark:text-white">Eficiencia Energética</h3>
                <p class="mt-2 text-sm text-brand-slate dark:text-zinc-400 leading-relaxed">
                    Integramos variadores de frecuencia y módulos inteligentes para reducir el consumo eléctrico de sus motores de bombeo y ventilación industrial hasta en un 40%.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Featured Catalog Items (Dynamic from $productos) -->
<section class="py-20 bg-white dark:bg-brand-navy-dark/40 border-t border-zinc-200/40 dark:border-brand-navy/30 transition-colors duration-300">
    <div class="mx-auto max-w-7xl px-4 md:px-8 space-y-12">
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-4">
            <div class="space-y-3 max-w-2xl">
                <h2 class="text-3xl font-bold tracking-tight text-brand-navy dark:text-white sm:text-4xl">
                    Productos Destacados
                </h2>
                <p class="text-brand-slate dark:text-zinc-400">
                    Echa un vistazo a nuestros equipos más solicitados por ingenieros de automatización y mantenimiento.
                </p>
            </div>
            <a href="{{ route('catalogo') }}" class="inline-flex items-center gap-1 text-sm font-bold text-brand-cyan hover:text-brand-cyan-dark group transition-colors duration-150">
                Ver Catálogo Completo
                <svg class="h-4 w-4 transform group-hover:translate-x-1 transition-transform text-brand-cyan" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"></path>
                </svg>
            </a>
        </div>

        <!-- Catalog Grid -->
        <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3">
            @foreach($productos as $producto)
                <div class="flex flex-col overflow-hidden rounded-2xl border border-zinc-200/40 bg-white dark:border-brand-navy/40 dark:bg-brand-navy/50 group shadow-sm hover:shadow-lg transition-all duration-300">
                    <div class="relative aspect-video w-full overflow-hidden bg-zinc-100 dark:bg-brand-navy-dark">
                        <img src="{{ $producto['imagen'] }}" 
                             alt="{{ $producto['nombre'] }}" 
                             class="h-full w-full object-cover group-hover:scale-105 transition-transform duration-500">
                        <span class="absolute top-4 left-4 rounded-full bg-brand-cyan px-3 py-1 text-xs font-bold text-brand-navy shadow-sm">
                            {{ $producto['categoria'] }}
                        </span>
                    </div>
                    <div class="flex flex-1 flex-col p-6 space-y-4">
                        <div class="space-y-2 flex-grow">
                            <h3 class="text-lg font-bold text-brand-navy dark:text-white line-clamp-1" x-text="'{{ $producto['nombre'] }}'"></h3>
                            <p class="text-sm text-brand-slate dark:text-zinc-400 line-clamp-2">{{ $producto['descripcion'] }}</p>
                        </div>
                        <div class="flex items-center justify-between border-t border-zinc-100 dark:border-brand-navy/40 pt-4">
                            <span class="text-lg font-extrabold text-brand-navy dark:text-white">{{ $producto['precio'] }}</span>
                            <a href="{{ route('catalogo') }}?id={{ $producto['id'] }}" 
                               class="inline-flex items-center justify-center rounded-lg bg-zinc-100 hover:bg-zinc-200 text-brand-navy px-3 py-1.5 text-xs font-bold dark:bg-brand-navy-dark dark:text-white dark:hover:bg-brand-navy transition-colors duration-150">
                                Ver Detalles
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Latest Blog Posts (Dynamic from $articulos) -->
<section class="py-20 bg-slate-50 dark:bg-brand-navy-dark transition-colors duration-300">
    <div class="mx-auto max-w-7xl px-4 md:px-8 space-y-12">
        <div class="text-center max-w-3xl mx-auto space-y-4">
            <h2 class="text-3xl font-bold tracking-tight text-brand-navy dark:text-white sm:text-4xl">
                Blog Técnico e Informativo
            </h2>
            <p class="text-brand-slate dark:text-zinc-400">
                Artículos escritos por expertos en ingeniería sobre innovaciones tecnológicas, regulaciones ambientales y eficiencia energética industrial.
            </p>
        </div>

        <div class="grid grid-cols-1 gap-8 md:grid-cols-3">
            @foreach($articulos as $articulo)
                <article class="flex flex-col rounded-2xl border border-zinc-200/40 bg-white p-6 dark:border-brand-navy/40 dark:bg-brand-navy/40 shadow-sm hover:shadow-md transition-all duration-300">
                    <div class="text-xs font-bold text-brand-cyan">
                        {{ $articulo['categoria'] }} &bull; {{ $articulo['fecha'] }}
                    </div>
                    <h3 class="mt-3 text-lg font-bold text-brand-navy dark:text-white leading-tight hover:text-brand-cyan transition-colors">
                        <a href="{{ route('blog.detalle', $articulo['slug']) }}">{{ $articulo['titulo'] }}</a>
                    </h3>
                    <p class="mt-3 text-sm text-brand-slate dark:text-zinc-400 flex-grow leading-relaxed line-clamp-3">
                        {{ $articulo['resumen'] }}
                    </p>
                    <div class="mt-6 border-t border-zinc-100 dark:border-brand-navy/40 pt-4 flex items-center justify-between">
                        <span class="text-xs text-brand-slate dark:text-zinc-450 font-medium">Por {{ $articulo['autor'] }}</span>
                        <a href="{{ route('blog.detalle', $articulo['slug']) }}" class="text-xs font-bold text-brand-cyan hover:text-brand-cyan-dark hover:underline">
                            Leer artículo
                        </a>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>

<!-- Call to Action Section -->
<section class="py-16 md:py-24 bg-white dark:bg-brand-navy-dark transition-colors duration-300">
    <div class="mx-auto max-w-7xl px-4 md:px-8">
        <div class="relative rounded-3xl overflow-hidden bg-gradient-to-tr from-brand-navy to-indigo-950 px-8 py-12 md:p-16 shadow-2xl text-center md:text-left">
            <div class="absolute inset-0 opacity-10 bg-[radial-gradient(ellipse_at_center,_var(--tw-gradient-stops))] from-brand-cyan to-transparent"></div>
            <div class="relative grid grid-cols-1 gap-8 md:grid-cols-12 items-center z-10">
                <div class="md:col-span-8 space-y-4">
                    <h2 class="text-3xl font-bold tracking-tight text-white sm:text-4xl">
                        ¿Listo para optimizar los procesos de su planta?
                    </h2>
                    <p class="text-zinc-300 text-sm md:text-base max-w-2xl leading-relaxed">
                        Póngase en contacto hoy mismo con nuestro departamento de ingeniería para recibir asesoría personalizada sobre selección de equipos y factibilidad de automatización.
                    </p>
                </div>
                <div class="md:col-span-4 flex justify-center md:justify-end">
                    <a href="{{ route('contacto') }}" class="inline-flex items-center justify-center rounded-xl bg-brand-cyan hover:bg-brand-cyan-dark px-6 py-3.5 text-sm font-bold text-brand-navy shadow hover:shadow-lg transition-all duration-300 hover:scale-105">
                        Agendar Consultoría Gratuita
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
