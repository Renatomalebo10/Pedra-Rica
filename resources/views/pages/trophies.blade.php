@extends('layouts.public')

@section('title', 'Títulos e Conquistas - Pedra Rica Oficial')

@section('content')

    {{-- HERO --}}
    <section class="relative bg-gradient-to-br from-[#1e3a5f] via-[#1e40af] to-[#2563eb] text-white overflow-hidden">
        <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg%20width%3D%2260%22%20height%3D%2260%22%20viewBox%3D%220%200%2060%2060%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%3E%3Cg%20fill%3D%22none%22%20fill-rule%3D%22evenodd%22%3E%3Cg%20fill%3D%22%23ffffff%22%20fill-opacity%3D%220.03%22%3E%3Cpath%20d%3D%22M36%2034v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6%2034v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6%204V0H4v4H0v2h4v4h2V6h4V4H6z%22%2F%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E')] opacity-50"></div>
        <div class="absolute -top-24 -right-24 w-96 h-96 bg-[#3b82f6] rounded-full blur-3xl opacity-20"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 sm:py-28">
            <div class="max-w-3xl">
                <span class="inline-block text-sm font-semibold text-blue-200 uppercase tracking-widest mb-3">Palmarés</span>
                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight leading-tight">Títulos e Conquistas</h1>
                <p class="mt-6 text-lg sm:text-xl text-blue-100/90 max-w-xl leading-relaxed">O palmarés da Pedra Rica ao longo dos anos.</p>
            </div>
        </div>
        <div class="absolute bottom-0 inset-x-0 h-16 bg-gradient-to-t from-white to-transparent"></div>
    </section>

    {{-- TROPHIES --}}
    <section class="py-16 sm:py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @if($trophies->isNotEmpty())
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($trophies as $trophy)
                        <div class="group bg-gray-50 rounded-2xl overflow-hidden border border-gray-100 hover:shadow-lg hover:-translate-y-1 transition-all duration-300">
                            @if($trophy->photo)
                                <div class="aspect-video overflow-hidden bg-blue-100">
                                    <img src="{{ asset('storage/' . $trophy->photo) }}" alt="{{ $trophy->name }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                </div>
                            @else
                                <div class="aspect-video bg-gradient-to-br from-yellow-100 to-yellow-50 flex items-center justify-center">
                                    <svg class="w-16 h-16 text-yellow-400" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                                </div>
                            @endif
                            <div class="p-6">
                                <div class="flex items-start gap-3">
                                    <div class="w-10 h-10 bg-yellow-100 rounded-lg flex items-center justify-center shrink-0 mt-0.5">
                                        <svg class="w-5 h-5 text-yellow-600" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                                    </div>
                                    <div>
                                        <h3 class="font-semibold text-gray-900 group-hover:text-[#1e40af] transition-colors">{{ $trophy->name }}</h3>
                                        <p class="text-sm text-gray-500 mt-1">{{ $trophy->competition ?? 'Competição' }}</p>
                                        <div class="flex items-center gap-3 mt-2 text-xs text-gray-400">
                                            <span>{{ $trophy->year }}</span>
                                            @if($trophy->season)
                                                <span>· {{ $trophy->season->name }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                @if($trophy->description)
                                    <p class="text-sm text-gray-500 mt-3 leading-relaxed">{{ $trophy->description }}</p>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-12 bg-gray-50 rounded-2xl">
                    <svg class="w-12 h-12 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                    <p class="text-gray-500">Informação ainda não cadastrada.</p>
                </div>
            @endif
        </div>
    </section>

@endsection
