@extends('layouts.public')

@section('title', 'Impacto Social - Pedra Rica Oficial')

@section('content')

    {{-- HERO --}}
    <section class="relative bg-gradient-to-br from-[#1e3a5f] via-[#1e40af] to-[#2563eb] text-white overflow-hidden">
        <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg%20width%3D%2260%22%20height%3D%2260%22%20viewBox%3D%220%200%2060%2060%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%3E%3Cg%20fill%3D%22none%22%20fill-rule%3D%22evenodd%22%3E%3Cg%20fill%3D%22%23ffffff%22%20fill-opacity%3D%220.03%22%3E%3Cpath%20d%3D%22M36%2034v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6%2034v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6%204V0H4v4H0v2h4v4h2V6h4V4H6z%22%2F%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E')] opacity-50"></div>
        <div class="absolute -top-24 -right-24 w-96 h-96 bg-[#3b82f6] rounded-full blur-3xl opacity-20"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 sm:py-28">
            <div class="max-w-3xl">
                <span class="inline-block text-sm font-semibold text-blue-200 uppercase tracking-widest mb-3">Transformação</span>
                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight leading-tight">Impacto Social</h1>
                <p class="mt-6 text-xl sm:text-2xl text-blue-100 italic font-medium leading-relaxed">Mais do que jogar. Transformar vidas.</p>
            </div>
        </div>
        <div class="absolute bottom-0 inset-x-0 h-16 bg-gradient-to-t from-white to-transparent"></div>
    </section>

    {{-- STATS --}}
    <section class="py-16 sm:py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 lg:grid-cols-2 gap-6 max-w-2xl mx-auto">
                <div class="bg-gray-50 rounded-2xl p-8 text-center border border-gray-100">
                    <div class="text-4xl sm:text-5xl font-extrabold text-[#1e40af] mb-2">+{{ $playerCount }}</div>
                    <div class="text-sm text-gray-500 font-medium">Crianças e adolescentes</div>
                </div>
                <div class="bg-gray-50 rounded-2xl p-8 text-center border border-gray-100">
                    <div class="text-4xl sm:text-5xl font-extrabold text-[#1e40af] mb-2">{{ $coachCount }}</div>
                    <div class="text-sm text-gray-500 font-medium">Treinadores</div>
                </div>
            </div>
        </div>
    </section>

    {{-- WHAT THE PROJECT PROVIDES --}}
    <section class="py-16 sm:py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl sm:text-4xl font-extrabold text-gray-900 mb-4">O Que o Projeto Oferece</h2>
                <p class="text-lg text-gray-500 max-w-2xl mx-auto">Além do desporto, a Pedra Rica transforma vidas de diversas formas.</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="bg-white rounded-2xl p-6 border border-gray-100 text-center hover:shadow-lg hover:-translate-y-1 transition-all duration-300">
                    <div class="w-14 h-14 bg-blue-100 rounded-xl flex items-center justify-center mb-4 mx-auto">
                        <svg class="w-7 h-7 text-[#1e40af]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                    <h3 class="font-semibold text-gray-900 mb-2">Desporto</h3>
                    <p class="text-sm text-gray-500 leading-relaxed">Treino desportivo e participação em competições.</p>
                </div>

                <div class="bg-white rounded-2xl p-6 border border-gray-100 text-center hover:shadow-lg hover:-translate-y-1 transition-all duration-300">
                    <div class="w-14 h-14 bg-blue-100 rounded-xl flex items-center justify-center mb-4 mx-auto">
                        <svg class="w-7 h-7 text-[#1e40af]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                    </div>
                    <h3 class="font-semibold text-gray-900 mb-2">Educação</h3>
                    <p class="text-sm text-gray-500 leading-relaxed">Apoio escolar e valorização do estudo.</p>
                </div>

                <div class="bg-white rounded-2xl p-6 border border-gray-100 text-center hover:shadow-lg hover:-translate-y-1 transition-all duration-300">
                    <div class="w-14 h-14 bg-blue-100 rounded-xl flex items-center justify-center mb-4 mx-auto">
                        <svg class="w-7 h-7 text-[#1e40af]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                    </div>
                    <h3 class="font-semibold text-gray-900 mb-2">Disciplina</h3>
                    <p class="text-sm text-gray-500 leading-relaxed">Formação de character e responsabilidade.</p>
                </div>

                <div class="bg-white rounded-2xl p-6 border border-gray-100 text-center hover:shadow-lg hover:-translate-y-1 transition-all duration-300">
                    <div class="w-14 h-14 bg-blue-100 rounded-xl flex items-center justify-center mb-4 mx-auto">
                        <svg class="w-7 h-7 text-[#1e40af]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    </div>
                    <h3 class="font-semibold text-gray-900 mb-2">Orientação</h3>
                    <p class="text-sm text-gray-500 leading-relaxed">Apoio psicológico e mentoring.</p>
                </div>

                <div class="bg-white rounded-2xl p-6 border border-gray-100 text-center hover:shadow-lg hover:-translate-y-1 transition-all duration-300">
                    <div class="w-14 h-14 bg-blue-100 rounded-xl flex items-center justify-center mb-4 mx-auto">
                        <svg class="w-7 h-7 text-[#1e40af]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/></svg>
                    </div>
                    <h3 class="font-semibold text-gray-900 mb-2">Evangelização</h3>
                    <p class="text-sm text-gray-500 leading-relaxed">Fortalecimento da fé e dos valores cristãos.</p>
                </div>

                <div class="bg-white rounded-2xl p-6 border border-gray-100 text-center hover:shadow-lg hover:-translate-y-1 transition-all duration-300">
                    <div class="w-14 h-14 bg-blue-100 rounded-xl flex items-center justify-center mb-4 mx-auto">
                        <svg class="w-7 h-7 text-[#1e40af]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                    </div>
                    <h3 class="font-semibold text-gray-900 mb-2">Comunidade</h3>
                    <p class="text-sm text-gray-500 leading-relaxed">Sentido de pertença e cooperação.</p>
                </div>

                <div class="bg-white rounded-2xl p-6 border border-gray-100 text-center hover:shadow-lg hover:-translate-y-1 transition-all duration-300">
                    <div class="w-14 h-14 bg-blue-100 rounded-xl flex items-center justify-center mb-4 mx-auto">
                        <svg class="w-7 h-7 text-[#1e40af]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/></svg>
                    </div>
                    <h3 class="font-semibold text-gray-900 mb-2">Esperança</h3>
                    <p class="text-sm text-gray-500 leading-relaxed">Visão positiva para o futuro.</p>
                </div>

                <div class="bg-white rounded-2xl p-6 border border-gray-100 text-center hover:shadow-lg hover:-translate-y-1 transition-all duration-300">
                    <div class="w-14 h-14 bg-blue-100 rounded-xl flex items-center justify-center mb-4 mx-auto">
                        <svg class="w-7 h-7 text-[#1e40af]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>
                    </div>
                    <h3 class="font-semibold text-gray-900 mb-2">Desenvolvimento pessoal</h3>
                    <p class="text-sm text-gray-500 leading-relaxed">Crescimento integral de cada jovem.</p>
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
            <h2 class="text-3xl sm:text-4xl font-extrabold text-gray-900 mb-6">Quer Saber Mais?</h2>
            <p class="text-lg text-gray-500 mb-8 max-w-2xl mx-auto">Entre em contacto connosco e saiba como pode fazer parte desta missão de transformação.</p>
            <a href="{{ route('pages.contact') }}" class="inline-flex items-center px-8 py-3.5 bg-[#1e40af] text-white font-semibold rounded-xl hover:bg-[#2563eb] transition-all duration-200 shadow-lg hover:shadow-xl hover:-translate-y-0.5">
                Entre em Contacto
                <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
            </a>
        </div>
    </section>

@endsection
