<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Pedra Rica') }} - Admin</title>
    <script src="https://unpkg.com/lucide@latest"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="bg-gray-100 font-sans antialiased" x-data="{ sidebarOpen: false }">
    <div class="min-h-screen flex">
        <!-- Mobile overlay -->
        <div x-show="sidebarOpen" x-cloak
             class="fixed inset-0 bg-black/50 z-40 lg:hidden"
             @click="sidebarOpen = false"
             x-transition:enter="transition-opacity ease-out duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition-opacity ease-in duration-200"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0">
        </div>

        <!-- Sidebar -->
        <aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
               class="fixed inset-y-0 left-0 z-50 w-64 bg-[#1e3a5f] transform transition-transform duration-300 ease-in-out lg:translate-x-0 lg:static lg:z-auto flex flex-col">
            <!-- Logo -->
            <div class="flex items-center justify-center h-16 bg-[#162d4a] border-b border-[#2a5080]">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-2">
                    <img src="{{ asset('images/pedra-rica-logo.jpeg') }}" alt="Logotipo Pedra Rica" class="w-8 h-8 rounded-full object-cover ring-2 ring-white/10">
                    <span class="text-white font-bold text-lg">Pedra Rica</span>
                </a>
            </div>

            <!-- Navigation -->
            <nav class="flex-1 overflow-y-auto py-4 px-3 space-y-1">
                @php
                    $navItems = [
                        ['route' => 'admin.dashboard', 'label' => 'Dashboard', 'icon' => 'home'],
                        ['route' => 'admin.players.index', 'label' => 'Jogadores', 'icon' => 'users'],
                        ['route' => 'admin.coaches.index', 'label' => 'Treinadores', 'icon' => 'user-check'],
                        ['route' => 'admin.games.index', 'label' => 'Jogos', 'icon' => 'calendar'],
                        ['route' => 'admin.competitions.index', 'label' => 'Competições', 'icon' => 'trophy'],
                        ['route' => 'admin.seasons.index', 'label' => 'Temporadas', 'icon' => 'clock'],
                        ['route' => 'admin.trophies.index', 'label' => 'Títulos', 'icon' => 'award'],
                        ['route' => 'admin.gallery.index', 'label' => 'Galeria', 'icon' => 'image'],
                        ['route' => 'admin.gallery-categories.index', 'label' => 'Categorias Galeria', 'icon' => 'folder'],
                        ['route' => 'admin.news.index', 'label' => 'Notícias', 'icon' => 'newspaper'],
                        ['route' => 'admin.history-events.index', 'label' => 'História', 'icon' => 'book-open'],
                        ['route' => 'admin.social-links.index', 'label' => 'Links Sociais', 'icon' => 'link'],
                        ['route' => 'admin.settings', 'label' => 'Configurações', 'icon' => 'settings'],
                    ];
                @endphp

                @foreach($navItems as $item)
                    @php
                        $isActive = request()->routeIs(explode('.', $item['route'])[0] . '.' . explode('.', $item['route'])[1]) ||
                                    request()->routeIs($item['route']);
                    @endphp
                    <a href="{{ route($item['route']) }}"
                       class="flex items-center px-3 py-2.5 text-sm font-medium rounded-lg transition-colors duration-200
                              {{ $isActive
                                  ? 'bg-[#3b82f6] text-white'
                                  : 'text-gray-300 hover:bg-[#2a5080] hover:text-white' }}">
                        <i data-lucide="{{ $item['icon'] }}" class="w-5 h-5 mr-3"></i>
                        {{ $item['label'] }}
                    </a>
                @endforeach
            </nav>

            <!-- User info at bottom -->
            <div class="p-4 border-t border-[#2a5080]">
                <div class="flex items-center">
                    <div class="w-9 h-9 bg-[#3b82f6] rounded-full flex items-center justify-center">
                        <span class="text-white font-semibold text-sm">{{ substr(auth()->user()->name ?? 'A', 0, 1) }}</span>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium text-white">{{ auth()->user()->name ?? 'Admin' }}</p>
                        <p class="text-xs text-gray-400">{{ auth()->user()->email ?? '' }}</p>
                    </div>
                </div>
            </div>
        </aside>

        <!-- Main content -->
        <div class="flex-1 flex flex-col min-w-0">
            <!-- Top header -->
            <header class="sticky top-0 z-30 bg-white shadow-sm border-b border-gray-200">
                <div class="flex items-center justify-between h-16 px-4 sm:px-6">
                    <!-- Mobile menu button -->
                    <button @click="sidebarOpen = !sidebarOpen"
                            class="lg:hidden p-2 rounded-lg text-gray-500 hover:bg-gray-100">
                        <i data-lucide="menu" class="w-5 h-5"></i>
                    </button>

                    <!-- Page title (optional slot) -->
                    <div class="hidden lg:block">
                        <h1 class="text-lg font-semibold text-gray-900">@yield('page-title', 'Admin')</h1>
                    </div>

                    <!-- Right side -->
                    <div class="flex items-center space-x-4">
                        <!-- Notifications bell -->
                        <button class="p-2 rounded-lg text-gray-500 hover:bg-gray-100 relative">
                            <i data-lucide="bell" class="w-5 h-5"></i>
                        </button>

                        <!-- Logout -->
                        <form method="POST" action="{{ route('admin.logout') }}">
                            @csrf
                            <button type="submit" class="flex items-center space-x-2 text-sm text-gray-600 hover:text-red-600 transition-colors">
                                <i data-lucide="log-out" class="w-5 h-5"></i>
                                <span class="hidden sm:inline">Sair</span>
                            </button>
                        </form>
                    </div>
                </div>
            </header>

            <!-- Flash messages -->
            <div class="px-4 sm:px-6 pt-4">
                @if(session('success'))
                    <div class="mb-4 p-4 bg-green-50 border border-green-200 text-green-700 rounded-lg flex items-center" x-data="{ show: true }" x-show="show" x-transition>
                        <i data-lucide="check-circle" class="w-5 h-5 mr-3 text-green-500"></i>
                        <span class="flex-1">{{ session('success') }}</span>
                        <button @click="show = false" class="ml-3 text-green-500 hover:text-green-700">
                            <i data-lucide="x" class="w-4 h-4"></i>
                        </button>
                    </div>
                @endif

                @if(session('error'))
                    <div class="mb-4 p-4 bg-red-50 border border-red-200 text-red-700 rounded-lg flex items-center" x-data="{ show: true }" x-show="show" x-transition>
                        <i data-lucide="alert-circle" class="w-5 h-5 mr-3 text-red-500"></i>
                        <span class="flex-1">{{ session('error') }}</span>
                        <button @click="show = false" class="ml-3 text-red-500 hover:text-red-700">
                            <i data-lucide="x" class="w-4 h-4"></i>
                        </button>
                    </div>
                @endif
            </div>

            <!-- Page content -->
            <main class="flex-1 p-4 sm:p-6">
                @yield('content')
            </main>
        </div>
    </div>

    <script>
        lucide.createIcons();
        // Re-create icons when Alpine updates the DOM
        document.addEventListener('alpine:initialized', () => {
            const observer = new MutationObserver(() => {
                lucide.createIcons();
            });
            observer.observe(document.body, { childList: true, subtree: true });
        });
    </script>
</body>
</html>
