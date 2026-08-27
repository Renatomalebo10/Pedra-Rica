@extends('layouts.public')

@section('title', 'A História do Fundador - Pedra Rica Oficial')

@section('content')

    {{-- Hero --}}
    <section class="bg-gradient-to-br from-[#1e40af] via-[#2563eb] to-[#3b82f6] text-white py-20 lg:py-28">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl lg:text-6xl font-extrabold tracking-tight">A História do Fundador</h1>
            <p class="mt-4 text-lg lg:text-xl text-blue-100 max-w-2xl mx-auto">Wilson Domingos da Conceição Armando</p>
        </div>
    </section>

    {{-- Introdução --}}
    <section class="py-16 lg:py-24 bg-white">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <p class="text-lg lg:text-xl text-gray-600 leading-relaxed text-center">
                Wilson Domingos da Conceição Armando é o fundador e mentor do projecto Pedra Rica. Uma história de fé, dedicação e serviço que começou na infância e continua a transformar vidas.
            </p>
        </div>
    </section>

    {{-- A Pedra Rica faz parte da infância --}}
    <section class="py-16 lg:py-24 bg-gray-50">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-2xl p-8 lg:p-12 shadow-sm border border-gray-100">
                <h2 class="text-2xl lg:text-3xl font-bold text-[#1e40af]">A Pedra Rica Faz Parte da Sua Infância</h2>
                <div class="w-16 h-1 bg-[#3b82f6] mt-4 rounded-full"></div>
                <p class="mt-6 text-gray-600 leading-relaxed">
                    O Wilson cresceu na região de São João, no município de Hoji Ya Henda, onde as crianças se juntavam para brincar e jogar futsal nas ruas. A bola era o lazer, mas o desporto tornou-se muito mais do que isso — tornou-se um caminho de formação e esperança.
                </p>
            </div>
        </div>
    </section>

    {{-- Timeline de vida --}}
    <section class="py-16 lg:py-24 bg-white">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="space-y-8">

                {{-- 2005 --}}
                <div class="relative pl-8 border-l-2 border-[#3b82f6]">
                    <div class="absolute -left-2.5 top-1 w-4 h-4 bg-[#3b82f6] rounded-full border-2 border-white"></div>
                    <span class="inline-block text-sm font-bold text-[#3b82f6] bg-blue-50 px-3 py-1 rounded-full">2005 — Início</span>
                    <h3 class="mt-3 text-xl font-bold text-[#1e40af]">Aos 12 anos</h3>
                    <p class="mt-2 text-gray-600 leading-relaxed">
                        Aos apenas 12 anos de idade, o Wilson já participava activamente como jogador e treinador nas brincadeiras de futsal da sua comunidade. A paixão pelo desporto e o interesse em guiar os mais novos já se mostravam desde cedo.
                    </p>
                </div>

                {{-- 2009 --}}
                <div class="relative pl-8 border-l-2 border-[#3b82f6]">
                    <div class="absolute -left-2.5 top-1 w-4 h-4 bg-[#3b82f6] rounded-full border-2 border-white"></div>
                    <span class="inline-block text-sm font-bold text-[#3b82f6] bg-blue-50 px-3 py-1 rounded-full">25 de Maio de 2009</span>
                    <h3 class="mt-3 text-xl font-bold text-[#1e40af]">Fundação Oficial</h3>
                    <p class="mt-2 text-gray-600 leading-relaxed">
                        A Pedra Rica foi oficialmente fundada. O que antes era apenas vontade e dedicação, ganhou forma legal e estrutura. Um projecto nascido na comunidade, para a comunidade.
                    </p>
                </div>

                {{-- Hoje --}}
                <div class="relative pl-8 border-l-2 border-[#3b82f6]">
                    <div class="absolute -left-2.5 top-1 w-4 h-4 bg-[#3b82f6] rounded-full border-2 border-white"></div>
                    <span class="inline-block text-sm font-bold text-[#3b82f6] bg-blue-50 px-3 py-1 rounded-full">Actualmente</span>
                    <h3 class="mt-3 text-xl font-bold text-[#1e40af]">Uma Nova Missão, a Mesma Vontade de Servir</h3>
                    <p class="mt-2 text-gray-600 leading-relaxed">
                        Hoje, o Wilson é seminarista. A sua fé levou-no a uma nova fase de vida, mas a vontade de servir e de transformar vidas continua intacta. A Pedra Rica continua a ser a prova viva de que um sonho, quando alimentado com fé e dedicação, pode mudar o mundo.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- Evolução --}}
    <section class="py-16 lg:py-24 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl lg:text-4xl font-bold text-[#1e40af]">A Sua Evolução</h2>
                <div class="w-16 h-1 bg-[#3b82f6] mx-auto mt-4 rounded-full"></div>
            </div>

            <div class="flex flex-wrap justify-center items-center gap-4 lg:gap-6 max-w-4xl mx-auto">
                @php
                    $steps = ['Jogador', 'Treinador', 'Fundador de Projecto', 'Seminarista'];
                @endphp

                @foreach($steps as $index => $step)
                    <div class="flex items-center gap-4">
                        <div class="bg-[#1e40af] text-white px-5 py-3 rounded-xl font-semibold text-sm lg:text-base shadow-sm">
                            {{ $step }}
                        </div>
                        @if(!$loop->last)
                            <svg class="w-5 h-5 text-[#3b82f6] shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- O que a Pedra Rica me ensinou --}}
    <section class="py-16 lg:py-24 bg-white">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl lg:text-4xl font-bold text-[#1e40af] text-center">O Que a Pedra Rica Me Ensinou</h2>
            <div class="w-16 h-1 bg-[#3b82f6] mx-auto mt-4 rounded-full"></div>

            <ul class="mt-10 space-y-4">
                @php
                    $lessons = [
                        'Fundou um projeto',
                        'Começou a treinar equipas',
                        'Conheceu diferentes partes de Angola',
                        'Assumiu responsabilidades',
                        'Começou a dedicar-se ao que queria',
                        'Começou a criar a própria identidade',
                        'Aprendeu que nem todos que dizem que vão apoiar realmente apoiam',
                        'Começou a compreender melhor o sentido da vida',
                        'Aprendeu línguas',
                        'Desenvolveu uma preocupação profunda com o mundo',
                        'Entendeu que a sua busca pela verdade estava ligada a Cristo Jesus',
                        'Aprendeu o valor de escolher boas companhias',
                    ];
                @endphp

                @foreach($lessons as $lesson)
                    <li class="flex items-start gap-3">
                        <span class="mt-1 w-2 h-2 bg-[#3b82f6] rounded-full shrink-0"></span>
                        <span class="text-gray-700 leading-relaxed">{{ $lesson }}</span>
                    </li>
                @endforeach
            </ul>
        </div>
    </section>

    {{-- Um Sonho para Angola --}}
    <section class="py-16 lg:py-24 bg-gray-50">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-2xl p-8 lg:p-12 shadow-sm border border-gray-100">
                <h2 class="text-3xl lg:text-4xl font-bold text-[#1e40af]">Um Sonho para Angola</h2>
                <div class="w-16 h-1 bg-[#3b82f6] mt-4 rounded-full"></div>

                <ul class="mt-8 space-y-4">
                    @php
                        $dreams = [
                            'Uma Angola com menor nível de analfabetismo',
                            'Maior proteção para órfãos e viúvas',
                            'Maior apoio à juventude',
                            'Uma sociedade sem corrupção',
                            'Uma sociedade sem nepotismo',
                            'Uma sociedade sem tribalismo',
                            'Mais oportunidades para crianças e jovens',
                        ];
                    @endphp

                    @foreach($dreams as $dream)
                        <li class="flex items-start gap-3">
                            <span class="mt-1 w-2 h-2 bg-[#3b82f6] rounded-full shrink-0"></span>
                            <span class="text-gray-700 leading-relaxed">{{ $dream }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </section>

    {{-- Quote --}}
    <section class="py-16 lg:py-24 bg-gradient-to-br from-[#1e40af] to-[#2563eb]">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <svg class="w-12 h-12 text-white/30 mx-auto mb-6" fill="currentColor" viewBox="0 0 24 24">
                <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/>
            </svg>
            <blockquote class="text-2xl lg:text-3xl font-bold text-white leading-relaxed italic">
                "Esse projeto existe para me lembrar que o poder de Deus está em todo lado e é só deixar Deus trabalhar."
            </blockquote>
            <p class="mt-6 text-blue-200 font-semibold">— Wilson Domingos da Conceição Armando</p>
        </div>
    </section>

@endsection
