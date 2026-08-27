@extends('layouts.public')

@section('title', 'Sobre o Projeto - Pedra Rica Oficial')

@section('content')

    {{-- Hero --}}
    <section class="bg-gradient-to-br from-[#1e40af] via-[#2563eb] to-[#3b82f6] text-white py-20 lg:py-28">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl lg:text-6xl font-extrabold tracking-tight">Sobre o Projeto</h1>
            <p class="mt-4 text-lg lg:text-xl text-blue-100 max-w-2xl mx-auto">Desporto. Educação. Fé. Transformação.</p>
        </div>
    </section>

    {{-- O Que É --}}
    <section class="py-16 lg:py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-3xl mx-auto text-center">
                <h2 class="text-3xl lg:text-4xl font-bold text-[#1e40af]">O Que É a Pedra Rica?</h2>
                <div class="w-16 h-1 bg-[#3b82f6] mx-auto mt-4 rounded-full"></div>
                <p class="mt-8 text-lg text-gray-600 leading-relaxed">
                    {{ $settings['about_description'] ?? 'A Pedra Rica é um projecto social, desportivo, educativo e de evangelização, dedicado à transformação de crianças e adolescentes na região de São João, município de Hoji Ya Henda. Não somos apenas uma equipa de futsal — somos uma comunidade que acredita no poder do desporto, da educação e da fé para mudar vidas e construir um futuro melhor para Angola.' }}
                </p>
            </div>
        </div>
    </section>

    {{-- Missão & Visão --}}
    <section class="py-16 lg:py-24 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 lg:gap-12">
                {{-- Missão --}}
                <div class="bg-white rounded-2xl p-8 lg:p-10 shadow-sm border border-gray-100">
                    <div class="w-14 h-14 bg-blue-50 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-7 h-7 text-[#2563eb]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-[#1e40af]">Missão</h3>
                    <p class="mt-4 text-gray-600 leading-relaxed">
                        {{ $settings['mission'] ?? 'Promover o desenvolvimento integral de crianças e adolescentes através do desporto, da educação e da evangelização, oferecendo alternativas saudáveis e formando cidadãos responsáveis, disciplinados e cheios de esperança para a sociedade angolana.' }}
                    </p>
                </div>

                {{-- Visão --}}
                <div class="bg-white rounded-2xl p-8 lg:p-10 shadow-sm border border-gray-100">
                    <div class="w-14 h-14 bg-blue-50 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-7 h-7 text-[#2563eb]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-[#1e40af]">Visão</h3>
                    <p class="mt-4 text-gray-600 leading-relaxed">
                        {{ $settings['vision'] ?? 'Ser referência nacional na formação de jovens através do desporto e da educação, contribuindo para uma sociedade angolana mais justa, educada e unida, onde cada criança e adolescente tenha a oportunidade de desenvolver o seu potencial pleno.' }}
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- Objetivos --}}
    <section class="py-16 lg:py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl lg:text-4xl font-bold text-[#1e40af]">Os Nossos Objetivos</h2>
                <div class="w-16 h-1 bg-[#3b82f6] mx-auto mt-4 rounded-full"></div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 lg:gap-8">
                {{-- 1 --}}
                <div class="bg-gradient-to-br from-[#1e40af] to-[#2563eb] rounded-2xl p-6 lg:p-8 text-white">
                    <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center mb-5">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold">Combater a Criminalidade</h3>
                    <p class="mt-3 text-blue-100 text-sm leading-relaxed">
                        Contribuir para o combate à criminalidade na região de São João, município de Hoji Ya Henda, oferecendo às crianças e jovens uma alternativa saudável através do desporto e da formação.
                    </p>
                </div>

                {{-- 2 --}}
                <div class="bg-gradient-to-br from-[#2563eb] to-[#3b82f6] rounded-2xl p-6 lg:p-8 text-white">
                    <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center mb-5">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold">Combater o Analfabetismo</h3>
                    <p class="mt-3 text-blue-100 text-sm leading-relaxed">
                        Contribuir para a educação das crianças e adolescentes e incentivar o desenvolvimento académico.
                    </p>
                </div>

                {{-- 3 --}}
                <div class="bg-gradient-to-br from-[#2563eb] to-[#3b82f6] rounded-2xl p-6 lg:p-8 text-white">
                    <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center mb-5">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold">Combater o Tabagismo</h3>
                    <p class="mt-3 text-blue-100 text-sm leading-relaxed">
                        Promover hábitos saudáveis e orientar os jovens para uma vida longe de comportamentos prejudiciais.
                    </p>
                </div>

                {{-- 4 --}}
                <div class="bg-gradient-to-br from-[#1e40af] to-[#2563eb] rounded-2xl p-6 lg:p-8 text-white">
                    <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center mb-5">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold">Evangelizar</h3>
                    <p class="mt-3 text-blue-100 text-sm leading-relaxed">
                        Utilizar o projeto e o desporto como instrumentos de evangelização, procurando levar a mensagem cristã aos jovens e às famílias.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- Crianças e Adolescentes --}}
    <section class="py-16 lg:py-24 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <span class="inline-block text-sm font-semibold text-[#3b82f6] bg-blue-50 px-4 py-1.5 rounded-full uppercase tracking-wider">Impacto</span>
                <h2 class="mt-4 text-3xl lg:text-4xl font-bold text-[#1e40af]">Mais de 100 Crianças e Adolescentes</h2>
                <p class="mt-4 text-lg text-gray-600 max-w-2xl mx-auto">O que encontram na Pedra Rica:</p>
            </div>

            <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 lg:gap-6 max-w-4xl mx-auto">
                @php
                    $items = [
                        ['icon' => '🏃', 'label' => 'Desporto'],
                        ['icon' => '📚', 'label' => 'Educação'],
                        ['icon' => '💪', 'label' => 'Disciplina'],
                        ['icon' => '🧭', 'label' => 'Orientação'],
                        ['icon' => '✝️', 'label' => 'Evangelização'],
                        ['icon' => '🤝', 'label' => 'Comunidade'],
                        ['icon' => '🌟', 'label' => 'Esperança'],
                        ['icon' => '🌱', 'label' => 'Desenvolvimento Pessoal'],
                    ];
                @endphp

                @foreach($items as $item)
                    <div class="bg-white rounded-xl p-5 lg:p-6 text-center shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
                        <span class="text-3xl lg:text-4xl block mb-3">{{ $item['icon'] }}</span>
                        <span class="text-sm font-semibold text-gray-800">{{ $item['label'] }}</span>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- CTA --}}
    <section class="py-16 lg:py-24 bg-gradient-to-br from-[#1e40af] to-[#2563eb]">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl lg:text-4xl font-bold text-white">Conheça a Nossa História</h2>
            <p class="mt-4 text-lg text-blue-100 max-w-xl mx-auto">
                Descubra como tudo começou e como a Pedra Rica tem transformado vidas desde 2009.
            </p>
            <a href="{{ route('pages.history') }}"
               class="inline-flex items-center mt-8 px-8 py-3.5 bg-white text-[#1e40af] font-semibold rounded-xl hover:bg-blue-50 transition-colors">
                Conheça a nossa história
                <svg class="ml-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                </svg>
            </a>
        </div>
    </section>

@endsection
