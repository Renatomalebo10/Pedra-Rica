@extends('layouts.public')

@section('title', 'Evangelização - Pedra Rica Oficial')

@section('content')

    {{-- HERO --}}
    <section class="relative bg-gradient-to-br from-[#1e3a5f] via-[#1e40af] to-[#2563eb] text-white overflow-hidden">
        <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg%20width%3D%2260%22%20height%3D%2260%22%20viewBox%3D%220%200%2060%2060%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%3E%3Cg%20fill%3D%22none%22%20fill-rule%3D%22evenodd%22%3E%3Cg%20fill%3D%22%23ffffff%22%20fill-opacity%3D%220.03%22%3E%3Cpath%20d%3D%22M36%2034v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6%2034v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6%204V0H4v4H0v2h4v4h2V6h4V4H6z%22%2F%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E')] opacity-50"></div>
        <div class="absolute -top-24 -right-24 w-96 h-96 bg-[#3b82f6] rounded-full blur-3xl opacity-20"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 sm:py-28">
            <div class="max-w-3xl">
                <span class="inline-block text-sm font-semibold text-blue-200 uppercase tracking-widest mb-3">Fé</span>
                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight leading-tight">Evangelização</h1>
                <p class="mt-6 text-xl sm:text-2xl text-blue-100 italic font-medium leading-relaxed">Fé que Move o Projeto</p>
            </div>
        </div>
        <div class="absolute bottom-0 inset-x-0 h-16 bg-gradient-to-t from-white to-transparent"></div>
    </section>

    {{-- MAIN CONTENT --}}
    <section class="py-16 sm:py-20 bg-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <svg class="w-16 h-16 text-[#1e40af] mx-auto mb-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/></svg>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-gray-900 mb-6">Deus está em todo lado</h2>
                <p class="text-lg text-gray-600 leading-relaxed max-w-2xl mx-auto">
                    Este projecto existe para ser um lembrete de que o poder de Deus está em todo lado. É só deixar Deus trabalhar.
                </p>
            </div>
        </div>
    </section>

    {{-- INSTRUMENT --}}
    <section class="py-16 sm:py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-4xl mx-auto text-center mb-12">
                <h2 class="text-3xl sm:text-4xl font-extrabold text-gray-900 mb-6">O Desporto como Instrumento</h2>
                <p class="text-lg text-gray-600 leading-relaxed max-w-2xl mx-auto">
                    A Pedra Rica utiliza o desporto como instrumento de evangelização e serviço à comunidade, alcançando jovens lá onde eles estão.
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-6 max-w-4xl mx-auto">
                <div class="bg-white rounded-2xl p-6 border border-gray-100 text-center hover:shadow-lg hover:-translate-y-1 transition-all duration-300">
                    <div class="w-12 h-12 bg-[#1e40af] rounded-xl flex items-center justify-center mb-3 mx-auto">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/></svg>
                    </div>
                    <h3 class="font-semibold text-gray-900 text-sm">Deus</h3>
                </div>

                <div class="bg-white rounded-2xl p-6 border border-gray-100 text-center hover:shadow-lg hover:-translate-y-1 transition-all duration-300">
                    <div class="w-12 h-12 bg-[#1e40af] rounded-xl flex items-center justify-center mb-3 mx-auto">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                    </div>
                    <h3 class="font-semibold text-gray-900 text-sm">Educação</h3>
                </div>

                <div class="bg-white rounded-2xl p-6 border border-gray-100 text-center hover:shadow-lg hover:-translate-y-1 transition-all duration-300">
                    <div class="w-12 h-12 bg-[#1e40af] rounded-xl flex items-center justify-center mb-3 mx-auto">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                    <h3 class="font-semibold text-gray-900 text-sm">Desporto</h3>
                </div>

                <div class="bg-white rounded-2xl p-6 border border-gray-100 text-center hover:shadow-lg hover:-translate-y-1 transition-all duration-300">
                    <div class="w-12 h-12 bg-[#1e40af] rounded-xl flex items-center justify-center mb-3 mx-auto">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    </div>
                    <h3 class="font-semibold text-gray-900 text-sm">Juventude</h3>
                </div>

                <div class="bg-white rounded-2xl p-6 border border-gray-100 text-center hover:shadow-lg hover:-translate-y-1 transition-all duration-300">
                    <div class="w-12 h-12 bg-[#1e40af] rounded-xl flex items-center justify-center mb-3 mx-auto">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                    </div>
                    <h3 class="font-semibold text-gray-900 text-sm">Serviço</h3>
                </div>
            </div>
        </div>
    </section>

    {{-- FOUNDER QUOTE --}}
    <section class="py-16 sm:py-20 bg-gradient-to-br from-[#1e40af] to-[#2563eb] text-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <svg class="w-12 h-12 text-blue-200 mx-auto mb-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
            <blockquote class="text-xl sm:text-2xl text-blue-100 italic leading-relaxed max-w-3xl mx-auto mb-8">
                "{{ $settings['founder_quote'] ?? 'Esse projeto existe para me lembrar que o poder de Deus está em todo lado e é só deixar Deus trabalhar.' }}"
            </blockquote>
            <div class="w-16 h-1 bg-blue-300/40 rounded-full mx-auto mb-6"></div>
            <p class="text-blue-200 font-semibold">{{ $settings['founder_name'] ?? 'Fundador da Pedra Rica' }}</p>
        </div>
    </section>

    {{-- CTA --}}
    <section class="py-16 sm:py-20 bg-gray-50">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl sm:text-4xl font-extrabold text-gray-900 mb-6">Faça Parte Desta Missão</h2>
            <p class="text-lg text-gray-500 mb-8 max-w-2xl mx-auto">Quer conhecer mais sobre o nosso trabalho de evangelização? Entre em contacto connosco.</p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('pages.impact') }}" class="inline-flex items-center justify-center px-8 py-3.5 bg-[#1e40af] text-white font-semibold rounded-xl hover:bg-[#2563eb] transition-all duration-200 shadow-lg hover:shadow-xl hover:-translate-y-0.5">
                    Conheça o Impacto Social
                    <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
                <a href="{{ route('pages.contact') }}" class="inline-flex items-center justify-center px-8 py-3.5 border-2 border-[#1e40af] text-[#1e40af] font-semibold rounded-xl hover:bg-[#1e40af] hover:text-white transition-all duration-200">
                    Entre em Contacto
                </a>
            </div>
        </div>
    </section>

@endsection
