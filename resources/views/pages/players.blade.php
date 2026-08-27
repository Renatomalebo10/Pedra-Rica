@extends('layouts.public')

@section('title', 'Os Nossos Jogadores - Pedra Rica Oficial')

@section('content')

    {{-- Hero --}}
    <section class="bg-gradient-to-br from-[#1e40af] via-[#2563eb] to-[#3b82f6] text-white py-20 lg:py-28">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl lg:text-6xl font-extrabold tracking-tight">Os Nossos Jogadores</h1>
            <p class="mt-4 text-lg lg:text-xl text-blue-100 max-w-2xl mx-auto">Atletas que representam a Pedra Rica em campo</p>
        </div>
    </section>

    {{-- Players Grid --}}
    <section class="py-16 lg:py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            @if($players->isEmpty())
                <div class="text-center py-16">
                    <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                    <p class="text-gray-500 text-lg">Informação ainda não cadastrada.</p>
                </div>
            @else
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                    @foreach($players as $player)
                        <a href="{{ route('pages.player-detail', $player) }}"
                           class="group bg-white rounded-2xl border border-gray-100 overflow-hidden hover:shadow-lg transition-all duration-300">
                            {{-- Photo --}}
                            <div class="aspect-[3/4] bg-gray-100 relative overflow-hidden">
                                @if($player->photo)
                                    <img src="{{ asset('storage/' . $player->photo) }}"
                                         alt="{{ $player->name }}"
                                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                                @else
                                    <div class="w-full h-full flex flex-col items-center justify-center bg-gradient-to-br from-blue-50 to-white">
                                        <svg class="w-16 h-16 text-[#3b82f6]/40" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                        </svg>
                                        <span class="mt-2 text-sm font-bold text-[#3b82f6]/50">#{{ $player->number }}</span>
                                    </div>
                                @endif

                                {{-- Number badge --}}
                                <div class="absolute top-3 right-3 w-10 h-10 bg-[#1e40af] rounded-lg flex items-center justify-center shadow-md">
                                    <span class="text-white font-bold text-sm">{{ $player->number }}</span>
                                </div>
                            </div>

                            {{-- Info --}}
                            <div class="p-4">
                                <h3 class="font-bold text-[#1e40af] group-hover:text-[#2563eb] transition-colors">{{ $player->name }}</h3>
                                <p class="text-sm text-gray-500 mt-1">{{ $player->position }}</p>
                            </div>
                        </a>
                    @endforeach
                </div>
            @endif

        </div>
    </section>

@endsection
