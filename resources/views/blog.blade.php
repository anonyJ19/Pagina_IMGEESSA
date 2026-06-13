@extends('layouts.app')

@section('title', 'Blog Técnico e Informativo | IMGEESSA')

@section('content')
<!-- Header Page Title -->
<section class="relative overflow-hidden py-12 lg:py-16 bg-gradient-to-b from-brand-navy-dark to-brand-navy text-white border-b border-brand-navy/30">
    <!-- Background glows -->
    <div class="absolute inset-0 -z-10 bg-[radial-gradient(45rem_20rem_at_center,rgba(0,210,211,0.15),transparent)]"></div>
    <div class="absolute -top-24 right-10 h-72 w-72 rounded-full bg-brand-cyan/10 blur-3xl"></div>
    
    <div class="mx-auto max-w-7xl px-4 md:px-8 text-center space-y-4">
        <h1 class="text-4xl font-extrabold tracking-tight sm:text-5xl text-white">
            Blog Técnico e <span class="text-brand-cyan">Informativo</span>
        </h1>
        <p class="mx-auto max-w-2xl text-base text-zinc-300 leading-relaxed font-light">
            Nuestros ingenieros comparten análisis de tendencias, guías de eficiencia energética y novedades de seguridad industrial.
        </p>
    </div>
</section>

<!-- Blog Posts Grid Section -->
<section class="py-16 bg-white dark:bg-brand-navy-dark transition-colors duration-300">
    <div class="mx-auto max-w-7xl px-4 md:px-8">
        
        <div class="grid grid-cols-1 gap-12 md:grid-cols-2 lg:grid-cols-3">
            @foreach($articulos as $articulo)
                <article class="flex flex-col overflow-hidden rounded-2xl border border-zinc-200/40 bg-white dark:border-brand-navy/40 dark:bg-brand-navy/40 shadow-sm hover:shadow-lg transition-all duration-300 group">
                    <!-- Article Image -->
                    <div class="relative aspect-video w-full overflow-hidden bg-zinc-100 dark:bg-brand-navy-dark">
                        <a href="{{ route('blog.detalle', $articulo['slug']) }}">
                            @if(isset($articulo['imagen_light']) && isset($articulo['imagen_dark']))
                                <img src="{{ $articulo['imagen_light'] }}" alt="{{ $articulo['titulo'] }}" class="h-full w-full object-cover group-hover:scale-105 transition-transform duration-500 dark:hidden">
                                <img src="{{ $articulo['imagen_dark'] }}" alt="{{ $articulo['titulo'] }}" class="h-full w-full object-cover group-hover:scale-105 transition-transform duration-500 hidden dark:block">
                            @else
                                <img src="{{ $articulo['imagen'] }}" alt="{{ $articulo['titulo'] }}" class="h-full w-full object-cover group-hover:scale-105 transition-transform duration-500">
                            @endif
                        </a>
                        <span class="absolute top-4 left-4 rounded-full bg-brand-cyan px-3 py-1 text-xs font-bold text-brand-navy shadow-sm dark:text-white">
                            {{ $articulo['categoria'] }}
                        </span>
                    </div>

                    <!-- Article Body -->
                    <div class="flex flex-1 flex-col p-6 space-y-4">
                        <div class="space-y-3 flex-grow">
                            <span class="text-xs font-medium text-brand-slate dark:text-zinc-400">{{ $articulo['fecha'] }}</span>
                            <h2 class="text-xl font-bold text-brand-navy dark:text-white leading-snug group-hover:text-brand-cyan transition-colors duration-150">
                                <a href="{{ route('blog.detalle', $articulo['slug']) }}" id="blog-link-{{ $articulo['id'] }}">{{ $articulo['titulo'] }}</a>
                            </h2>
                            <p class="text-sm text-brand-slate dark:text-zinc-300 leading-relaxed line-clamp-3">
                                {{ $articulo['resumen'] }}
                            </p>
                        </div>

                        <!-- Article Footer / Credits -->
                        <div class="flex items-center justify-between border-t border-zinc-100 dark:border-brand-navy/45 pt-4">
                            <div class="flex items-start gap-2 pr-2">
                                <div class="h-6 w-6 rounded-full bg-slate-100 dark:bg-brand-navy flex items-center justify-center shrink-0 mt-0.5">
                                    <img src="{{ asset('img/logo-l.png') }}" class="h-3 w-auto object-contain dark:hidden" alt="Logo">
                                    <img src="{{ asset('img/logo-d.png') }}" class="h-3 w-auto object-contain hidden dark:block" alt="Logo">
                                </div>
                                <span class="text-[10px] text-brand-slate dark:text-zinc-400 font-bold leading-tight">
                                    Por IMGEESSA SOLUCIONES INTEGRALES HSEQ S.A.S
                                </span>
                            </div>
                            <a href="{{ route('blog.detalle', $articulo['slug']) }}" class="text-xs font-bold text-brand-cyan hover:text-brand-cyan-dark hover:underline shrink-0 whitespace-nowrap">
                                Leer más
                            </a>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>

    </div>
</section>
@endsection
