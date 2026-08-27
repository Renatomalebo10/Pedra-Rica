@extends('layouts.public')

@section('title', 'Competições - Pedra Rica Oficial')

@section('content')

    {{-- HERO --}}
    <section class="relative bg-gradient-to-br from-[#1e3a5f] via-[#1e40af] to-[#2563eb] text-white overflow-hidden">
        <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg%20width%3D%2260%22%20height%3D%2260%22%20viewBox%3D%220%200%2060%2060%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%3E%3Cg%20fill%3D%22none%22%20fill-rule%3D%22evenodd%22%3E%3Cg%20fill%3D%22%23ffffff%22%20fill-opacity%3D%220.03%22%3E%3Cpath%20d%3D%22M36%2034v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6%2034v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6%204V0H4v4H0v2h4v4h2V6h4V4H6z%22%2F%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E')] opacity-50"></div>
        <div class="absolute -top-24 -right-24 w-96 h-96 bg-[#3b82f6] rounded-full blur-3xl opacity-20"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 sm:py-28">
            <div class="max-w-3xl">
                <span class="inline-block text-sm font-semibold text-blue-200 uppercase tracking-widest mb-3">Desporto</span>
                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight leading-tight">Competições</h1>
                <p class="mt-6 text-lg sm:text-xl text-blue-100/90 max-w-xl leading-relaxed">As competições em que a Pedra Rica participa.</p>
            </div>
        </div>
        <div class="absolute bottom-0 inset-x-0 h-16 bg-gradient-to-t from-white to-transparent"></div>
    </section>

    {{-- COMPETIÇÕES --}}
    <section class="py-16 sm:py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @if($competitions->isNotEmpty())
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($competitions as $competition)
                        <div class="group bg-gray-50 rounded-2xl p-6 border border-gray-100 hover:shadow-lg hover:-translate-y-1 transition-all duration-300">
                            <div class="w-12 h-12 bg-[#1e40af] rounded-xl flex items-center justify-center mb-4">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                            </div>
                            <h3 class="text-lg font-semibold text-gray-900 group-hover:text-[#1e40af] transition-colors mb-2">{{ $competition->name }}</h3>
                            @if($competition->description)
                                <p class="text-sm text-gray-500 leading-relaxed mb-4">{{ $competition->description }}</p>
                            @endif
                            <div class="flex items-center gap-2 text-sm text-[#3b82f6] font-medium">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                                <span>{{ $competition->games()->count() }} {{ Str::plural('jogo', $competition->games()->count()) }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-12 bg-gray-50 rounded-2xl">
                    <svg class="w-12 h-12 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                    <p class="text-gray-500">Informação ainda não cadastrada.</p>
                </div>
            @endif
        </div>
    </section>

@endsection
