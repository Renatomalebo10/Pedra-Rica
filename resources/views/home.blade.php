@extends('layouts.public')

@section('title', 'Pedra Rica OfICIAL - Desporto. Educação. Fé. Transformação.')
@section('description', 'Pedra Rica - Um projeto social que transforma vidas de crianças e adolescentes através do desporto, educação e fé desde 2009.')
@section('og:title', 'Pedra Rica OfICIAL')
@section('og:description', 'Desporto. Educação. Fé. Transformação.')

@section('content')

    {{-- HERO --}}
    <section class="relative bg-gradient-to-br from-[#1e3a5f] via-[#1e40af] to-[#2563eb] text-white overflow-hidden">
        <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg%20width%3D%2260%22%20height%3D%2260%22%20viewBox%3D%220%200%2060%2060%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%3E%3Cg%20fill%3D%22none%22%20fill-rule%3D%22evenodd%22%3E%3Cg%20fill%3D%22%23ffffff%22%20fill-opacity%3D%220.03%22%3E%3Cpath%20d%3D%22M36%2034v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6%2034v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6%204V0H4v4H0v2h4v4h2V6h4V4H6z%22%2F%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E')] opacity-50"></div>
        <div class="absolute -top-24 -right-24 w-96 h-96 bg-[#3b82f6] rounded-full blur-3xl opacity-20"></div>
        <div class="absolute -bottom-32 -left-32 w-80 h-80 bg-white rounded-full blur-3xl opacity-5"></div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 sm:py-32 lg:py-40">
            <div class="max-w-3xl">
                <div class="inline-flex items-center gap-2 bg-white/10 backdrop-blur-sm border border-white/20 rounded-full px-4 py-1.5 mb-8">
                    <span class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></span>
                    <span class="text-sm font-medium text-blue-100">Projeto ativo desde 2009</span>
                </div>

                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight leading-tight mb-6">
                    PEDRA RICA<br>
                    <span class="text-blue-200">OFICIAL</span>
                </h1>

                <p class="text-lg sm:text-xl text-blue-100/90 mb-10 max-w-xl leading-relaxed">
                    Desporto. Educação. Fé. Transformação.
                </p>

                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="{{ route('pages.about') }}" class="inline-flex items-center justify-center px-8 py-3.5 bg-white text-[#1e40af] font-semibold rounded-xl hover:bg-blue-50 transition-all duration-200 shadow-lg hover:shadow-xl hover:-translate-y-0.5">
                        Conheça a nossa história
                        <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </a>
                    <a href="{{ route('pages.impact') }}" class="inline-flex items-center justify-center px-8 py-3.5 border-2 border-white/40 text-white font-semibold rounded-xl hover:bg-white/10 hover:border-white/60 transition-all duration-200">
                        Conheça o projeto
                    </a>
                </div>
            </div>
        </div>

        <div class="absolute bottom-0 inset-x-0 h-16 bg-gradient-to-t from-white to-transparent"></div>
    </section>

    {{-- STATS BAR --}}
    <section class="relative -mt-8 z-10 max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-2xl shadow-xl border border-gray-100 p-6 sm:p-8">
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-6 sm:gap-8">
                <div class="text-center">
                    <div class="text-3xl sm:text-4xl font-extrabold text-[#1e40af] mb-1">+100</div>
                    <div class="text-sm text-gray-500 font-medium">Crianças e adolescentes</div>
                </div>
                <div class="text-center border-l border-gray-100">
                    <div class="text-3xl sm:text-4xl font-extrabold text-[#1e40af] mb-1">2009</div>
                    <div class="text-sm text-gray-500 font-medium">Fundação oficial</div>
                </div>
                <div class="text-center border-l border-gray-100">
                    <div class="text-3xl sm:text-4xl font-extrabold text-[#1e40af] mb-1">{{ $coaches->count() }}</div>
                    <div class="text-sm text-gray-500 font-medium">Treinadores</div>
                </div>
                <div class="text-center border-l border-gray-100">
                    <div class="text-3xl sm:text-4xl font-extrabold text-[#1e40af] mb-1">1</div>
                    <div class="text-sm text-gray-500 font-medium">Grande missão</div>
                </div>
            </div>
        </div>
    </section>

    {{-- PRÓXIMO JOGO --}}
    @if($upcomingMatches->isNotEmpty())
    <section class="py-16 sm:py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <span class="inline-block text-sm font-semibold text-[#3b82f6] uppercase tracking-widest mb-3">Competição</span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-gray-900">Próximo Jogo</h2>
            </div>

            <div class="max-w-2xl mx-auto">
                @php $match = $upcomingMatches->first(); @endphp
                <div class="bg-gradient-to-br from-[#1e40af] to-[#2563eb] rounded-2xl p-8 text-white shadow-xl">
                    <div class="flex items-center justify-between mb-6">
                        <span class="text-sm font-semibold text-blue-200 uppercase tracking-wider">{{ $match->competition?->name ?? 'Amistoso' }}</span>
                        <span class="bg-green-400/20 text-green-300 text-xs font-bold px-3 py-1 rounded-full uppercase">Próximo</span>
                    </div>
                    <div class="flex items-center justify-between mb-6">
                        <div class="text-center">
                            <div class="w-16 h-16 bg-white/20 rounded-xl flex items-center justify-center mb-2 mx-auto">
                                <span class="text-2xl font-extrabold">PR</span>
                            </div>
                            <span class="text-sm font-semibold">Pedra Rica</span>
                        </div>
                        <span class="text-lg font-bold text-blue-200">VS</span>
                        <div class="text-center">
                            <div class="w-16 h-16 bg-white/20 rounded-xl flex items-center justify-center mb-2 mx-auto">
                                @if($match->opponent_logo)
                                    <img src="{{ asset('storage/' . $match->opponent_logo) }}" alt="{{ $match->opponent }}" class="w-10 h-10 object-contain">
                                @else
                                    <span class="text-lg font-bold">{{ strtoupper(substr($match->opponent, 0, 2)) }}</span>
                                @endif
                            </div>
                            <span class="text-sm font-semibold">{{ $match->opponent }}</span>
                        </div>
                    </div>
                    <div class="flex items-center justify-center gap-6 text-sm text-blue-100">
                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            <span>{{ $match->match_date->format('d/m/Y') }}</span>
                        </div>
                        @if($match->match_time)
                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            <span>{{ $match->match_time }}</span>
                        </div>
                        @endif
                        @if($match->location)
                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            <span>{{ $match->location }}</span>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif

    {{-- MISSÃO --}}
    <section class="py-16 sm:py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-4xl mx-auto text-center">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-blue-100 rounded-2xl mb-8">
                    <svg class="w-8 h-8 text-[#1e40af]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/></svg>
                </div>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-gray-900 mb-6">A Nossa Missão</h2>
                <p class="text-lg text-gray-600 leading-relaxed max-w-2xl mx-auto">
                    {{ $settings['mission'] ?? 'Transformar a vida de crianças e adolescentes através do desporto, educação e fé, oferecendo oportunidades reais de desenvolvimento pessoal e social.' }}
                </p>
            </div>
        </div>
    </section>

    {{-- HISTÓRIA RESUMO --}}
    <section class="py-16 sm:py-20 bg-gradient-to-br from-[#1e3a5f] to-[#1e40af] text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div>
                    <span class="inline-block text-sm font-semibold text-blue-200 uppercase tracking-widest mb-3">Desde 2009</span>
                    <h2 class="text-3xl sm:text-4xl font-extrabold mb-6">A Nossa História</h2>
                    <p class="text-blue-100/90 leading-relaxed mb-8">
                        {{ $settings['history_summary'] ?? 'A Pedra Rica nasceu do sonho de transformar vidas através do desporto. Desde a sua fundação em 2009, o projeto tem acolhido crianças e adolescentes, oferecendo-lhes não apenas treino desportivo, mas também educação, fé e esperança para um futuro melhor.' }}
                    </p>
                    <a href="{{ route('pages.timeline') }}" class="inline-flex items-center px-6 py-3 bg-white text-[#1e40af] font-semibold rounded-xl hover:bg-blue-50 transition-all duration-200 shadow-lg hover:shadow-xl hover:-translate-y-0.5">
                        Conheça a nossa história completa
                        <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </a>
                </div>
                <div class="relative">
                    <div class="aspect-[4/3] bg-white/10 rounded-2xl backdrop-blur-sm border border-white/20 flex items-center justify-center">
                        <div class="text-center">
                            <svg class="w-16 h-16 text-white/30 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                            <span class="text-sm text-white/40">A nossa história</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- JOGADORES --}}
    <section class="py-16 sm:py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <span class="inline-block text-sm font-semibold text-[#3b82f6] uppercase tracking-widest mb-3">Equipa</span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-gray-900">Os Nossos Jogadores</h2>
            </div>

            @if($players->isNotEmpty())
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    @foreach($players as $player)
                        <div class="group bg-gray-50 rounded-2xl p-6 text-center hover:shadow-lg hover:-translate-y-1 transition-all duration-300 border border-gray-100">
                            <div class="w-24 h-24 mx-auto mb-4 rounded-full overflow-hidden bg-blue-100 flex items-center justify-center">
                                @if($player->photo)
                                    <img src="{{ asset('storage/' . $player->photo) }}" alt="{{ $player->name }}" class="w-full h-full object-cover">
                                @else
                                    <span class="text-2xl font-bold text-[#1e40af]">{{ strtoupper(substr($player->name, 0, 2)) }}</span>
                                @endif
                            </div>
                            <h3 class="font-semibold text-gray-900 group-hover:text-[#1e40af] transition-colors">{{ $player->name }}</h3>
                            <p class="text-sm text-gray-500 mt-1">{{ $player->position ?? 'Jogador' }}</p>
                            @if($player->number)
                                <span class="inline-block mt-2 text-xs font-bold text-[#3b82f6] bg-blue-50 px-2.5 py-1 rounded-full">#{{ $player->number }}</span>
                            @endif
                        </div>
                    @endforeach
                </div>

                <div class="text-center mt-10">
                    <a href="{{ route('pages.players') }}" class="inline-flex items-center px-6 py-3 border-2 border-[#1e40af] text-[#1e40af] font-semibold rounded-xl hover:bg-[#1e40af] hover:text-white transition-all duration-200">
                        Ver todos
                        <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </a>
                </div>
            @else
                <div class="text-center py-12 bg-gray-50 rounded-2xl">
                    <svg class="w-12 h-12 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    <p class="text-gray-500">Informação ainda não cadastrada.</p>
                </div>
            @endif
        </div>
    </section>

    {{-- TREINADORES --}}
    <section class="py-16 sm:py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <span class="inline-block text-sm font-semibold text-[#3b82f6] uppercase tracking-widest mb-3">Formação</span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-gray-900 mb-4">De Jogadores a Treinadores</h2>
                <p class="text-lg text-gray-500 max-w-2xl mx-auto">Quem um dia foi formado pelo projeto, hoje ajuda a formar a próxima geração.</p>
            </div>

            @if($coaches->isNotEmpty())
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    @foreach($coaches as $coach)
                        <div class="group bg-white rounded-2xl p-6 text-center hover:shadow-lg hover:-translate-y-1 transition-all duration-300 border border-gray-100">
                            <div class="w-24 h-24 mx-auto mb-4 rounded-full overflow-hidden bg-[#1e40af] flex items-center justify-center">
                                @if($coach->photo)
                                    <img src="{{ asset('storage/' . $coach->photo) }}" alt="{{ $coach->name }}" class="w-full h-full object-cover">
                                @else
                                    <span class="text-2xl font-bold text-white">{{ strtoupper(substr($coach->name, 0, 2)) }}</span>
                                @endif
                            </div>
                            <h3 class="font-semibold text-gray-900 group-hover:text-[#1e40af] transition-colors">{{ $coach->name }}</h3>
                            <p class="text-sm text-gray-500 mt-1">{{ $coach->role ?? 'Treinador' }}</p>
                        </div>
                    @endforeach
                </div>

                <div class="text-center mt-10">
                    <a href="{{ route('pages.coaches') }}" class="inline-flex items-center px-6 py-3 border-2 border-[#1e40af] text-[#1e40af] font-semibold rounded-xl hover:bg-[#1e40af] hover:text-white transition-all duration-200">
                        Ver todos
                        <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </a>
                </div>
            @else
                <div class="text-center py-12 bg-white rounded-2xl">
                    <svg class="w-12 h-12 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                    <p class="text-gray-500">Informação ainda não cadastrada.</p>
                </div>
            @endif
        </div>
    </section>

    {{-- CONQUISTAS --}}
    <section class="py-16 sm:py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <span class="inline-block text-sm font-semibold text-[#3b82f6] uppercase tracking-widest mb-3">Palmarés</span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-gray-900">As Nossas Conquistas</h2>
            </div>

            @if($trophies->isNotEmpty())
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($trophies as $trophy)
                        <div class="group relative bg-gradient-to-br from-gray-50 to-white rounded-2xl p-6 border border-gray-100 hover:shadow-lg hover:-translate-y-1 transition-all duration-300">
                            <div class="flex items-start gap-4">
                                <div class="w-12 h-12 bg-yellow-100 rounded-xl flex items-center justify-center shrink-0">
                                    <svg class="w-6 h-6 text-yellow-600" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                                </div>
                                <div class="min-w-0">
                                    <h3 class="font-semibold text-gray-900 group-hover:text-[#1e40af] transition-colors">{{ $trophy->name }}</h3>
                                    <p class="text-sm text-gray-500 mt-1">{{ $trophy->competition ?? 'Competição' }} · {{ $trophy->year }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="text-center mt-10">
                    <a href="{{ route('pages.trophies') }}" class="inline-flex items-center px-6 py-3 border-2 border-[#1e40af] text-[#1e40af] font-semibold rounded-xl hover:bg-[#1e40af] hover:text-white transition-all duration-200">
                        Ver todos
                        <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </a>
                </div>
            @else
                <div class="text-center py-12 bg-gray-50 rounded-2xl">
                    <svg class="w-12 h-12 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                    <p class="text-gray-500">Informação ainda não cadastrada.</p>
                </div>
            @endif
        </div>
    </section>

    {{-- GALERIA --}}
    <section class="py-16 sm:py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <span class="inline-block text-sm font-semibold text-[#3b82f6] uppercase tracking-widest mb-3">Momentos</span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-gray-900">Galeria</h2>
            </div>

            @if($galleryImages->isNotEmpty())
                <div class="columns-1 sm:columns-2 lg:columns-3 gap-4 space-y-4">
                    @foreach($galleryImages as $image)
                        <div class="break-inside-avoid group relative overflow-hidden rounded-2xl bg-gray-200">
                            @if($image->image_path)
                                <img src="{{ asset('storage/' . $image->image_path) }}" alt="{{ $image->alt_text ?? $image->title }}" class="w-full object-cover group-hover:scale-105 transition-transform duration-500">
                            @else
                                <div class="aspect-video flex items-center justify-center bg-blue-100">
                                    <svg class="w-10 h-10 text-blue-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                </div>
                            @endif
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-4">
                                <p class="text-sm font-medium text-white">{{ $image->title }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="text-center mt-10">
                    <a href="{{ route('pages.gallery') }}" class="inline-flex items-center px-6 py-3 border-2 border-[#1e40af] text-[#1e40af] font-semibold rounded-xl hover:bg-[#1e40af] hover:text-white transition-all duration-200">
                        Ver toda a galeria
                        <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </a>
                </div>
            @else
                <div class="text-center py-12 bg-white rounded-2xl">
                    <svg class="w-12 h-12 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    <p class="text-gray-500">Informação ainda não cadastrada.</p>
                </div>
            @endif
        </div>
    </section>

    {{-- NOTÍCIAS --}}
    <section class="py-16 sm:py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <span class="inline-block text-sm font-semibold text-[#3b82f6] uppercase tracking-widest mb-3">Novidades</span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-gray-900">Últimas Notícias</h2>
            </div>

            @if($latestNews->isNotEmpty())
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    @foreach($latestNews as $article)
                        <article class="group bg-gray-50 rounded-2xl overflow-hidden border border-gray-100 hover:shadow-lg hover:-translate-y-1 transition-all duration-300">
                            <div class="aspect-video bg-blue-100 overflow-hidden">
                                @if($article->image)
                                    <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                @else
                                    <div class="w-full h-full flex items-center justify-center">
                                        <svg class="w-10 h-10 text-blue-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
                                    </div>
                                @endif
                            </div>
                            <div class="p-6">
                                <time class="text-xs font-medium text-gray-400 uppercase tracking-wider">{{ $article->published_at?->format('d/m/Y') }}</time>
                                <h3 class="font-semibold text-gray-900 mt-2 mb-3 group-hover:text-[#1e40af] transition-colors line-clamp-2">{{ $article->title }}</h3>
                                <p class="text-sm text-gray-500 line-clamp-2">{{ Str::limit(strip_tags($article->content), 120) }}</p>
                            </div>
                        </article>
                    @endforeach
                </div>

                <div class="text-center mt-10">
                    <a href="{{ route('pages.news') }}" class="inline-flex items-center px-6 py-3 border-2 border-[#1e40af] text-[#1e40af] font-semibold rounded-xl hover:bg-[#1e40af] hover:text-white transition-all duration-200">
                        Ver todas as notícias
                        <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </a>
                </div>
            @else
                <div class="text-center py-12 bg-gray-50 rounded-2xl">
                    <svg class="w-12 h-12 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
                    <p class="text-gray-500">Informação ainda não cadastrada.</p>
                </div>
            @endif
        </div>
    </section>

    {{-- FÉ E SERVIÇO --}}
    <section class="py-16 sm:py-20 bg-gradient-to-br from-[#1e40af] to-[#2563eb] text-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <svg class="w-12 h-12 text-blue-200 mx-auto mb-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/></svg>
            <h2 class="text-3xl sm:text-4xl font-extrabold mb-8">Fé que Move o Projeto</h2>
            <blockquote class="text-xl sm:text-2xl text-blue-100/90 italic leading-relaxed max-w-3xl mx-auto mb-8">
                "{{ $settings['founder_quote'] ?? 'Esse projeto existe para me lembrar que o poder de Deus está em todo lado e é só deixar Deus trabalhar.' }}"
            </blockquote>
            <div class="w-16 h-1 bg-blue-300/40 rounded-full mx-auto"></div>
        </div>
    </section>

    {{-- FUNDADOR --}}
    <section class="py-16 sm:py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div class="order-2 lg:order-1">
                    <div class="aspect-square max-w-md mx-auto bg-gradient-to-br from-[#1e40af] to-[#2563eb] rounded-2xl flex items-center justify-center shadow-xl">
                        <div class="text-center text-white">
                            <div class="w-24 h-24 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-4">
                                <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                            </div>
                            <span class="text-lg font-semibold">O Fundador</span>
                        </div>
                    </div>
                </div>
                <div class="order-1 lg:order-2">
                    <span class="inline-block text-sm font-semibold text-[#3b82f6] uppercase tracking-widest mb-3">Liderança</span>
                    <h2 class="text-3xl sm:text-4xl font-extrabold text-gray-900 mb-6">O Fundador</h2>
                    <p class="text-lg text-gray-600 leading-relaxed mb-4">
                        {{ $settings['founder_name'] ?? 'O fundador da Pedra Rica' }}
                    </p>
                    <p class="text-gray-500 leading-relaxed mb-8">
                        {{ $settings['founder_bio'] ?? 'Com visão e dedicação, fundou a Pedra Rica com o propósito de transformar vidas de crianças e adolescentes através do desporto, educação e fé. O seu compromisso inabalável continua a ser a força motriz do projeto.' }}
                    </p>
                    <a href="{{ route('pages.founder') }}" class="inline-flex items-center px-6 py-3 bg-[#1e40af] text-white font-semibold rounded-xl hover:bg-[#2563eb] transition-all duration-200 shadow-lg hover:shadow-xl hover:-translate-y-0.5">
                        Conheça a história do fundador
                        <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- CRIADOR DO WEBSITE --}}
    <section class="py-12 bg-white border-t border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <p class="text-sm text-gray-400">
                Website desenvolvido por
                <span class="font-semibold text-gray-600">{{ $settings['developer_name'] ?? 'Pedra Rica Tech' }}</span>
            </p>
            @if($settings['developer_url'] ?? null)
                <a href="{{ $settings['developer_url'] }}" target="_blank" rel="noopener noreferrer" class="text-sm text-[#3b82f6] hover:text-[#1e40af] font-medium mt-1 inline-block">
                    Saiba mais
                </a>
            @endif
        </div>
    </section>

@endsection
