@extends('layouts.app')

@section('title', 'Contacto y Soporte | IMGEESSA')

@section('content')
<!-- Header Page Title -->
<section class="relative overflow-hidden py-16 bg-slate-100/60 dark:bg-brand-navy border-b border-zinc-200/40 dark:border-brand-navy/30 transition-colors duration-300">
    <div class="absolute inset-0 -z-10 bg-[radial-gradient(50rem_25rem_at_center,rgba(0,210,211,0.08),transparent)]"></div>
    <div class="mx-auto max-w-7xl px-4 md:px-8 text-center space-y-4">
        <h1 class="text-4xl font-extrabold tracking-tight text-brand-navy dark:text-white sm:text-5xl">
            Contacto y Soporte
        </h1>
        <p class="mx-auto max-w-2xl text-base text-brand-slate dark:text-zinc-300">
            ¿Tienes alguna consulta técnica o deseas solicitar una cotización? Escríbenos y nuestro equipo te responderá a la brevedad.
        </p>
    </div>
</section>

<!-- Form & Info Section -->
<section class="py-20 bg-white dark:bg-brand-navy-dark transition-colors duration-300">
    <div class="mx-auto max-w-7xl px-4 md:px-8">
        <div class="grid grid-cols-1 gap-12 lg:grid-cols-12 lg:items-start">
            
            <!-- Left Column: Contact Details & Map Embed Mock (5 Cols) -->
            <div class="lg:col-span-5 space-y-8">
                <div class="space-y-4">
                    <h2 class="text-2xl font-bold text-brand-navy dark:text-white">Nuestras Oficinas</h2>
                    <p class="text-sm text-brand-slate dark:text-zinc-300 leading-relaxed">
                        Estamos ubicados en el principal núcleo logístico de la capital, facilitando la importación y despacho rápido de refacciones y equipos de precisión.
                    </p>
                </div>

                <!-- Contact details card -->
                <div class="rounded-2xl border border-zinc-200/40 bg-slate-50 p-6 dark:border-brand-navy/40 dark:bg-brand-navy/40 space-y-6">
                    <div class="flex items-start gap-4">
                        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-brand-cyan/10 text-brand-cyan shrink-0 shadow-sm transition-transform hover:scale-105">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                        </div>
                        <div class="pt-1">
                            <h4 class="text-sm font-extrabold text-brand-navy dark:text-white uppercase tracking-wider">Dirección Física</h4>
                            <p class="text-sm text-brand-slate dark:text-zinc-300 mt-1 leading-relaxed">
                                Av carrera 30 # 75-61<br/>
                                <span class="text-xs text-zinc-500 dark:text-zinc-400">Bogotá, Colombia</span>
                            </p>
                        </div>
                    </div>

                    <div class="flex items-start gap-4">
                        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-brand-cyan/10 text-brand-cyan shrink-0 shadow-sm transition-transform hover:scale-105">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.94.725l.548 2.2a1 1 0 01-.321.988l-1.305.98a10.582 10.582 0 004.872 4.872l.98-1.305a1 1 0 01.988-.321l2.2.548a1 1 0 01.725.94V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                        </div>
                        <div class="pt-1">
                            <h4 class="text-sm font-extrabold text-brand-navy dark:text-white uppercase tracking-wider">Teléfono de Soporte</h4>
                            <div class="text-sm text-brand-slate dark:text-zinc-300 mt-1 space-y-1.5">
                                <div class="flex items-center gap-2">
                                    <span class="font-semibold text-brand-navy dark:text-white">Líneas:</span>
                                    <span>3108448788</span>
                                    <span class="text-zinc-300 dark:text-zinc-600">|</span>
                                    <span>3107696821</span>
                                </div>
                                <div class="flex items-center gap-2 text-xs text-zinc-500 dark:text-zinc-400">
                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    <span>Lun-Vie 8:00am - 12:00pm y 2:00pm - 4:00pm</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-start gap-4">
                        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-brand-cyan/10 text-brand-cyan shrink-0 shadow-sm transition-transform hover:scale-105">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <div class="pt-1">
                            <h4 class="text-sm font-extrabold text-brand-navy dark:text-white uppercase tracking-wider">Correo Electrónico</h4>
                            <div class="text-sm text-brand-slate dark:text-zinc-300 mt-2 grid grid-cols-1 gap-2">
                                <a href="mailto:Direccioncomercial@imgeessa.com" class="flex items-center gap-2 hover:text-brand-cyan transition-colors">
                                    <span class="w-1.5 h-1.5 rounded-full bg-brand-cyan"></span> Direccioncomercial@imgeessa.com
                                </a>
                                <a href="mailto:Comercial@imgeessa.com" class="flex items-center gap-2 hover:text-brand-cyan transition-colors">
                                    <span class="w-1.5 h-1.5 rounded-full bg-brand-cyan"></span> Comercial@imgeessa.com
                                </a>
                                <a href="mailto:Gerencia@imgeessa.com" class="flex items-center gap-2 hover:text-brand-cyan transition-colors">
                                    <span class="w-1.5 h-1.5 rounded-full bg-brand-cyan"></span> Gerencia@imgeessa.com
                                </a>
                                <a href="mailto:cotizaciones@imgeessa.com" class="flex items-center gap-2 hover:text-brand-cyan transition-colors">
                                    <span class="w-1.5 h-1.5 rounded-full bg-brand-cyan"></span> cotizaciones@imgeessa.com
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Real Map Integration -->
                <div class="relative rounded-2xl overflow-hidden aspect-[4/3] border border-zinc-200/40 dark:border-brand-navy/30 shadow-lg group bg-slate-100 dark:bg-brand-navy-dark">
                    <iframe 
                        src="https://maps.google.com/maps?q=Av%20carrera%2030%20%23%2075-61%20Bogot%C3%A1&t=&z=15&ie=UTF8&iwloc=&output=embed" 
                        width="100%" 
                        height="100%" 
                        style="border:0;" 
                        allowfullscreen="" 
                        loading="lazy" 
                        referrerpolicy="no-referrer-when-downgrade"
                        class="absolute inset-0 w-full h-full grayscale-[20%] group-hover:grayscale-0 transition-all duration-500">
                    </iframe>
                </div>
            </div>

            <!-- Right Column: Interactive Form (7 Cols) -->
            <div class="lg:col-span-7"
                 x-data="{
                     name: '',
                     email: '',
                     subject: '',
                     message: '',
                     meeting_date: '',
                     meeting_time: '',
                     loading: false,
                     success: false,
                     errorMsg: '',
                     init() {
                         const urlParams = new URLSearchParams(window.location.search);
                         const equipo = urlParams.get('equipo');
                         if (equipo) {
                             this.subject = 'Cotización: ' + equipo;
                             this.message = 'Hola, me gustaría solicitar una cotización formal y recibir especificaciones técnicas adicionales para el equipo: ' + equipo + '.';
                         }
                     },
                     async submit() {
                         this.loading = true;
                         this.errorMsg = '';
                         
                         try {
                             const response = await fetch('{{ route('contacto.send') }}', {
                                 method: 'POST',
                                 headers: {
                                     'Content-Type': 'application/json',
                                     'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                 },
                                 body: JSON.stringify({
                                     name: this.name,
                                     email: this.email,
                                     subject: this.subject,
                                     message: this.message,
                                     meeting_date: this.meeting_date,
                                     meeting_time: this.meeting_time
                                 })
                             });
                             
                             const data = await response.json();
                             
                             if (response.ok && data.success) {
                                 this.success = true;
                                 this.name = '';
                                 this.email = '';
                                 this.subject = '';
                                 this.message = '';
                                 this.meeting_date = '';
                                 this.meeting_time = '';
                             } else {
                                 this.errorMsg = data.message || 'Ocurrió un error. Por favor intenta de nuevo.';
                             }
                         } catch (error) {
                             this.errorMsg = 'Error de conexión. Intenta nuevamente.';
                         } finally {
                             this.loading = false;
                         }
                     }
                 }">
                
                <div class="rounded-3xl border border-zinc-200/40 bg-white p-8 dark:border-brand-navy/40 dark:bg-brand-navy/35 shadow-sm relative overflow-hidden">
                    
                    <!-- Success overlay -->
                    <div x-show="success" 
                         x-transition:enter="transition ease-out duration-300"
                         x-transition:enter-start="opacity-0 translate-y-4"
                         x-transition:enter-end="opacity-100 translate-y-0"
                         class="absolute inset-0 bg-white dark:bg-brand-navy flex flex-col items-center justify-center p-8 text-center space-y-4 z-10"
                         style="display: none;">
                        <div class="flex h-16 w-16 items-center justify-center rounded-full bg-brand-cyan/20 text-brand-navy dark:text-brand-cyan shadow-md">
                            <svg class="h-8 w-8" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-brand-navy dark:text-white">¡Mensaje Enviado con Éxito!</h3>
                        <p class="text-sm text-brand-slate dark:text-zinc-300 max-w-sm">
                            Tu solicitud ha sido registrada correctamente. Un asesor técnico especializado de nuestro departamento de ingeniería se pondrá en contacto contigo en un plazo menor a 24 horas.
                        </p>
                        <button @click="success = false" 
                                type="button" 
                                id="success-reset-btn"
                                class="rounded-xl bg-slate-100 hover:bg-zinc-200 dark:bg-brand-navy-dark dark:text-white dark:hover:bg-brand-navy px-5 py-2.5 text-xs font-bold transition-colors">
                            Enviar otro mensaje
                        </button>
                    </div>

                    <!-- Loading overlay -->
                    <div x-show="loading" 
                         class="absolute inset-0 bg-white/80 dark:bg-brand-navy/80 flex items-center justify-center z-10"
                         style="display: none;">
                        <div class="flex flex-col items-center gap-3">
                            <div class="h-10 w-10 animate-spin rounded-full border-4 border-brand-cyan border-t-transparent"></div>
                            <span class="text-xs font-bold text-brand-slate dark:text-zinc-400">Procesando solicitud...</span>
                        </div>
                    </div>

                    <!-- Form Content -->
                    <form @submit.prevent="submit" class="space-y-6">
                        <div class="space-y-2">
                            <h3 class="text-xl font-bold text-brand-navy dark:text-white">Formulario de Contacto</h3>
                            <p class="text-xs text-brand-slate dark:text-zinc-400">Por favor, rellena todos los campos para agendar tu reunión.</p>
                        </div>
                        
                        <!-- Error Message -->
                        <div x-show="errorMsg" class="rounded-xl bg-red-50 p-4 border border-red-200" style="display: none;">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm font-medium text-red-800" x-text="errorMsg"></p>
                                </div>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                            <div class="space-y-1.5">
                                <label for="contact-name" class="text-xs font-bold text-brand-slate dark:text-zinc-450 uppercase tracking-wide">Nombre Completo</label>
                                <input x-model="name" 
                                       type="text" 
                                       id="contact-name"
                                       placeholder="Juan Pérez" 
                                       class="w-full rounded-xl border border-zinc-300 bg-slate-50 px-4 py-2.5 text-sm text-brand-navy shadow-sm focus:border-brand-cyan focus:bg-white focus:ring-1 focus:ring-brand-cyan dark:border-brand-navy dark:bg-brand-navy/60 dark:text-white dark:focus:border-brand-cyan"
                                       required>
                            </div>
                            <div class="space-y-1.5">
                                <label for="contact-email" class="text-xs font-bold text-brand-slate dark:text-zinc-450 uppercase tracking-wide">Correo Electrónico</label>
                                <input x-model="email" 
                                       type="email" 
                                       id="contact-email"
                                       placeholder="juan@empresa.com" 
                                       class="w-full rounded-xl border border-zinc-300 bg-slate-50 px-4 py-2.5 text-sm text-brand-navy shadow-sm focus:border-brand-cyan focus:bg-white focus:ring-1 focus:ring-brand-cyan dark:border-brand-navy dark:bg-brand-navy/60 dark:text-white dark:focus:border-brand-cyan"
                                       required>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                            <div class="space-y-1.5">
                                <label for="meeting-date" class="text-xs font-bold text-brand-slate dark:text-zinc-450 uppercase tracking-wide">Fecha de Reunión</label>
                                <input x-model="meeting_date" 
                                       type="date" 
                                       id="meeting-date"
                                       class="w-full rounded-xl border border-zinc-300 bg-slate-50 px-4 py-2.5 text-sm text-brand-navy shadow-sm focus:border-brand-cyan focus:bg-white focus:ring-1 focus:ring-brand-cyan dark:border-brand-navy dark:bg-brand-navy/60 dark:text-white dark:focus:border-brand-cyan"
                                       required>
                            </div>
                            <div class="space-y-1.5">
                                <label for="meeting-time" class="text-xs font-bold text-brand-slate dark:text-zinc-450 uppercase tracking-wide">Hora</label>
                                <input x-model="meeting_time" 
                                       type="time" 
                                       id="meeting-time"
                                       class="w-full rounded-xl border border-zinc-300 bg-slate-50 px-4 py-2.5 text-sm text-brand-navy shadow-sm focus:border-brand-cyan focus:bg-white focus:ring-1 focus:ring-brand-cyan dark:border-brand-navy dark:bg-brand-navy/60 dark:text-white dark:focus:border-brand-cyan"
                                       required>
                            </div>
                        </div>

                        <div class="space-y-1.5">
                            <label for="contact-subject" class="text-xs font-bold text-brand-slate dark:text-zinc-450 uppercase tracking-wide">Asunto de la consulta</label>
                            <input x-model="subject" 
                                   type="text" 
                                   id="contact-subject"
                                   placeholder="Cotización, Soporte Técnico, Consultoría..." 
                                   class="w-full rounded-xl border border-zinc-300 bg-slate-50 px-4 py-2.5 text-sm text-brand-navy shadow-sm focus:border-brand-cyan focus:bg-white focus:ring-1 focus:ring-brand-cyan dark:border-brand-navy dark:bg-brand-navy/60 dark:text-white dark:focus:border-brand-cyan"
                                   required>
                        </div>

                        <div class="space-y-1.5">
                            <label for="contact-message" class="text-xs font-bold text-brand-slate dark:text-zinc-450 uppercase tracking-wide">Mensaje o Detalles técnicos</label>
                            <textarea x-model="message" 
                                      id="contact-message"
                                      rows="5" 
                                      placeholder="Describe aquí tus especificaciones o requerimientos del proyecto..." 
                                      class="w-full rounded-xl border border-zinc-300 bg-slate-50 px-4 py-2.5 text-sm text-brand-navy shadow-sm focus:border-brand-cyan focus:bg-white focus:ring-1 focus:ring-brand-cyan dark:border-brand-navy dark:bg-brand-navy/60 dark:text-white dark:focus:border-brand-cyan"
                                      required></textarea>
                        </div>

                        <button type="submit" 
                                id="contact-submit-btn"
                                class="w-full inline-flex items-center justify-center rounded-xl bg-gradient-to-r from-brand-cyan to-indigo-600 px-5 py-3 text-sm font-bold text-brand-navy shadow-md hover:shadow-lg transition-all duration-200">
                            Enviar Mensaje
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- FAQ Accordion Section -->
<section class="py-20 bg-slate-50 dark:bg-brand-navy-dark/40 border-t border-zinc-200/40 dark:border-brand-navy/30 transition-colors duration-300">
    <div class="mx-auto max-w-4xl px-4 md:px-8 space-y-12">
        <div class="text-center space-y-4">
            <h2 class="text-3xl font-bold tracking-tight text-brand-navy dark:text-white">Preguntas Frecuentes (FAQs)</h2>
            <p class="text-sm text-brand-slate dark:text-zinc-300">Resolvemos las dudas más comunes sobre consultoría y Sistemas Integrados de Gestión.</p>
        </div>

        <!-- Accordion component -->
        <div class="space-y-4" x-data="{ activeFaq: null }">
            @foreach($faqs as $index => $faq)
                <div class="rounded-2xl border border-zinc-200 bg-white dark:border-brand-navy/40 dark:bg-brand-navy/40 transition-colors duration-300">
                    <button @click="activeFaq = (activeFaq === {{ $index }} ? null : {{ $index }})" 
                            type="button"
                            id="faq-btn-{{ $index }}"
                            class="w-full flex items-center justify-between p-6 text-left focus:outline-none">
                        <span class="text-base font-bold text-brand-navy dark:text-white">{{ $faq['pregunta'] }}</span>
                        <span class="ml-4 shrink-0 rounded-full bg-slate-100 p-1.5 text-zinc-500 dark:bg-brand-navy-dark dark:text-zinc-400 transition-transform duration-200"
                              :class="activeFaq === {{ $index }} ? 'rotate-180 bg-brand-cyan text-brand-navy' : ''">
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </span>
                    </button>
                    <!-- Collapsible answers body -->
                    <div x-show="activeFaq === {{ $index }}" 
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 max-h-0"
                         x-transition:enter-end="opacity-100 max-h-screen"
                         x-transition:leave="transition ease-in duration-150"
                         x-transition:leave-start="opacity-100 max-h-screen"
                         x-transition:leave-end="opacity-0 max-h-0"
                         class="border-t border-zinc-100 p-6 dark:border-brand-navy-dark"
                         style="display: none;">
                        <p class="text-sm text-brand-slate dark:text-zinc-350 leading-relaxed">{{ $faq['respuesta'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
