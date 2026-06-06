<!DOCTYPE html>
<html lang="es" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'IMGEESSA')</title>
    <link rel="icon" id="favicon" type="image/png" href="{{ asset('img/logo-l.png') }}?v=3">
    
    <!-- Script para alternar favicon según el tema del navegador/sistema -->
    <script>
        (function() {
            const mediaQuery = window.matchMedia('(prefers-color-scheme: dark)');
            function setFavicon(isDark) {
                const favicon = document.getElementById('favicon');
                if (favicon) {
                    favicon.setAttribute('href', isDark ? "{{ asset('img/logo-d.png') }}?v=3" : "{{ asset('img/logo-l.png') }}?v=3");
                }
            }
            setFavicon(mediaQuery.matches);
            try {
                mediaQuery.addEventListener('change', (e) => setFavicon(e.matches));
            } catch (err) {
                mediaQuery.addListener((e) => setFavicon(e.matches));
            }
        })();
    </script>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Outfit:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- CSS / JS compilation (Vite) -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Script inicial para prevenir parpadeo de Dark Mode -->
    <script>
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-theme: dark)').matches)) {
            document.documentElement.classList.add('dark');
            window.isDark = true;
        } else {
            document.documentElement.classList.remove('dark');
            window.isDark = false;
        }
    </script>
    
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
        <div class="mx-auto max-w-7xl px-4 py-12 md:px-8">
            <div class="grid grid-cols-1 gap-8 md:grid-cols-4">
                <!-- Branding and bio -->
                <div class="md:col-span-1 space-y-4">
                    <a href="{{ route('inicio') }}" class="flex items-center gap-2">
                        <img src="{{ asset('img/logo-light.png') }}" class="h-12 w-auto dark:hidden" alt="IMGEESSA Group">
                        <img src="{{ asset('img/logo-dark.png') }}" class="h-12 w-auto hidden dark:block" alt="IMGEESSA Group">
                    </a>
                    <p class="text-sm leading-relaxed">
                        Soluciones tecnológicas avanzadas en automatización, instrumentación de flujo, equipos eléctricos y consultoría de seguridad industrial para Latinoamérica.
                    </p>
                </div>

                <!-- Quick Navigation Links -->
                <div>
                    <h3 class="text-sm font-semibold uppercase tracking-wider text-brand-navy dark:text-white">Navegación</h3>
                    <ul class="mt-4 space-y-2">
                        <li><a href="{{ route('inicio') }}" class="text-sm hover:text-brand-cyan transition-colors duration-150">Inicio</a></li>
                        <li><a href="{{ route('quienes_somos') }}" class="text-sm hover:text-brand-cyan transition-colors duration-150">Quiénes Somos</a></li>
                        <li><a href="{{ route('catalogo') }}" class="text-sm hover:text-brand-cyan transition-colors duration-150">Catálogo</a></li>
                        <li><a href="{{ route('blog') }}" class="text-sm hover:text-brand-cyan transition-colors duration-150">Blog Informativo</a></li>
                        <li><a href="{{ route('contacto') }}" class="text-sm hover:text-brand-cyan transition-colors duration-150">Contacto</a></li>
                    </ul>
                </div>

                <!-- Contact Info -->
                <div>
                    <h3 class="text-sm font-semibold uppercase tracking-wider text-brand-navy dark:text-white">Contacto</h3>
                    <ul class="mt-4 space-y-2 text-sm">
                        <li class="flex items-center gap-2">
                            <svg class="h-4 w-4 shrink-0 text-brand-cyan" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.94.725l.548 2.2a1 1 0 01-.321.988l-1.305.98a10.582 10.582 0 004.872 4.872l.98-1.305a1 1 0 01.988-.321l2.2.548a1 1 0 01.725.94V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                            <span>+506 2200-1100</span>
                        </li>
                        <li class="flex items-center gap-2">
                            <svg class="h-4 w-4 shrink-0 text-brand-cyan" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                            <span>info@imgeessa.com</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <svg class="h-4 w-4 shrink-0 text-brand-cyan mt-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            <span>Parque Industrial Zona Franca, Módulo C-12, San José, Costa Rica</span>
                        </li>
                    </ul>
                </div>

                <!-- Newsletter MOCK -->
                <div class="space-y-4" x-data="{ email: '', subscribed: false, submit() { if(this.email) { this.subscribed = true; this.email = ''; } } }">
                    <h3 class="text-sm font-semibold uppercase tracking-wider text-brand-navy dark:text-white">Boletín Técnico</h3>
                    <p class="text-sm">Suscríbete para recibir noticias, casos de éxito e información técnica de nuestros productos.</p>
                    <form @submit.prevent="submit" class="flex gap-2">
                        <input x-model="email" 
                               type="email" 
                               id="footer-email"
                               placeholder="tu@email.com" 
                               class="w-full rounded-lg border border-zinc-300 bg-white px-3 py-2 text-sm text-zinc-900 shadow-sm focus:border-brand-cyan focus:ring-1 focus:ring-brand-cyan dark:border-brand-slate dark:bg-brand-navy-dark dark:text-white dark:focus:border-brand-cyan"
                               required>
                        <button type="submit" 
                                id="footer-subscribe-btn"
                                class="rounded-lg bg-brand-cyan hover:bg-brand-cyan-dark px-4 py-2 text-sm font-bold text-brand-navy transition-colors duration-200">
                            Unirse
                        </button>
                    </form>
                    <p x-show="subscribed" class="text-xs text-brand-cyan font-medium" style="display: none;">¡Gracias por suscribirte a nuestro boletín!</p>
                </div>
            </div>

            <!-- Footer copyright and disclaimer -->
            <div class="mt-12 border-t border-zinc-200 pt-8 dark:border-brand-navy/60 flex flex-col md:flex-row justify-between items-center gap-4 text-xs">
                <p>&copy; {{ date('Y') }} IMGEESSA S.A. Todos los derechos reservados.</p>
                <div class="flex gap-4">
                    <a href="#" class="hover:text-brand-cyan transition-colors duration-150">Políticas de Privacidad</a>
                    <a href="#" class="hover:text-brand-cyan transition-colors duration-150">Términos de Servicio</a>
                    <a href="#" class="hover:text-brand-cyan transition-colors duration-150">Soporte Técnico</a>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
