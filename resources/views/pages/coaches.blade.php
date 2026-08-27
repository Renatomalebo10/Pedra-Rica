@extends('layouts.public')

@section('title', 'De Jogadores a Treinadores - Pedra Rica Oficial')

@section('content')

    {{-- Hero --}}
    <section class="bg-gradient-to-br from-[#1e40af] via-[#2563eb] to-[#3b82f6] text-white py-20 lg:py-28">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl lg:text-6xl font-extrabold tracking-tight">De Jogadores a Treinadores</h1>
            <p class="mt-4 text-lg lg:text-xl text-blue-100 max-w-2xl mx-auto">
                Quem um dia foi formado pelo projecto, hoje ajuda a formar a próxima geração.
            </p>
        </div>
    </section>

    {{-- Coaches Grid --}}
    <section class="py-16 lg:py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            @if($coaches->isEmpty())
                <div class="text-center py-16">
                    <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                    </svg>
                    <p class="text-gray-500 text-lg">Informação ainda não cadastrada.</p>
                </div>
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">
                    @foreach($coaches as $coach)
                        <div class="bg-white rounded-2xl border border-gray-100 overflow-hidden hover:shadow-lg transition-shadow">
                            {{-- Photo --}}
                            <div class="aspect-[4/3] bg-gray-100 relative overflow-hidden">
                                @if($coach->photo)
                                    <img src="{{ asset('storage/' . $coach->photo) }}"
                                         alt="{{ $coach->name }}"
                                         class="w-full h-full object-cover">
                                @else
                                    <div class="w-full h-full flex flex-col items-center justify-center bg-gradient-to-br from-blue-50 to-white">
                                        <svg class="w-20 h-20 text-[#3b82f6]/40" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                        </svg>
                                    </div>
                                @endif

                                {{-- Role badge --}}
                                @if($coach->role)
                                    <div class="absolute top-3 left-3 bg-[#1e40af] text-white text-xs font-semibold px-3 py-1 rounded-full">
                                        {{ $coach->role }}
                                    </div>
                                @endif
                            </div>

                            {{-- Info --}}
                            <div class="p-6">
                                <h3 class="text-xl font-bold text-[#1e40af]">{{ $coach->name }}</h3>
                                @if($coach->year_joined)
                                    <p class="mt-1 text-sm text-gray-500">Desde {{ $coach->year_joined }}</p>
                                @endif

                                @if($coach->biography)
                                    <p class="mt-3 text-gray-600 text-sm leading-relaxed line-clamp-3">{{ $coach->biography }}</p>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

        </div>
    </section>

@endsection
