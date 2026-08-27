@extends('layouts.public')

@section('title', $player->name . ' - Pedra Rica Oficial')

@section('content')

    {{-- Hero --}}
    <section class="bg-gradient-to-br from-[#1e40af] via-[#2563eb] to-[#3b82f6] text-white py-20 lg:py-28">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl lg:text-6xl font-extrabold tracking-tight">{{ $player->name }}</h1>
            @if($player->season)
                <p class="mt-4 text-lg text-blue-100">Temporada {{ $player->season->name }}</p>
            @endif
        </div>
    </section>

    {{-- Player Detail --}}
    <section class="py-16 lg:py-24 bg-white">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- Back button --}}
            <a href="{{ route('pages.players') }}" class="inline-flex items-center text-sm font-medium text-[#3b82f6] hover:text-[#1e40af] transition-colors mb-8">
                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
                Voltar aos jogadores
            </a>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 lg:gap-12">

                {{-- Photo & Info --}}
                <div class="lg:col-span-1">
                    <div class="aspect-[3/4] bg-gray-100 rounded-2xl overflow-hidden">
                        @if($player->photo)
                            <img src="{{ asset('storage/' . $player->photo) }}"
                                 alt="{{ $player->name }}"
                                 class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full flex flex-col items-center justify-center bg-gradient-to-br from-blue-50 to-white">
                                <svg class="w-24 h-24 text-[#3b82f6]/40" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                            </div>
                        @endif
                    </div>

                    <div class="mt-6 text-center lg:text-left">
                        <div class="inline-flex items-center gap-2 bg-[#1e40af] text-white px-4 py-2 rounded-xl">
                            <span class="text-sm font-medium">Número</span>
                            <span class="text-xl font-extrabold">{{ $player->number }}</span>
                        </div>
                    </div>

                    <div class="mt-4">
                        <span class="inline-block bg-blue-50 text-[#2563eb] text-sm font-semibold px-4 py-1.5 rounded-full">{{ $player->position }}</span>
                    </div>
                </div>

                {{-- Details --}}
                <div class="lg:col-span-2">

                    {{-- Biography --}}
                    @if($player->biography)
                        <div class="bg-gray-50 rounded-2xl p-6 lg:p-8 border border-gray-100">
                            <h2 class="text-2xl font-bold text-[#1e40af]">Biografia</h2>
                            <div class="w-12 h-1 bg-[#3b82f6] mt-3 rounded-full"></div>
                            <p class="mt-4 text-gray-600 leading-relaxed">{{ $player->biography }}</p>
                        </div>
                    @endif

                    {{-- Stats --}}
                    <div class="mt-8">
                        <h2 class="text-2xl font-bold text-[#1e40af]">Estatísticas</h2>
                        <div class="w-12 h-1 bg-[#3b82f6] mt-3 rounded-full"></div>

                        <div class="mt-6 grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-4">
                            <div class="bg-white rounded-xl p-5 text-center border border-gray-100 shadow-sm">
                                <span class="block text-3xl font-extrabold text-[#1e40af]">{{ $player->goals ?? 0 }}</span>
                                <span class="mt-1 block text-xs font-semibold text-gray-500 uppercase tracking-wider">Golos</span>
                            </div>
                            <div class="bg-white rounded-xl p-5 text-center border border-gray-100 shadow-sm">
                                <span class="block text-3xl font-extrabold text-[#1e40af]">{{ $player->assists ?? 0 }}</span>
                                <span class="mt-1 block text-xs font-semibold text-gray-500 uppercase tracking-wider">Assistências</span>
                            </div>
                            <div class="bg-white rounded-xl p-5 text-center border border-gray-100 shadow-sm">
                                <span class="block text-3xl font-extrabold text-yellow-500">{{ $player->yellow_cards ?? 0 }}</span>
                                <span class="mt-1 block text-xs font-semibold text-gray-500 uppercase tracking-wider">Cartões Amarelos</span>
                            </div>
                            <div class="bg-white rounded-xl p-5 text-center border border-gray-100 shadow-sm">
                                <span class="block text-3xl font-extrabold text-red-500">{{ $player->red_cards ?? 0 }}</span>
                                <span class="mt-1 block text-xs font-semibold text-gray-500 uppercase tracking-wider">Cartões Vermelhos</span>
                            </div>
                            <div class="bg-white rounded-xl p-5 text-center border border-gray-100 shadow-sm col-span-2 sm:col-span-3 lg:col-span-1">
                                <span class="block text-3xl font-extrabold text-[#3b82f6]">{{ $player->matches_played ?? 0 }}</span>
                                <span class="mt-1 block text-xs font-semibold text-gray-500 uppercase tracking-wider">Jogos</span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

@endsection
