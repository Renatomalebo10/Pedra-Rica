<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Pedra Rica') }} - Login Admin</title>
    <script src="https://unpkg.com/lucide@latest"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gradient-to-br from-[#1e40af] to-[#1e3a5f] min-h-screen flex items-center justify-center p-4">
    <div class="w-full max-w-md">
        <!-- Logo & Title -->
        <div class="text-center mb-8">
            <div class="w-16 h-16 bg-white rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg">
                <span class="text-[#1e40af] font-bold text-2xl">PR</span>
            </div>
            <h1 class="text-2xl font-bold text-white">Pedra Rica</h1>
            <p class="text-blue-200 mt-1">Painel de Administração</p>
        </div>

        <!-- Login Card -->
        <div class="bg-white rounded-2xl shadow-xl p-8">
            <h2 class="text-xl font-semibold text-gray-900 mb-6">Entrar na conta</h2>

            @if($errors->any())
                <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-lg">
                    <div class="flex items-center">
                        <i data-lucide="alert-circle" class="w-5 h-5 text-red-500 mr-2"></i>
                        <div>
                            @foreach($errors->all() as $error)
                                <p class="text-sm text-red-600">{{ $error }}</p>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif

            <form method="POST" action="{{ route('admin.login.post') }}">
                @csrf

                <!-- Email -->
                <div class="mb-5">
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1.5">E-mail</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i data-lucide="mail" class="w-5 h-5 text-gray-400"></i>
                        </div>
                        <input type="email"
                               id="email"
                               name="email"
                               value="{{ old('email') }}"
                               required
                               autofocus
                               class="block w-full pl-10 pr-3 py-2.5 border border-gray-300 rounded-lg text-gray-900 placeholder-gray-400
                                      focus:outline-none focus:ring-2 focus:ring-[#1e40af] focus:border-[#1e40af]
                                      transition-colors"
                               placeholder="admin@pedrarica.com">
                    </div>
                    @error('email')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div class="mb-6">
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1.5">Senha</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i data-lucide="lock" class="w-5 h-5 text-gray-400"></i>
                        </div>
                        <input type="password"
                               id="password"
                               name="password"
                               required
                               class="block w-full pl-10 pr-3 py-2.5 border border-gray-300 rounded-lg text-gray-900 placeholder-gray-400
                                      focus:outline-none focus:ring-2 focus:ring-[#1e40af] focus:border-[#1e40af]
                                      transition-colors"
                               placeholder="••••••••">
                    </div>
                    @error('password')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Remember me -->
                <div class="flex items-center mb-6">
                    <input type="checkbox" name="remember" id="remember"
                           class="w-4 h-4 text-[#1e40af] border-gray-300 rounded focus:ring-[#1e40af]">
                    <label for="remember" class="ml-2 text-sm text-gray-600">Lembrar de mim</label>
                </div>

                <!-- Submit -->
                <button type="submit"
                        class="w-full bg-[#1e40af] hover:bg-[#1e3a8a] text-white font-semibold py-2.5 px-4 rounded-lg
                               transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#1e40af]">
                    Entrar
                </button>
            </form>
        </div>

        <!-- Back to site -->
        <div class="text-center mt-6">
            <a href="{{ url('/') }}" class="text-blue-200 hover:text-white text-sm transition-colors">
                ← Voltar ao site
            </a>
        </div>
    </div>

    <script>lucide.createIcons();</script>
</body>
</html>
