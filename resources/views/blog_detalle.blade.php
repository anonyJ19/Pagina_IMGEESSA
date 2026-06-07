@extends('layouts.app')

@section('title', 'IMGEESSA')
@section('meta_description', $articulo['resumen'])

@section('content')
<!-- Blog Detail Container -->
<section class="py-16 bg-white dark:bg-brand-navy-dark transition-colors duration-300">
    <div class="mx-auto max-w-7xl px-4 md:px-8">
        
        <!-- Back Button & Category -->
        <div class="mb-8 flex items-center justify-between">
            <a href="{{ route('blog') }}" class="inline-flex items-center gap-1.5 text-sm font-semibold text-brand-slate hover:text-brand-cyan dark:text-zinc-400 dark:hover:text-brand-cyan transition-colors">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"></path>
                </svg>
                Volver al Blog
            </a>
            <span class="rounded-full bg-brand-cyan/20 px-3 py-1 text-xs font-bold text-brand-navy dark:text-brand-cyan">
                {{ $articulo['categoria'] }}
            </span>
        </div>

        <div class="grid grid-cols-1 gap-12 lg:grid-cols-12">
            <!-- Left Side: Main Post Body (8 Cols) -->
            <article class="lg:col-span-8 space-y-8">
                <!-- Post title and meta -->
                <div class="space-y-4">
                    <h1 class="text-3xl font-extrabold tracking-tight text-brand-navy dark:text-white sm:text-4xl md:text-5xl leading-tight">
                        {{ $articulo['titulo'] }}
                    </h1>
                    <div class="flex flex-wrap items-center gap-4 text-xs font-semibold text-brand-slate dark:text-zinc-400">
                        <span class="flex items-center gap-1">
                            <svg class="h-4 w-4 text-brand-cyan" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            {{ $articulo['autor'] }}
                        </span>
                        <span>&bull;</span>
                        <span class="flex items-center gap-1">
                            <svg class="h-4 w-4 text-brand-cyan" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                            {{ $articulo['fecha'] }}
                        </span>
                    </div>
                </div>

                @if(isset($articulo['component']))
                    <!-- Infographic Component -->
                    <div class="w-full">
                        @include('components.' . $articulo['component'])
                    </div>
                @else
                    <!-- Big Featured Image -->
                    <div class="aspect-video w-full rounded-3xl overflow-hidden bg-zinc-100 dark:bg-brand-navy shadow-md">
                        <img src="{{ $articulo['imagen'] }}" 
                             alt="{{ $articulo['titulo'] }}" 
                             class="h-full w-full object-cover">
                    </div>

                    <!-- Reading body -->
                    <div class="prose prose-zinc dark:prose-invert max-w-none text-base md:text-lg text-brand-slate dark:text-zinc-300 leading-relaxed space-y-6 whitespace-pre-line">
                        {{ $articulo['contenido'] }}
                    </div>
                @endif

                <!-- Author Bio Card -->
                <div class="mt-12 rounded-2xl border border-zinc-200/40 bg-slate-50 p-6 dark:border-brand-navy/40 dark:bg-brand-navy/40 flex flex-col sm:flex-row gap-6 items-center">
                    <div class="h-16 w-auto shrink-0 flex items-center justify-center">
                        <img src="{{ asset('img/logo-l.png') }}" alt="IMGEESSA Logo" class="h-full object-contain dark:hidden">
                        <img src="{{ asset('img/logo-d.png') }}" alt="IMGEESSA Logo" class="h-full object-contain hidden dark:block">
                    </div>
                    <div class="space-y-1 text-center sm:text-left">
                        <h4 class="text-sm font-bold text-brand-navy dark:text-white">Escrito por {{ $articulo['autor'] }}</h4>
                        <p class="text-xs font-semibold text-brand-slate dark:text-zinc-400">IMGEESSA Soluciones Integrales HSEQ SAS.</p>
                        <p class="text-xs text-brand-slate dark:text-zinc-400 leading-relaxed pt-1.5">
                            Expertos en consultoría, asesoría y mediciones de higiene industrial para garantizar entornos laborales seguros, promoviendo el bienestar integral y el cumplimiento de la normatividad legal vigente en Seguridad y Salud en el Trabajo.
                        </p>
                    </div>
                </div>
            </article>

            <!-- Right Side: Sidebar (4 Cols) - Related Posts -->
            <aside class="lg:col-span-4 space-y-8">
                <div class="sticky top-28 rounded-2xl border border-zinc-200/40 p-6 dark:border-brand-navy/40 dark:bg-brand-navy/30 space-y-6">
                    <h3 class="text-lg font-bold text-brand-navy dark:text-white border-b border-zinc-100 dark:border-brand-navy-dark pb-3">
                        Artículos Relacionados
                    </h3>
                    <div class="space-y-6">
                        @foreach($relacionados as $rel)
                            <div class="space-y-2 group">
                                <span class="text-[10px] font-bold text-brand-cyan uppercase tracking-wider">{{ $rel['categoria'] }}</span>
                                <h4 class="text-sm font-bold text-brand-navy dark:text-white leading-snug group-hover:text-brand-cyan transition-colors">
                                    <a href="{{ route('blog.detalle', $rel['slug']) }}">{{ $rel['titulo'] }}</a>
                                </h4>
                                <p class="text-xs text-brand-slate dark:text-zinc-400 line-clamp-2">{{ $rel['resumen'] }}</p>
                                <a href="{{ route('blog.detalle', $rel['slug']) }}" class="inline-flex items-center gap-1 text-[11px] font-semibold text-brand-slate hover:text-brand-cyan dark:text-zinc-400 dark:hover:text-brand-cyan transition-colors mt-1">
                                    Leer artículo
                                    <svg class="h-3 w-3" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </aside>
        </div>

    </div>
</section>
@endsection
