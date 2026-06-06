@extends('layouts.app')

@section('title', 'Quiénes Somos | IMGEESSA')

@section('content')
<!-- Header Page Title -->
<section class="relative overflow-hidden py-16 bg-slate-100/60 dark:bg-brand-navy border-b border-zinc-200/40 dark:border-brand-navy/30 transition-colors duration-300">
    <div class="absolute inset-0 -z-10 bg-[radial-gradient(50rem_25rem_at_center,rgba(0,210,211,0.08),transparent)]"></div>
    <div class="mx-auto max-w-7xl px-4 md:px-8 text-center space-y-4">
        <h1 class="text-4xl font-extrabold tracking-tight text-brand-navy dark:text-white sm:text-5xl">
            Quiénes Somos
        </h1>
        <p class="mx-auto max-w-2xl text-base text-brand-slate dark:text-zinc-300">
            Conoce nuestra historia, nuestra filosofía de trabajo y el equipo de ingenieros dedicados a potenciar la infraestructura industrial.
        </p>
    </div>
</section>

<!-- Company History & Story -->
<section class="py-20 bg-white dark:bg-brand-navy-dark transition-colors duration-300">
    <div class="mx-auto max-w-7xl px-4 md:px-8">
        <div class="grid grid-cols-1 gap-12 lg:grid-cols-12 lg:items-center">
            <!-- Left Text Content -->
            <div class="lg:col-span-6 space-y-6">
                <div class="inline-flex items-center gap-1 bg-brand-cyan/20 text-brand-navy dark:text-brand-cyan px-3 py-1 rounded-full text-xs font-semibold">
                    Nuestra Trayectoria
                </div>
                <h2 class="text-3xl font-bold tracking-tight text-brand-navy dark:text-white sm:text-4xl">
                    Impulsando el desarrollo tecnológico de la región desde 2014
                </h2>
                <p class="text-sm md:text-base text-brand-slate dark:text-zinc-355 leading-relaxed">
                    IMGEESSA nació como un taller de ingeniería y consultoría técnica especializada en San José, Costa Rica, con la visión de cerrar la brecha de automatización y optimización de motores industriales en el mercado centroamericano.
                </p>
                <p class="text-sm md:text-base text-brand-slate dark:text-zinc-355 leading-relaxed">
                    A lo largo de los años, nos hemos consolidado como socios estratégicos de las plantas de producción más importantes, suministrando no solo productos de alta precisión y calidad de marcas internacionales reconocidas, sino brindando un soporte posventa y diseño de soluciones de ingeniería a la medida sin precedentes en el mercado.
                </p>
            </div>

            <!-- Right Image Block -->
            <div class="lg:col-span-6 relative">
                <div class="aspect-video w-full rounded-2xl overflow-hidden shadow-xl border border-zinc-200/40 dark:border-brand-navy/30">
                    <img src="https://images.unsplash.com/photo-1504307651254-35680f356dfd?auto=format&fit=crop&q=80&w=800" 
                         alt="Planta Industrial de Automatización" 
                         class="h-full w-full object-cover">
                </div>
                <!-- Mini overlay badge -->
                <div class="absolute -bottom-6 -left-6 hidden sm:block backdrop-blur-md bg-white/90 dark:bg-brand-navy/90 p-6 rounded-2xl border border-zinc-200/40 dark:border-brand-navy/30 shadow-lg max-w-xs">
                    <p class="text-2xl font-extrabold text-brand-cyan">100%</p>
                    <p class="text-xs font-semibold uppercase tracking-wider text-brand-slate dark:text-zinc-400 mt-1">Soporte Técnico Certificado por Fabricante</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Mission, Vision & Core Values -->
<section class="py-20 bg-slate-50 dark:bg-brand-navy-dark/40 border-t border-zinc-200/40 dark:border-brand-navy/30 transition-colors duration-300">
    <div class="mx-auto max-w-7xl px-4 md:px-8">
        <div class="grid grid-cols-1 gap-8 md:grid-cols-3">
            <!-- Mision -->
            <div class="rounded-2xl border border-zinc-200/40 bg-white p-8 dark:border-brand-navy/40 dark:bg-brand-navy/40 shadow-sm space-y-4">
                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-brand-cyan/10 text-brand-cyan">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-brand-navy dark:text-white">Nuestra Misión</h3>
                <p class="text-sm text-brand-slate dark:text-zinc-350 leading-relaxed">
                    Suministrar soluciones integrales de instrumentación, automatización y control industrial de la más alta calidad, impulsando la productividad, eficiencia energética y seguridad de nuestros clientes mediante una consultoría técnica excepcional.
                </p>
            </div>

            <!-- Vision -->
            <div class="rounded-2xl border border-zinc-200/40 bg-white p-8 dark:border-brand-navy/40 dark:bg-brand-navy/40 shadow-sm space-y-4">
                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-brand-cyan/10 text-brand-cyan">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-brand-navy dark:text-white">Nuestra Visión</h3>
                <p class="text-sm text-brand-slate dark:text-zinc-350 leading-relaxed">
                    Ser la empresa líder y referente en automatización industrial e ingeniería de flujo en América Central, reconocida por nuestra innovación tecnológica constante, altos estándares éticos y el compromiso permanente con la sustentabilidad y el cuidado ambiental.
                </p>
            </div>

            <!-- Valores -->
            <div class="rounded-2xl border border-zinc-200/40 bg-white p-8 dark:border-brand-navy/40 dark:bg-brand-navy/40 shadow-sm space-y-4">
                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-brand-cyan/10 text-brand-cyan">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-brand-navy dark:text-white">Nuestros Valores</h3>
                <p class="text-sm text-brand-slate dark:text-zinc-350 leading-relaxed">
                    Guiamos cada proyecto bajo los pilares de: **Integridad absoluta** en las relaciones comerciales, **Excelencia técnica** permanente, **Compromiso e Innovación** con la seguridad ambiental y el éxito de nuestros clientes.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Our Team Section (Dynamic from $equipo) -->
<section class="py-20 bg-white dark:bg-brand-navy-dark transition-colors duration-300">
    <div class="mx-auto max-w-7xl px-4 md:px-8 space-y-12">
        <div class="text-center max-w-3xl mx-auto space-y-4">
            <h2 class="text-3xl font-bold tracking-tight text-brand-navy dark:text-white sm:text-4xl">
                Nuestro Equipo de Liderazgo
            </h2>
            <p class="text-brand-slate dark:text-zinc-300">
                Contamos con profesionales altamente calificados y certificados listos para guiar tu proyecto de ingeniería.
            </p>
        </div>

        <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3">
            @foreach($equipo as $miembro)
                <div class="flex flex-col rounded-2xl border border-zinc-200/40 bg-white dark:border-brand-navy/40 dark:bg-brand-navy/40 shadow-sm overflow-hidden group hover:shadow-lg transition-all duration-300">
                    <div class="relative aspect-[4/5] w-full overflow-hidden bg-zinc-100 dark:bg-brand-navy-dark">
                        <img src="{{ $miembro['imagen'] }}" 
                             alt="{{ $miembro['nombre'] }}" 
                             class="h-full w-full object-cover group-hover:scale-105 transition-transform duration-500">
                    </div>
                    <div class="p-6 space-y-2 flex-grow">
                        <h3 class="text-lg font-bold text-brand-navy dark:text-white">{{ $miembro['nombre'] }}</h3>
                        <p class="text-xs font-bold text-brand-cyan uppercase tracking-wider">{{ $miembro['cargo'] }}</p>
                        <p class="text-sm text-brand-slate dark:text-zinc-350 leading-relaxed pt-2">{{ $miembro['bio'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
