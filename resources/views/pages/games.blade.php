@extends('layouts.public')

@section('title', 'Jogos - Pedra Rica Oficial')

@section('content')

    {{-- HERO --}}
    <section class="relative bg-gradient-to-br from-[#1e3a5f] via-[#1e40af] to-[#2563eb] text-white overflow-hidden">
        <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg%20width%3D%2260%22%20height%3D%2260%22%20viewBox%3D%220%200%2060%2060%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%3E%3Cg%20fill%3D%22none%22%20fill-rule%3D%22evenodd%22%3E%3Cg%20fill%3D%22%23ffffff%22%20fill-opacity%3D%220.03%22%3E%3Cpath%20d%3D%22M36%2034v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6%2034v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6%204V0H4v4H0v2h4v4h2V6h4V4H6z%22%2F%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E')] opacity-50"></div>
        <div class="absolute -top-24 -right-24 w-96 h-96 bg-[#3b82f6] rounded-full blur-3xl opacity-20"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 sm:py-28">
            <div class="max-w-3xl">
                <span class="inline-block text-sm font-semibold text-blue-200 uppercase tracking-widest mb-3">Desporto</span>
                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight leading-tight">Os Nossos Jogos</h1>
                <p class="mt-6 text-lg sm:text-xl text-blue-100/90 max-w-xl leading-relaxed">Acompanhe os próximos jogos e resultados da Pedra Rica.</p>
            </div>
        </div>
        <div class="absolute bottom-0 inset-x-0 h-16 bg-gradient-to-t from-white to-transparent"></div>
    </section>

    {{-- PRÓXIMOS JOGOS --}}
    <section class="py-16 sm:py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <span class="inline-block text-sm font-semibold text-[#3b82f6] uppercase tracking-widest mb-3">Próximos</span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-gray-900">Próximos Jogos</h2>
            </div>

            @if($upcomingGames->isNotEmpty())
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($upcomingGames as $game)
                        <div class="bg-gradient-to-br from-[#1e40af] to-[#2563eb] rounded-2xl p-6 text-white shadow-lg hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                            <div class="flex items-center justify-between mb-4">
                                <span class="text-xs font-semibold text-blue-200 uppercase tracking-wider">{{ $game->competition?->name ?? 'Amistoso' }}</span>
                                <span class="bg-green-400/20 text-green-300 text-xs font-bold px-3 py-1 rounded-full uppercase">Próximo</span>
                            </div>
                            <div class="flex items-center justify-between mb-6">
                                <div class="text-center flex-1">
                                    <div class="w-14 h-14 bg-white/20 rounded-xl flex items-center justify-center mb-2 mx-auto">
                                        <span class="text-lg font-extrabold">PR</span>
                                    </div>
                                    <span class="text-sm font-semibold">Pedra Rica</span>
                                </div>
                                <span class="text-lg font-bold text-blue-200 mx-3">VS</span>
                                <div class="text-center flex-1">
                                    <div class="w-14 h-14 bg-white/20 rounded-xl flex items-center justify-center mb-2 mx-auto">
                                        @if($game->opponent_logo)
                                            <img src="{{ asset('storage/' . $game->opponent_logo) }}" alt="{{ $game->opponent }}" class="w-8 h-8 object-contain">
                                        @else
                                            <span class="text-sm font-bold">{{ strtoupper(substr($game->opponent, 0, 2)) }}</span>
                                        @endif
                                    </div>
                                    <span class="text-sm font-semibold">{{ $game->opponent }}</span>
                                </div>
                            </div>
                            <div class="flex items-center justify-center gap-4 text-sm text-blue-100 border-t border-white/20 pt-4">
                                <div class="flex items-center gap-1.5">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                    <span>{{ $game->match_date->format('d/m/Y') }}</span>
                                </div>
                                @if($game->match_time)
                                    <div class="flex items-center gap-1.5">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                        <span>{{ $game->match_time }}</span>
                                    </div>
                                @endif
                                @if($game->location)
                                    <div class="flex items-center gap-1.5">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                        <span>{{ $game->location }}</span>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-12 bg-gray-50 rounded-2xl">
                    <svg class="w-12 h-12 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    <p class="text-gray-500">Informação ainda não cadastrada.</p>
                </div>
            @endif
        </div>
    </section>

    {{-- RESULTADOS --}}
    <section class="py-16 sm:py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <span class="inline-block text-sm font-semibold text-[#3b82f6] uppercase tracking-widest mb-3">Resultados</span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-gray-900">Resultados</h2>
            </div>

            @if($playedGames->isNotEmpty())
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($playedGames as $game)
                        <div class="bg-white rounded-2xl p-6 border border-gray-100 hover:shadow-lg hover:-translate-y-1 transition-all duration-300">
                            <div class="flex items-center justify-between mb-4">
                                <span class="text-xs font-semibold text-gray-400 uppercase tracking-wider">{{ $game->competition?->name ?? 'Amistoso' }}</span>
                                <time class="text-xs text-gray-400">{{ $game->match_date->format('d/m/Y') }}</time>
                            </div>
                            <div class="flex items-center justify-between">
                                <div class="text-center flex-1">
                                    <div class="w-14 h-14 bg-blue-100 rounded-xl flex items-center justify-center mb-2 mx-auto">
                                        <span class="text-lg font-extrabold text-[#1e40af]">PR</span>
                                    </div>
                                    <span class="text-sm font-semibold text-gray-700">Pedra Rica</span>
                                </div>
                                <div class="text-center mx-4">
                                    <div class="text-2xl font-extrabold text-gray-900">{{ $game->our_score }} <span class="text-gray-400">x</span> {{ $game->opponent_score }}</div>
                                    <span class="text-xs font-semibold
                                        {{ $game->our_score > $game->opponent_score ? 'text-green-600' : ($game->our_score < $game->opponent_score ? 'text-red-500' : 'text-gray-400') }}">
                                        {{ $game->our_score > $game->opponent_score ? 'Vitória' : ($game->our_score < $game->opponent_score ? 'Derrota' : 'Empate') }}
                                    </span>
                                </div>
                                <div class="text-center flex-1">
                                    <div class="w-14 h-14 bg-gray-100 rounded-xl flex items-center justify-center mb-2 mx-auto">
                                        @if($game->opponent_logo)
                                            <img src="{{ asset('storage/' . $game->opponent_logo) }}" alt="{{ $game->opponent }}" class="w-8 h-8 object-contain">
                                        @else
                                            <span class="text-sm font-bold text-gray-500">{{ strtoupper(substr($game->opponent, 0, 2)) }}</span>
                                        @endif
                                    </div>
                                    <span class="text-sm font-semibold text-gray-700">{{ $game->opponent }}</span>
                                </div>
                            </div>
                            @if($game->location)
                                <div class="flex items-center justify-center gap-1.5 mt-4 pt-4 border-t border-gray-100 text-xs text-gray-400">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                    <span>{{ $game->location }}</span>
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-12 bg-white rounded-2xl">
                    <svg class="w-12 h-12 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                    <p class="text-gray-500">Informação ainda não cadastrada.</p>
                </div>
            @endif
        </div>
    </section>

@endsection
