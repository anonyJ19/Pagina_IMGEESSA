@extends('layouts.app')

@section('title', 'Catálogo de Equipos e Instrumentos | IMGEESSA')

@section('content')
<!-- Header Page Title -->
<section class="relative overflow-hidden py-16 bg-slate-100/60 dark:bg-brand-navy border-b border-zinc-200/40 dark:border-brand-navy/30 transition-colors duration-300">
    <div class="absolute inset-0 -z-10 bg-[radial-gradient(50rem_25rem_at_center,rgba(0,210,211,0.08),transparent)]"></div>
    <div class="mx-auto max-w-7xl px-4 md:px-8 text-center space-y-4">
        <h1 class="text-4xl font-extrabold tracking-tight text-brand-navy dark:text-white sm:text-5xl">
            Catálogo de Soluciones
        </h1>
        <p class="mx-auto max-w-2xl text-base text-brand-slate dark:text-zinc-300">
            Explora nuestra gama de productos de alta precisión para automatización, instrumentación de flujo, control eléctrico y seguridad industrial.
        </p>
    </div>
</section>


<!-- Main Catalog Container -->
<section class="py-12 bg-white dark:bg-brand-navy-dark transition-colors duration-300"
         x-data="{
             search: '',
             selectedCategory: '',
             activeProduct: null,
             productos: {{ json_encode($productos) }},
             init() {
                 const urlParams = new URLSearchParams(window.location.search);
                 const productId = parseInt(urlParams.get('id'));
                 if (productId) {
                     const found = this.productos.find(p => p.id === productId);
                     if (found) {
                         this.activeProduct = found;
                     }
                 }
             },
             get filteredProductos() {
                 if (!this.selectedCategory) return [];
                 return this.productos.filter(p => {
                     const matchesSearch = p.nombre.toLowerCase().includes(this.search.toLowerCase()) || 
                                           p.descripcion.toLowerCase().includes(this.search.toLowerCase());
                     const matchesCategory = p.categoria === this.selectedCategory;
                     return matchesSearch && matchesCategory;
                 });
             }
         }">
    
    <div class="mx-auto max-w-7xl px-4 md:px-8">
        <div class="flex flex-col lg:flex-row gap-8">
            
            <!-- Left Sidebar (Categories) -->
            <aside class="lg:w-1/4 w-full shrink-0">
                <div class="bg-white dark:bg-brand-navy/40 rounded-2xl border border-zinc-200/60 dark:border-brand-navy/50 p-6 shadow-sm">
                    <h3 class="text-lg font-extrabold text-brand-navy dark:text-white mb-4 flex items-center gap-2">
                        <svg class="h-5 w-5 text-brand-cyan" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h7"></path></svg>
                        Categorías
                    </h3>
                    <div class="flex flex-col gap-2">
                        @foreach($categorias as $cat)
                            <button @click="selectedCategory = '{{ $cat }}'" 
                                    id="filter-category-{{ Str::slug($cat) }}"
                                    class="text-left w-full rounded-xl px-4 py-3 text-sm font-bold tracking-wide transition-all duration-200"
                                    :class="selectedCategory === '{{ $cat }}' ? 'bg-brand-cyan text-brand-navy shadow-md' : 'bg-slate-50 text-brand-slate hover:bg-zinc-100 dark:bg-brand-navy-dark dark:text-zinc-300 dark:hover:bg-brand-navy'">
                                {{ $cat }}
                            </button>
                        @endforeach
                    </div>
                </div>
            </aside>

            <!-- Right Content (Search & Grid) -->
            <main class="lg:w-3/4 w-full space-y-6">
                
                <!-- Search and Filters (Top of main area) -->
                <div class="flex flex-col md:flex-row md:items-center md:justify-between border-b border-zinc-100 dark:border-brand-navy/35 pb-6 gap-4" x-show="selectedCategory" style="display: none;">
                    <h2 class="text-2xl font-bold text-brand-navy dark:text-white hidden md:block" x-text="selectedCategory === 'Todos' ? 'Todos los Productos' : selectedCategory"></h2>
                    
                    <!-- Search input -->
                    <div class="relative w-full md:max-w-md">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-brand-slate dark:text-zinc-500">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </span>
                        <input x-model="search" 
                               type="text" 
                               id="catalog-search"
                               placeholder="Buscar por nombre, descripción..." 
                               class="w-full rounded-xl border border-zinc-300 bg-slate-50 py-3 pl-12 pr-4 text-sm text-brand-navy placeholder-zinc-400 focus:border-brand-cyan focus:bg-white focus:ring-1 focus:ring-brand-cyan dark:border-brand-navy dark:bg-brand-navy/60 dark:text-white dark:placeholder-zinc-500 dark:focus:border-brand-cyan">
                    </div>
                </div>

                <!-- Catalog Product Grid -->
                <div>
                    <!-- Video Promocional -->
                    <div x-show="!selectedCategory" class="w-full aspect-video rounded-3xl overflow-hidden bg-zinc-900 shadow-xl transition-all duration-300 relative group">
                        <video 
                            x-ref="promoVideo"
                            x-effect="if (selectedCategory) { $el.pause(); } else { $el.play().catch(e => {}); }"
                            src="{{ asset('img/catalogo/video_catalogo.mp4') }}" 
                            autoplay 
                            loop 
                            playsinline
                            class="w-full h-full object-cover pointer-events-none">
                            Tu navegador no soporta el elemento de video.
                        </video>
                    </div>

                    <!-- Grid content -->
                    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3" x-show="selectedCategory && filteredProductos.length > 0" style="display: none;">
                        <template x-for="p in filteredProductos" :key="p.id">
                            <div class="flex flex-col overflow-hidden rounded-2xl border border-zinc-200/40 bg-white dark:border-brand-navy/40 dark:bg-brand-navy/40 group shadow-sm hover:shadow-lg transition-all duration-300">
                                <!-- Image -->
                                <div class="relative aspect-square w-full overflow-hidden bg-white p-4">
                                    <img :src="p.imagen" 
                                         :alt="p.nombre" 
                                         class="h-full w-full object-contain mix-blend-multiply group-hover:scale-105 transition-transform duration-500">
                                </div>
                                <!-- Info -->
                                <div class="flex flex-1 flex-col p-6 space-y-4">
                                    <div class="space-y-2 flex-grow">
                                        <h3 class="text-lg font-bold text-brand-navy dark:text-white line-clamp-1" x-text="p.nombre"></h3>
                                        <p class="text-sm text-brand-slate dark:text-zinc-300 line-clamp-2" x-text="p.descripcion"></p>
                                    </div>
                                    <div class="flex items-center justify-end border-t border-zinc-100 dark:border-brand-navy/40 pt-4">
                                        <button @click="activeProduct = p" 
                                                type="button"
                                                id="product-details-btn"
                                                class="inline-flex items-center justify-center rounded-lg bg-zinc-900 hover:bg-zinc-800 text-white px-3 py-2 text-xs font-bold dark:bg-brand-navy-dark dark:text-white dark:hover:bg-brand-navy transition-colors duration-150">
                                            Detalles
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </template>
                    </div>

                    <!-- Empty State -->
                    <div class="py-20 text-center space-y-4" x-show="selectedCategory && filteredProductos.length === 0" style="display: none;">
                        <div class="inline-flex h-12 w-12 items-center justify-center rounded-full bg-slate-100 text-brand-slate dark:bg-brand-navy dark:text-zinc-500">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-brand-navy dark:text-white">No encontramos resultados</h3>
                        <p class="text-sm text-brand-slate dark:text-zinc-400 max-w-sm mx-auto">Prueba ajustando los términos de búsqueda o seleccionando otra categoría.</p>
                    </div>
                </div>

            </main>
        </div>
    </div>

    <!-- Product Detail Modal (Glassmorphism Overlay) -->
    <div x-show="activeProduct" 
         class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-zinc-950/60 backdrop-blur-sm transition-opacity duration-300"
         x-transition:enter="ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         @keydown.escape.window="activeProduct = null"
         style="display: none;">
        
        <!-- Modal Content Container -->
        <div class="relative w-full max-w-3xl rounded-3xl bg-white dark:bg-brand-navy shadow-2xl border border-zinc-200/40 dark:border-brand-navy/60 overflow-hidden flex flex-col md:flex-row max-h-[90vh]"
             @click.away="activeProduct = null"
             x-show="activeProduct"
             x-transition:enter="ease-out duration-300"
             x-transition:enter-start="opacity-0 scale-95"
             x-transition:enter-end="opacity-100 scale-100"
             x-transition:leave="ease-in duration-200"
             x-transition:leave-start="opacity-100 scale-100"
             x-transition:leave-end="opacity-0 scale-95">
            
            <!-- Close Button -->
            <button @click="activeProduct = null" 
                    id="modal-close-btn"
                    class="absolute top-4 right-4 z-10 rounded-full p-2 bg-zinc-100/80 dark:bg-brand-navy-dark/80 text-zinc-500 hover:text-brand-cyan dark:text-zinc-400 dark:hover:text-brand-cyan transition-colors">
                <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>

            <!-- Left column: Image -->
            <div class="md:w-1/2 bg-white relative p-6 aspect-square md:aspect-auto flex items-center justify-center">
                <img :src="activeProduct ? activeProduct.imagen : ''" 
                     :alt="activeProduct ? activeProduct.nombre : ''" 
                     class="max-h-full max-w-full object-contain drop-shadow-sm">
            </div>

            <!-- Right column: Details -->
            <div class="md:w-1/2 p-8 flex flex-col justify-between overflow-y-auto">
                <div class="space-y-6">
                    <div class="space-y-2">
                        <span class="rounded-full bg-brand-cyan/20 px-3 py-1 text-xs font-bold text-brand-navy dark:text-brand-cyan" x-text="activeProduct ? activeProduct.categoria : ''"></span>
                        <h2 class="text-2xl font-bold text-brand-navy dark:text-white mt-2 leading-tight" x-text="activeProduct ? activeProduct.nombre : ''"></h2>
                    </div>

                    <div class="space-y-2">
                        <h4 class="text-xs font-bold uppercase tracking-wider text-brand-slate dark:text-zinc-400">Descripción</h4>
                        <p class="text-sm text-brand-slate dark:text-zinc-300 leading-relaxed" x-text="activeProduct ? activeProduct.descripcion : ''"></p>
                    </div>

                    <div class="space-y-2" x-show="activeProduct && activeProduct.especificaciones && activeProduct.especificaciones.length > 0">
                        <h4 class="text-xs font-bold uppercase tracking-wider text-brand-slate dark:text-zinc-400">Especificaciones Técnicas</h4>
                        <ul class="text-xs space-y-1.5 list-disc pl-4 text-brand-slate dark:text-zinc-300">
                            <template x-for="(spec, index) in (activeProduct ? activeProduct.especificaciones : [])" :key="index">
                                <li x-text="spec"></li>
                            </template>
                        </ul>
                    </div>
                </div>

                <div class="pt-6 mt-6 border-t border-zinc-100 dark:border-brand-navy-dark">
                    <a :href="'{{ route('contacto') }}?equipo=' + encodeURIComponent(activeProduct ? activeProduct.nombre : '')" 
                       id="modal-quote-btn"
                       class="w-full inline-flex items-center justify-center rounded-xl bg-gradient-to-r from-brand-cyan to-indigo-600 px-5 py-3 text-sm font-bold text-brand-navy shadow-md hover:shadow-lg transition-colors">
                        Cotizar este Equipo
                    </a>
                </div>
            </div>

        </div>
    </div>
    
<!-- Empresas Distribuidoras Autorizadas Section (Auto-sliding Marquee) -->
@php
    $distribuidorasImages = [
        '3025.png', '3M.png', 'ALLWED.jpg', 'ARSEG.png', 'Ansell.png', 
        'Armadura.jpg', 'DUPONT.png', 'EPI.png', 'Honeywell.png', 'INSAFE.png',
        'Kimberly-Clark Professional.png', 'MCR-Safety-logo.png', 'MSA.png', 
        'PETZL.png', 'SWEEISS.png', 'allman.jpg', 'dbi-sala.png', 'jackson.png', 
        'steelpro.png', 'uvex-vector.png', 'zubiola_s_coop_.jpg'
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
<section class="py-10 bg-slate-50 dark:bg-brand-navy-dark transition-colors duration-300 overflow-hidden border-b border-zinc-200/40 dark:border-brand-navy/30">
    <div class="mx-auto max-w-7xl px-4 md:px-8 space-y-12">
        <div class="text-center max-w-3xl mx-auto space-y-4">
            <h2 class="text-3xl font-bold tracking-tight text-brand-navy dark:text-white sm:text-4xl">
                Empresas Distribuidoras Autorizadas
            </h2>
            <p class="text-brand-slate dark:text-zinc-400">
                Trabajamos con las mejores marcas y fabricantes del mercado para ofrecerte productos de la más alta calidad y confiabilidad.
            </p>
        </div>

        <!-- Marquee Container -->
        <div class="relative flex overflow-hidden pause-animation group">
            <!-- Fade overlays for smooth entry/exit -->
            <div class="pointer-events-none absolute inset-y-0 left-0 z-10 w-24 bg-gradient-to-r from-slate-50 dark:from-brand-navy-dark to-transparent"></div>
            <div class="pointer-events-none absolute inset-y-0 right-0 z-10 w-24 bg-gradient-to-l from-slate-50 dark:from-brand-navy-dark to-transparent"></div>

            <!-- First Marquee Track -->
            <div class="flex animate-slide-left whitespace-nowrap items-center shrink-0 space-x-6 px-3">
                @foreach($distribuidorasImages as $img)
                <div class="flex h-32 w-48 md:h-40 md:w-64 shrink-0 items-center justify-center rounded-2xl border border-zinc-200/60 bg-white p-4 md:p-6 dark:border-brand-navy/50 dark:bg-white grayscale-0 md:grayscale group-hover:grayscale-0 transition-all duration-500 shadow-sm">
                    <img src="{{ asset('img/catalogo/logos/' . $img) }}" alt="Distribuidor Autorizado" class="max-h-full max-w-full object-contain">
                </div>
                @endforeach
            </div>

            <!-- Second Marquee Track (Duplicate for infinite loop) -->
            <div class="flex animate-slide-left whitespace-nowrap items-center shrink-0 space-x-6 px-3">
                @foreach($distribuidorasImages as $img)
                <div class="flex h-32 w-48 md:h-40 md:w-64 shrink-0 items-center justify-center rounded-2xl border border-zinc-200/60 bg-white p-4 md:p-6 dark:border-brand-navy/50 dark:bg-white grayscale-0 md:grayscale group-hover:grayscale-0 transition-all duration-500 shadow-sm">
                    <img src="{{ asset('img/catalogo/logos/' . $img) }}" alt="Distribuidor Autorizado" class="max-h-full max-w-full object-contain">
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
</section>
@endsection
