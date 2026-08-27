<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Pedra Rica OfICIAL - Desporto. Educação. Fé. Transformação.')</title>
    <meta name="description" content="@yield('description', 'Pedra Rica - Desporto, Educação, Fé e Transformação. Um projeto social que transforma vidas através do desporto.')">

    {{-- Open Graph --}}
    <meta property="og:title" content="@yield('og:title', 'Pedra Rica OfICIAL')">
    <meta property="og:description" content="@yield('og:description', 'Desporto. Educação. Fé. Transformação.')">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:site_name" content="Pedra Rica Oficial">

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="bg-white font-sans antialiased text-gray-800">

    {{-- NAVBAR --}}
    <header x-data="{ mobileOpen: false, historyOpen: false, sportsOpen: false }"
            class="fixed top-0 inset-x-0 z-50 bg-white/95 backdrop-blur-sm shadow-sm border-b border-gray-100"
            x-on:scroll.window="if (window.scrollY > 20) { $el.classList.add('shadow-md') } else { $el.classList.remove('shadow-md') }">
        <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16 lg:h-20">

                {{-- Logo --}}
                <a href="{{ route('home') }}" class="flex items-center shrink-0">
                    <span class="text-xl lg:text-2xl font-extrabold tracking-tight text-[#1e40af]">PEDRA RICA</span>
                    <span class="ml-1.5 text-[10px] lg:text-xs font-semibold text-[#3b82f6] bg-blue-50 px-1.5 py-0.5 rounded-md uppercase tracking-widest">Oficial</span>
                </a>

                {{-- Desktop Nav --}}
                <div class="hidden lg:flex lg:items-center lg:space-x-1">
                    <a href="{{ route('home') }}" class="px-3 py-2 text-sm font-medium text-gray-700 hover:text-[#1e40af] rounded-lg hover:bg-blue-50 transition-colors">Início</a>
                    <a href="{{ route('pages.about') }}" class="px-3 py-2 text-sm font-medium text-gray-700 hover:text-[#1e40af] rounded-lg hover:bg-blue-50 transition-colors">Sobre</a>

                    {{-- História Dropdown --}}
                    <div class="relative" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                        <button @click="open = !open" class="flex items-center px-3 py-2 text-sm font-medium text-gray-700 hover:text-[#1e40af] rounded-lg hover:bg-blue-50 transition-colors">
                            História
                            <svg class="ml-1 w-3.5 h-3.5 transition-transform duration-200" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                        </button>
                        <div x-show="open" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0 -translate-y-1" x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 -translate-y-1"
                             class="absolute left-0 mt-1 w-48 bg-white rounded-xl shadow-lg border border-gray-100 py-2 z-50">
                            <a href="{{ route('pages.timeline') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-[#1e40af]">Timeline</a>
                            <a href="{{ route('pages.founder') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-[#1e40af]">Fundador</a>
                        </div>
                    </div>

                    {{-- Desporto Dropdown --}}
                    <div class="relative" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                        <button @click="open = !open" class="flex items-center px-3 py-2 text-sm font-medium text-gray-700 hover:text-[#1e40af] rounded-lg hover:bg-blue-50 transition-colors">
                            Desporto
                            <svg class="ml-1 w-3.5 h-3.5 transition-transform duration-200" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                        </button>
                        <div x-show="open" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0 -translate-y-1" x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 -translate-y-1"
                             class="absolute left-0 mt-1 w-48 bg-white rounded-xl shadow-lg border border-gray-100 py-2 z-50">
                            <a href="{{ route('pages.players') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-[#1e40af]">Jogadores</a>
                            <a href="{{ route('pages.coaches') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-[#1e40af]">Treinadores</a>
                            <a href="{{ route('pages.games') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-[#1e40af]">Jogos</a>
                            <a href="{{ route('pages.competitions') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-[#1e40af]">Competições</a>
                            <a href="{{ route('pages.trophies') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-[#1e40af]">Títulos</a>
                        </div>
                    </div>

                    <a href="{{ route('pages.gallery') }}" class="px-3 py-2 text-sm font-medium text-gray-700 hover:text-[#1e40af] rounded-lg hover:bg-blue-50 transition-colors">Galeria</a>
                    <a href="{{ route('pages.news') }}" class="px-3 py-2 text-sm font-medium text-gray-700 hover:text-[#1e40af] rounded-lg hover:bg-blue-50 transition-colors">Notícias</a>
                    <a href="{{ route('pages.impact') }}" class="px-3 py-2 text-sm font-medium text-gray-700 hover:text-[#1e40af] rounded-lg hover:bg-blue-50 transition-colors">Impacto Social</a>
                    <a href="{{ route('pages.contact') }}" class="px-3 py-2 text-sm font-medium text-gray-700 hover:text-[#1e40af] rounded-lg hover:bg-blue-50 transition-colors">Contacto</a>
                </div>

                {{-- Mobile Hamburger --}}
                <button @click="mobileOpen = !mobileOpen" class="lg:hidden p-2 rounded-lg text-gray-600 hover:bg-gray-100 transition-colors" :aria-expanded="mobileOpen" aria-label="Menu">
                    <svg x-show="!mobileOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                    <svg x-show="mobileOpen" x-cloak class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>

            {{-- Mobile Menu --}}
            <div x-show="mobileOpen" x-cloak x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 -translate-y-2" x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 -translate-y-2"
                 class="lg:hidden pb-4 border-t border-gray-100 mt-2 pt-4">
                <div class="space-y-1">
                    <a href="{{ route('home') }}" class="block px-3 py-2.5 rounded-lg text-sm font-medium text-gray-700 hover:bg-blue-50 hover:text-[#1e40af]">Início</a>
                    <a href="{{ route('pages.about') }}" class="block px-3 py-2.5 rounded-lg text-sm font-medium text-gray-700 hover:bg-blue-50 hover:text-[#1e40af]">Sobre</a>

                    {{-- História --}}
                    <button @click="historyOpen = !historyOpen" class="flex items-center justify-between w-full px-3 py-2.5 rounded-lg text-sm font-medium text-gray-700 hover:bg-blue-50 hover:text-[#1e40af]">
                        História
                        <svg class="w-4 h-4 transition-transform duration-200" :class="historyOpen ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </button>
                    <div x-show="historyOpen" x-cloak class="pl-4 space-y-1">
                        <a href="{{ route('pages.timeline') }}" class="block px-3 py-2 rounded-lg text-sm text-gray-600 hover:bg-blue-50 hover:text-[#1e40af]">Timeline</a>
                        <a href="{{ route('pages.founder') }}" class="block px-3 py-2 rounded-lg text-sm text-gray-600 hover:bg-blue-50 hover:text-[#1e40af]">Fundador</a>
                    </div>

                    {{-- Desporto --}}
                    <button @click="sportsOpen = !sportsOpen" class="flex items-center justify-between w-full px-3 py-2.5 rounded-lg text-sm font-medium text-gray-700 hover:bg-blue-50 hover:text-[#1e40af]">
                        Desporto
                        <svg class="w-4 h-4 transition-transform duration-200" :class="sportsOpen ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </button>
                    <div x-show="sportsOpen" x-cloak class="pl-4 space-y-1">
                        <a href="{{ route('pages.players') }}" class="block px-3 py-2 rounded-lg text-sm text-gray-600 hover:bg-blue-50 hover:text-[#1e40af]">Jogadores</a>
                        <a href="{{ route('pages.coaches') }}" class="block px-3 py-2 rounded-lg text-sm text-gray-600 hover:bg-blue-50 hover:text-[#1e40af]">Treinadores</a>
                        <a href="{{ route('pages.games') }}" class="block px-3 py-2 rounded-lg text-sm text-gray-600 hover:bg-blue-50 hover:text-[#1e40af]">Jogos</a>
                        <a href="{{ route('pages.competitions') }}" class="block px-3 py-2 rounded-lg text-sm text-gray-600 hover:bg-blue-50 hover:text-[#1e40af]">Competições</a>
                        <a href="{{ route('pages.trophies') }}" class="block px-3 py-2 rounded-lg text-sm text-gray-600 hover:bg-blue-50 hover:text-[#1e40af]">Títulos</a>
                    </div>

                    <a href="{{ route('pages.gallery') }}" class="block px-3 py-2.5 rounded-lg text-sm font-medium text-gray-700 hover:bg-blue-50 hover:text-[#1e40af]">Galeria</a>
                    <a href="{{ route('pages.news') }}" class="block px-3 py-2.5 rounded-lg text-sm font-medium text-gray-700 hover:bg-blue-50 hover:text-[#1e40af]">Notícias</a>
                    <a href="{{ route('pages.impact') }}" class="block px-3 py-2.5 rounded-lg text-sm font-medium text-gray-700 hover:bg-blue-50 hover:text-[#1e40af]">Impacto Social</a>
                    <a href="{{ route('pages.contact') }}" class="block px-3 py-2.5 rounded-lg text-sm font-medium text-gray-700 hover:bg-blue-50 hover:text-[#1e40af]">Contacto</a>
                </div>
            </div>
        </nav>
    </header>

    {{-- Spacer for fixed navbar --}}
    <div class="h-16 lg:h-20"></div>

    {{-- MAIN CONTENT --}}
    <main>
        @yield('content')
    </main>

    {{-- FOOTER --}}
    <footer class="bg-[#1e293b] text-gray-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12">

                {{-- Brand --}}
                <div>
                    <div class="mb-4">
                        <span class="text-xl font-extrabold text-white tracking-tight">PEDRA RICA</span>
                        <span class="ml-1.5 text-[10px] font-semibold text-[#3b82f6] uppercase tracking-widest">Oficial</span>
                    </div>
                    <p class="text-sm text-gray-400 leading-relaxed">
                        Um projeto social dedicado à transformação de crianças e adolescentes através do desporto, educação e fé.
                    </p>
                </div>

                {{-- Links Rápidos --}}
                <div>
                    <h3 class="text-sm font-semibold text-white uppercase tracking-wider mb-4">Links Rápidos</h3>
                    <ul class="space-y-3">
                        <li><a href="{{ route('pages.about') }}" class="text-sm text-gray-400 hover:text-white transition-colors">Sobre</a></li>
                        <li><a href="{{ route('pages.timeline') }}" class="text-sm text-gray-400 hover:text-white transition-colors">História</a></li>
                        <li><a href="{{ route('pages.players') }}" class="text-sm text-gray-400 hover:text-white transition-colors">Jogadores</a></li>
                        <li><a href="{{ route('pages.coaches') }}" class="text-sm text-gray-400 hover:text-white transition-colors">Treinadores</a></li>
                    </ul>
                </div>

                {{-- Desporto --}}
                <div>
                    <h3 class="text-sm font-semibold text-white uppercase tracking-wider mb-4">Desporto</h3>
                    <ul class="space-y-3">
                        <li><a href="{{ route('pages.games') }}" class="text-sm text-gray-400 hover:text-white transition-colors">Jogos</a></li>
                        <li><a href="{{ route('pages.competitions') }}" class="text-sm text-gray-400 hover:text-white transition-colors">Competições</a></li>
                        <li><a href="{{ route('pages.trophies') }}" class="text-sm text-gray-400 hover:text-white transition-colors">Títulos</a></li>
                        <li><a href="{{ route('pages.gallery') }}" class="text-sm text-gray-400 hover:text-white transition-colors">Galeria</a></li>
                    </ul>
                </div>

                {{-- Contacto --}}
                <div>
                    <h3 class="text-sm font-semibold text-white uppercase tracking-wider mb-4">Contacto</h3>
                    <ul class="space-y-3">
                        <li>
                            <a href="{{ route('pages.contact') }}" class="text-sm text-gray-400 hover:text-white transition-colors">
                                Página de Contacto
                            </a>
                        </li>
                    </ul>

                    @php
                        $socialLinks = $socialLinks ?? \App\Models\SocialLink::active()->orderBy('sort_order')->get();
                    @endphp

                    @if($socialLinks->isNotEmpty())
                        <div class="flex items-center space-x-3 mt-6">
                            @foreach($socialLinks as $link)
                                <a href="{{ $link->url }}" target="_blank" rel="noopener noreferrer"
                                   class="w-9 h-9 rounded-full bg-white/10 flex items-center justify-center text-gray-400 hover:bg-[#3b82f6] hover:text-white transition-all duration-200"
                                   aria-label="{{ $link->platform }}">
                                    <span class="text-xs font-bold uppercase">{{ strtoupper(substr($link->platform, 0, 2)) }}</span>
                                </a>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>

        {{-- Bottom Bar --}}
        <div class="border-t border-white/10">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
                <div class="flex flex-col md:flex-row items-center justify-between gap-4">
                    <div class="text-center md:text-left">
                        <p class="text-sm text-gray-400">
                            &copy; 2009–{{ date('Y') }} Pedra Rica Oficial. Todos os direitos reservados.
                        </p>
                        <p class="text-xs text-gray-500 mt-1 italic">
                            Desporto. Educação. Fé. Transformação.
                        </p>
                    </div>
                    <div class="text-center md:text-right">
                        <p class="text-xs text-gray-500">
                            Website desenvolvido por
                            <span class="text-gray-400 font-medium">{{ $settings['developer_name'] ?? 'Pedra Rica Tech' }}</span>
                        </p>
                        <a href="{{ route('admin.login') }}" class="inline-flex items-center mt-2 text-xs text-gray-600 hover:text-white transition-colors">
                            <i data-lucide="lock" class="w-3 h-3 mr-1"></i> Admin
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    @stack('scripts')
</body>
</html>
