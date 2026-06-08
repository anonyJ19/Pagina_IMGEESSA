<!DOCTYPE html>
<html lang="es" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>IMGEESSA SOLUCIONES INTEGRALES HSEQ S.A.S</title>
    <link rel="icon" id="favicon" type="image/png" href="{{ asset('img/logo-l.png') }}?v=3">
    
    
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Outfit:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- CSS / JS compilation (Vite) -->
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/theme.js'])

    <!-- SweetAlert2 para notificaciones -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        h1, h2, h3, h4, h5, h6 {
            font-family: 'Outfit', sans-serif;
        }
    </style>
</head>
<body class="bg-slate-50 text-brand-navy dark:bg-brand-navy-dark dark:text-zinc-100 min-h-screen flex flex-col transition-colors duration-300 antialiased"
      x-data="{ 
          mobileMenuOpen: false, 
          darkMode: localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-theme: dark)').matches),
          toggleDarkMode() {
              this.darkMode = !this.darkMode;
              if (this.darkMode) {
                  document.documentElement.classList.add('dark');
                  localStorage.setItem('color-theme', 'dark');
              } else {
                  document.documentElement.classList.remove('dark');
                  localStorage.setItem('color-theme', 'light');
              }
          }
      }">

    <!-- Header / Navbar -->
    <header class="sticky top-0 z-50 w-full border-b border-zinc-200/40 bg-white/80 backdrop-blur-md dark:border-brand-navy/30 dark:bg-brand-navy-dark/85 transition-colors duration-300">
        <div class="mx-auto flex max-w-7xl items-center justify-between p-4 md:px-8">
            <!-- Logo toggling depending on theme -->
            <a href="{{ route('inicio') }}" class="flex items-center gap-2 group" id="nav-logo">
                <img src="{{ asset('img/logo-light.png') }}" class="h-14 w-auto dark:hidden transition-transform duration-300 group-hover:scale-102" alt="IMGEESSA Group">
                <img src="{{ asset('img/logo-dark.png') }}" class="h-14 w-auto hidden dark:block transition-transform duration-300 group-hover:scale-102" alt="IMGEESSA Group">
            </a>

            <!-- Desktop Navigation -->
            <nav class="hidden md:flex items-center gap-1">
                @php
                    $navItems = [
                        ['route' => 'inicio', 'label' => 'Inicio'],
                        ['route' => 'quienes_somos', 'label' => 'Quiénes somos'],
                        ['route' => 'catalogo', 'label' => 'Catálogo'],
                        ['route' => 'blog', 'label' => 'Blog'],
                        ['route' => 'contacto', 'label' => 'Contacto'],
                    ];
                @endphp

                @foreach($navItems as $item)
                    @php
                        $isActive = request()->routeIs($item['route']) || ($item['route'] === 'blog' && request()->routeIs('blog.detalle'));
                    @endphp
                    <a href="{{ route($item['route']) }}" 
                       id="nav-link-{{ $item['route'] }}"
                       class="relative inline-flex items-center justify-center px-4 py-2 text-sm font-semibold rounded-lg no-underline transition-all duration-200 {{ $isActive ? 'text-brand-cyan dark:text-brand-cyan bg-brand-cyan/10 dark:bg-brand-cyan/10' : 'text-brand-navy/80 dark:text-zinc-300 hover:text-brand-cyan dark:hover:text-brand-cyan hover:bg-zinc-100/60 dark:hover:bg-brand-navy/40' }}">
                        {{ $item['label'] }}
                        @if($isActive)
                            <span class="absolute bottom-1 left-4 right-4 h-0.5 rounded bg-brand-cyan"></span>
                        @endif
                    </a>
                @endforeach
            </nav>

            <!-- Right Utilities (Theme Selector + Contact CTA) -->
            <div class="flex items-center gap-3">
                <!-- Theme Switcher Button -->
                <button @click="toggleDarkMode" 
                        type="button"
                        id="theme-toggle"
                        class="rounded-lg p-2 text-zinc-500 hover:bg-zinc-100 hover:text-zinc-900 dark:text-zinc-400 dark:hover:bg-brand-navy/60 dark:hover:text-white focus:outline-none transition-colors duration-200"
                        aria-label="Toggle Dark Mode">
                    <!-- Sun Icon (shown in dark mode) -->
                    <svg x-show="darkMode" class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" style="display: none;">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364-6.364l-.707.707M6.364 17.636l-.707.707M17.636 17.636l-.707-.707M6.364 6.364l-.707-.707M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                    <!-- Moon Icon (shown in light mode) -->
                    <svg x-show="!darkMode" class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path>
                    </svg>
                </button>

                <!-- Cotizar CTA (Desktop Only) -->
                <a href="{{ route('contacto') }}" 
                   id="nav-cta"
                   class="hidden md:inline-flex items-center justify-center rounded-xl bg-brand-cyan hover:bg-brand-cyan-dark px-4 py-2 text-sm font-bold text-brand-navy shadow-md transition-all duration-300 hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-brand-cyan focus:ring-offset-2 dark:focus:ring-offset-brand-navy-dark">
                    Cotizar Proyecto
                </a>

                <!-- Mobile Menu Button -->
                <button @click="mobileMenuOpen = !mobileMenuOpen" 
                        type="button" 
                        id="mobile-menu-btn"
                        class="inline-flex items-center justify-center rounded-lg p-2 text-zinc-500 hover:bg-zinc-100 hover:text-zinc-900 dark:text-zinc-400 dark:hover:bg-brand-navy/60 dark:hover:text-white md:hidden"
                        aria-expanded="false">
                    <span class="sr-only">Abrir menú principal</span>
                    <svg x-show="!mobileMenuOpen" class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                    <svg x-show="mobileMenuOpen" class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" style="display: none;">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Navigation Menu -->
        <div x-show="mobileMenuOpen" 
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 -translate-y-2"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 -translate-y-2"
             class="border-b border-zinc-200 bg-white dark:border-brand-navy dark:bg-brand-navy transition-colors duration-300 md:hidden"
             id="mobile-menu" 
             style="display: none;">
            <div class="space-y-1 px-4 py-3">
                @foreach($navItems as $item)
                    @php
                        $isActive = request()->routeIs($item['route']) || ($item['route'] === 'blog' && request()->routeIs('blog.detalle'));
                    @endphp
                    <a href="{{ route($item['route']) }}" 
                       id="mobile-nav-link-{{ $item['route'] }}"
                       class="block rounded-lg px-3 py-2.5 text-base font-bold transition-colors duration-200 {{ $isActive ? 'text-brand-cyan bg-brand-cyan/10 dark:bg-brand-cyan/10' : 'text-brand-navy dark:text-zinc-300 hover:bg-zinc-50 dark:hover:bg-brand-navy/60 hover:text-brand-cyan dark:hover:text-brand-cyan' }}"
                       @click="mobileMenuOpen = false">
                        {{ $item['label'] }}
                    </a>
                @endforeach
                <a href="{{ route('contacto') }}" 
                   id="mobile-nav-cta"
                   class="mt-4 block w-full rounded-xl bg-brand-cyan hover:bg-brand-cyan-dark px-4 py-2.5 text-center text-base font-bold text-brand-navy shadow-md transition-all duration-300"
                   @click="mobileMenuOpen = false">
                    Cotizar Proyecto
                </a>
            </div>
        </div>
    </header>

    <!-- Main Content Slot -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- Footer Section -->
    <footer class="border-t border-zinc-200 bg-slate-100 text-brand-slate dark:border-brand-navy/55 dark:bg-brand-navy dark:text-zinc-350 transition-colors duration-300">
        <div class="mx-auto max-w-7xl px-4 py-6 md:px-8">
            <div class="grid grid-cols-1 gap-6 md:grid-cols-4">
                <!-- Branding and bio -->
                <div class="md:col-span-1 space-y-2.5">
                    <a href="{{ route('inicio') }}" class="flex items-center gap-2">
                        <img src="{{ asset('img/logo-light.png') }}" class="h-10 w-auto dark:hidden" alt="IMGEESSA Group">
                        <img src="{{ asset('img/logo-dark.png') }}" class="h-10 w-auto hidden dark:block" alt="IMGEESSA Group">
                    </a>
                    <p class="text-[13px] leading-relaxed">
                        Servicios especializados en Seguridad y Salud en el Trabajo, Gestión Ambiental, Sistemas de Calidad y consultoría HSEQ para organizaciones comprometidas con la excelencia y el desarrollo sostenible.
                    </p>
                </div>

                <!-- Quick Navigation Links -->
                <div>
                    <h3 class="text-[13px] font-bold uppercase tracking-wider text-brand-navy dark:text-white">Navegación</h3>
                    <ul class="mt-2.5 space-y-1.5">
                        <li><a href="{{ route('inicio') }}" class="text-[13px] hover:text-brand-cyan transition-colors duration-150">Inicio</a></li>
                        <li><a href="{{ route('quienes_somos') }}" class="text-[13px] hover:text-brand-cyan transition-colors duration-150">Quiénes Somos</a></li>
                        <li><a href="{{ route('catalogo') }}" class="text-[13px] hover:text-brand-cyan transition-colors duration-150">Catálogo</a></li>
                        <li><a href="{{ route('blog') }}" class="text-[13px] hover:text-brand-cyan transition-colors duration-150">Blog Informativo</a></li>
                        <li><a href="{{ route('contacto') }}" class="text-[13px] hover:text-brand-cyan transition-colors duration-150">Contacto</a></li>
                    </ul>
                </div>

                <!-- Contact Info -->
                <div>
                    <h3 class="text-[13px] font-bold uppercase tracking-wider text-brand-navy dark:text-white">Contacto</h3>
                    <ul class="mt-2.5 space-y-1.5 text-[13px]">
                        <li class="flex items-center gap-2">
                            <svg class="h-4 w-4 shrink-0 text-brand-cyan" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.94.725l.548 2.2a1 1 0 01-.321.988l-1.305.98a10.582 10.582 0 004.872 4.872l.98-1.305a1 1 0 01.988-.321l2.2.548a1 1 0 01.725.94V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                            <span><b>Cel:</b> 3108448788 - 3107696821</span>
                        </li>
                        <li class="flex items-center gap-2">
                            <svg class="h-4 w-4 shrink-0 text-brand-cyan" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                            <span>Direccioncomercial@imgeessa.com</span>
                        </li>
                        <li class="flex items-center gap-2">
                            <svg class="h-4 w-4 shrink-0 text-brand-cyan" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                            <span>Comercial@imgeessa.com</span>
                        </li>
                        <li class="flex items-center gap-2">
                            <svg class="h-4 w-4 shrink-0 text-brand-cyan" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                            <span>Gerencia@imgeessa.com</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <svg class="h-4 w-4 shrink-0 text-brand-cyan mt-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            <span>Av carrera 30 # 75-61 Bogotá</span>
                        </li>
                    </ul>
                </div>

                <!-- Redes Sociales -->
                <div class="space-y-4">
                    <h3 class="text-[13px] font-bold uppercase tracking-wider text-brand-navy dark:text-white">Síguenos</h3>
                    <ul class="mt-2.5 space-y-1.5 text-[13px]">
                        <!-- WhatsApp -->
                        <li>
                            <a href="https://api.whatsapp.com/send?phone=573107696821&text=Me%20interesa%20solicitar%20informacion%20comercial%20con%20ustedes." target="_blank" rel="noopener noreferrer" class="flex items-center gap-2 text-zinc-500 hover:text-brand-cyan dark:text-zinc-400 dark:hover:text-brand-cyan transition-colors duration-200">
                                <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51a12.8 12.8 0 00-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z" />
                                </svg>
                                <span>WhatsApp</span>
                            </a>
                        </li>
                        <!-- Facebook -->
                        <li>
                            <a href="https://www.facebook.com/people/Imgeessa-Soluciones-Integrales-HSEQ/100075735164676/?locale=es_LA" target="_blank" rel="noopener noreferrer" class="flex items-center gap-2 text-zinc-500 hover:text-brand-cyan dark:text-zinc-400 dark:hover:text-brand-cyan transition-colors duration-200">
                                <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" />
                                </svg>
                                <span>Facebook</span>
                            </a>
                        </li>
                        <!-- Instagram -->
                        <li>
                            <a href="https://www.instagram.com/imgeessa/" target="_blank" rel="noopener noreferrer" class="flex items-center gap-2 text-zinc-500 hover:text-brand-cyan dark:text-zinc-400 dark:hover:text-brand-cyan transition-colors duration-200">
                                <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd" />
                                </svg>
                                <span>Instagram</span>
                            </a>
                        </li>
                        <!-- X (Twitter) -->
                        <li>
                            <a href="https://x.com/ImgeessaHseq" target="_blank" rel="noopener noreferrer" class="flex items-center gap-2 text-zinc-500 hover:text-brand-cyan dark:text-zinc-400 dark:hover:text-brand-cyan transition-colors duration-200">
                                <svg class="h-4 w-4 ml-0.5 mr-0.5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/>
                                </svg>
                                <span>X (Twitter)</span>
                            </a>
                        </li>
                        <!-- LinkedIn -->
                        <li>
                            <a href="https://www.linkedin.com/in/imgeessa-sas-7881ba306/" target="_blank" rel="noopener noreferrer" class="flex items-center gap-2 text-zinc-500 hover:text-brand-cyan dark:text-zinc-400 dark:hover:text-brand-cyan transition-colors duration-200">
                                <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z" clip-rule="evenodd" />
                                </svg>
                                <span>LinkedIn</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Footer copyright and disclaimer -->
            <div class="mt-6 border-t border-zinc-200 pt-4 dark:border-brand-navy/60 flex flex-col md:flex-row justify-between items-center gap-4 text-xs">
                <p>&copy; {{ date('Y') }} IMGEESSA SOLUCIONES INTEGRALES HSEQ S.A.S.</p>
                <div class="flex gap-4">
                    <a href="{{ asset('documentos/tratamiento de datos.pdf') }}" target="_blank" class="hover:text-brand-cyan transition-colors duration-150">Tratamiento de datos Personales </a>
                </div>
            </div>
        </div>
    </footer>
    <!-- Chatbot Flotante -->
    <div x-data="{ 
            chatOpen: false, 
            userInput: '', 
            isLoading: false, 
            messages: [
                { role: 'assistant', content: '¡Hola! Soy tu asistente virtual de <strong>IMGEESSA</strong>. Llevo mi equipo de seguridad y estoy listo para ayudarte. ¿Qué necesitas hoy?' }
            ],
            async sendMessage() {
                if (!this.userInput.trim() || this.isLoading) return;
                
                const msg = this.userInput.trim();
                this.messages.push({ role: 'user', content: msg });
                this.userInput = '';
                this.isLoading = true;
                this.scrollToBottom();

                try {
                    const response = await fetch('{{ route('chat.send') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            message: msg,
                            history: this.messages.slice(0, -1)
                        })
                    });

                    const data = await response.json();
                    
                    if (data.reply) {
                        this.messages.push({ role: 'assistant', content: data.reply });
                    } else {
                        this.messages.push({ role: 'assistant', content: 'Lo siento, ha ocurrido un error.' });
                    }
                } catch (error) {
                    this.messages.push({ role: 'assistant', content: 'Error de conexión. Intenta de nuevo más tarde.' });
                } finally {
                    this.isLoading = false;
                    this.scrollToBottom();
                }
            },
            scrollToBottom() {
                setTimeout(() => {
                    const chatBox = document.getElementById('chat-messages');
                    if (chatBox) chatBox.scrollTop = chatBox.scrollHeight;
                }, 50);
            }
        }" class="fixed bottom-6 right-6 z-50">
        
        <!-- Ventana del Chat -->
        <div x-show="chatOpen" 
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 translate-y-10 scale-90"
             x-transition:enter-end="opacity-100 translate-y-0 scale-100"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100 translate-y-0 scale-100"
             x-transition:leave-end="opacity-0 translate-y-10 scale-90"
             class="absolute bottom-20 right-0 w-80 sm:w-96 rounded-2xl border border-zinc-200 bg-white shadow-2xl dark:border-brand-navy/60 dark:bg-brand-navy-dark overflow-hidden flex flex-col"
             style="display: none; transform-origin: bottom right;">
            
            <!-- Header del Chat -->
            <div class="relative bg-gradient-to-r from-brand-navy to-brand-navy-dark p-4 flex items-center gap-3">
                <!-- Decoración -->
                <div class="absolute right-0 top-0 w-32 h-32 bg-brand-cyan/10 rounded-full blur-2xl"></div>
                
                <!-- Avatar en el Header -->
                <div class="relative h-14 w-14 rounded-full border-2 border-brand-cyan/50 bg-white/10 flex-shrink-0 overflow-hidden flex items-center justify-center">
                    <img src="{{ asset('img/bot-avatar.png') }}" alt="Bot Avatar" class="h-full w-full object-contain scale-[2.2] translate-y-2 filter drop-shadow-[0_2px_5px_rgba(0,0,0,0.3)]">
                </div>
                
                <div class="flex-grow z-10">
                    <h4 class="text-white font-bold text-sm">Asistente IMGEESSA</h4>
                    <p class="text-brand-cyan text-xs flex items-center gap-1">
                        <span class="w-2 h-2 rounded-full bg-green-400 animate-pulse"></span> En línea
                    </p>
                </div>
                
                <button @click="chatOpen = false" class="text-zinc-300 hover:text-white transition-colors z-10">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>
            
            <!-- Cuerpo del Chat -->
            <div id="chat-messages" class="h-80 p-4 overflow-y-auto bg-slate-50 dark:bg-brand-navy/30 flex flex-col gap-4 scroll-smooth">
                
                <template x-for="(msg, index) in messages" :key="index">
                    <div class="w-full flex flex-col">
                        <!-- Mensaje del Bot -->
                        <div class="flex gap-2" x-show="msg.role === 'assistant'">
                            <div class="h-10 w-10 rounded-full bg-brand-cyan/20 flex-shrink-0 overflow-hidden flex items-center justify-center">
                                <img src="{{ asset('img/bot-avatar.png') }}" alt="Bot Avatar" class="h-full w-full object-contain scale-[2.2] translate-y-1.5">
                            </div>
                            <div class="bg-white dark:bg-brand-navy rounded-2xl rounded-tl-sm p-3 shadow-sm border border-zinc-100 dark:border-brand-navy/50 max-w-[85%]">
                                <p class="text-sm text-brand-slate dark:text-zinc-200 leading-relaxed" x-html="msg.content.replace(/\n/g, '<br>')"></p>
                            </div>
                        </div>

                        <!-- Mensaje del Usuario -->
                        <div class="flex gap-2 justify-end" x-show="msg.role === 'user'">
                            <div class="bg-brand-cyan dark:bg-brand-cyan-dark rounded-2xl rounded-tr-sm p-3 shadow-sm max-w-[85%]">
                                <p class="text-sm text-brand-navy dark:text-white font-medium leading-relaxed" x-text="msg.content"></p>
                            </div>
                        </div>
                    </div>
                </template>

                <!-- Animación de "Escribiendo..." -->
                <div class="flex gap-2" x-show="isLoading" style="display: none;">
                    <div class="h-10 w-10 rounded-full bg-brand-cyan/20 flex-shrink-0 overflow-hidden flex items-center justify-center">
                        <img src="{{ asset('img/bot-avatar.png') }}" alt="Bot Avatar" class="h-full w-full object-contain scale-[2.2] translate-y-1.5 grayscale opacity-70">
                    </div>
                    <div class="bg-white dark:bg-brand-navy rounded-2xl rounded-tl-sm p-3 shadow-sm border border-zinc-100 dark:border-brand-navy/50 flex items-center gap-1.5">
                        <span class="w-2 h-2 bg-brand-cyan rounded-full animate-pulse"></span>
                        <span class="w-2 h-2 bg-brand-cyan rounded-full animate-pulse" style="animation-delay: 0.2s"></span>
                        <span class="w-2 h-2 bg-brand-cyan rounded-full animate-pulse" style="animation-delay: 0.4s"></span>
                    </div>
                </div>

            </div>
            
            <!-- Input del Chat -->
            <div class="p-3 bg-white dark:bg-brand-navy-dark border-t border-zinc-100 dark:border-brand-navy/60">
                <div class="flex items-center gap-2 relative">
                    <input type="text" 
                           x-model="userInput" 
                           @keydown.enter="sendMessage" 
                           :disabled="isLoading"
                           placeholder="Escribe tu mensaje..." 
                           class="w-full rounded-full border border-zinc-300 bg-zinc-50 px-4 py-2.5 text-sm text-zinc-900 focus:border-brand-cyan focus:outline-none focus:ring-1 focus:ring-brand-cyan dark:border-brand-slate dark:bg-brand-navy dark:text-white dark:focus:border-brand-cyan pr-12 disabled:opacity-50">
                    
                    <button @click="sendMessage" 
                            :disabled="isLoading || userInput.trim() === ''"
                            class="absolute right-1 p-2 rounded-full bg-brand-cyan text-brand-navy hover:bg-brand-cyan-dark transition-colors disabled:opacity-50 disabled:cursor-not-allowed">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path></svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Botón Flotante -->
        <button @click="chatOpen = !chatOpen" 
                class="relative flex h-16 w-16 items-center justify-center rounded-full bg-white dark:bg-brand-navy border-2 border-brand-cyan shadow-[0_0_15px_rgba(0,210,211,0.3)] hover:shadow-[0_0_25px_rgba(0,210,211,0.5)] transition-all duration-300 hover:scale-105 group overflow-hidden"
                :class="chatOpen ? 'scale-90 bg-zinc-100 dark:bg-brand-navy-dark border-zinc-400 dark:border-zinc-500 shadow-none' : 'animate-bounce-slow'">
            
            <!-- Efecto Glow para modo oscuro (solo cuando está cerrado) -->
            <div class="absolute inset-0 rounded-full bg-brand-cyan/10 blur-xl dark:bg-brand-cyan/30" x-show="!chatOpen"></div>
            
            <!-- Avatar -->
            <img src="{{ asset('img/bot-avatar.png') }}" 
                 alt="Abrir Chat" 
                 class="relative z-10 h-full w-full object-contain translate-y-2 filter drop-shadow-[0_4px_6px_rgba(0,0,0,0.15)] dark:drop-shadow-[0_0_8px_rgba(255,255,255,0.1)] transition-transform duration-300"
                 :class="chatOpen ? 'scale-0 opacity-0' : 'scale-[2.2] opacity-100'">
            
            <!-- Icono de Cerrar (se muestra cuando está abierto) -->
            <svg class="absolute z-20 h-8 w-8 text-zinc-600 dark:text-white transition-transform duration-300" 
                 :class="chatOpen ? 'scale-100 opacity-100 rotate-90' : 'scale-0 opacity-0 rotate-0'" 
                 fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
        </button>
    </div>
    
    <!-- Animación extra para el botón flotante -->
    <style>
        @keyframes bounce-slow {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-6px); }
        }
        .animate-bounce-slow {
            animation: bounce-slow 4s ease-in-out infinite;
        }
    </style>
</body>
</html>
