@extends('layouts.public')

@section('title', 'A Nossa História - Pedra Rica Oficial')

@section('content')

    {{-- Hero --}}
    <section class="bg-gradient-to-br from-[#1e40af] via-[#2563eb] to-[#3b82f6] text-white py-20 lg:py-28">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl lg:text-6xl font-extrabold tracking-tight">A Nossa História</h1>
            <p class="mt-4 text-lg lg:text-xl text-blue-100 max-w-2xl mx-auto">Como tudo começou e onde queremos chegar</p>
        </div>
    </section>

    {{-- Intro --}}
    <section class="py-16 lg:py-24 bg-white">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <p class="text-lg lg:text-xl text-gray-600 leading-relaxed text-center">
                A Pedra Rica nasceu do sonho de um jovem que acreditava que o desporto poderia mudar o destino de muitas crianças e adolescentes na região de São João, município de Hoji Ya Henda.
            </p>
        </div>
    </section>

    {{-- Filosofia --}}
    <section class="py-16 lg:py-24 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-3xl mx-auto">
                <div class="bg-white rounded-2xl p-8 lg:p-12 shadow-sm border border-gray-100">
                    <h2 class="text-3xl lg:text-4xl font-bold text-[#1e40af]">Tudo Começou na Brincadeira.</h2>
                    <div class="w-16 h-1 bg-[#3b82f6] mt-4 rounded-full"></div>
                    <div class="mt-8 space-y-4 text-gray-600 leading-relaxed">
                        <p>
                            O que hoje é um projecto reconhecido e que transforma vidas, começou simplesmente com uma bola e uma vontade de brincar. Crianças da vizinhança juntavam-se para jogar futsal nas ruas, sem estruturas, sem equipamentos, mas com muito entusiasmo e fé.
                        </p>
                        <p>
                            Com o tempo, aquela brincadeira ganhou forma. O Wilson, que já desde os 12 anos participava como jogador e treinador, viu naquele momento algo maior — a possibilidade de usar o desporto como ferramenta de transformação social.
                        </p>
                        <p>
                            Assim, nasceu a Pedra Rica: uma pedra firme, rica em valores, que se tornou refúgio e esperança para dezenas de crianças e adolescentes.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Mony e Keny --}}
    <section class="py-16 lg:py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl lg:text-4xl font-bold text-[#1e40af]">Pessoas que Fazem Parte da Nossa História</h2>
                <div class="w-16 h-1 bg-[#3b82f6] mx-auto mt-4 rounded-full"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-4xl mx-auto">
                <div class="bg-gradient-to-br from-blue-50 to-white rounded-2xl p-8 text-center border border-blue-100">
                    <div class="w-20 h-20 bg-[#3b82f6] rounded-full mx-auto flex items-center justify-center">
                        <span class="text-2xl font-bold text-white">M</span>
                    </div>
                    <h3 class="mt-6 text-xl font-bold text-[#1e40af]">Mony</h3>
                    <p class="mt-3 text-gray-600 leading-relaxed">
                        Uma das primeiras pessoas a acreditar no projecto. Com dedicação e carinho, ajudou a construir os alicerces da Pedra Rica e continua a ser uma peça fundamental na história do projecto.
                    </p>
                </div>

                <div class="bg-gradient-to-br from-blue-50 to-white rounded-2xl p-8 text-center border border-blue-100">
                    <div class="w-20 h-20 bg-[#3b82f6] rounded-full mx-auto flex items-center justify-center">
                        <span class="text-2xl font-bold text-white">K</span>
                    </div>
                    <h3 class="mt-6 text-xl font-bold text-[#1e40af]">Keny</h3>
                    <p class="mt-3 text-gray-600 leading-relaxed">
                        Outro nome que está gravado na história da Pedra Rica. Keny contribuiu com apoio, força e presença, sendo uma inspiração para todos os que fazem parte deste projecto.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- CTA --}}
    <section class="py-16 lg:py-24 bg-gradient-to-br from-[#1e40af] to-[#2563eb]">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl lg:text-4xl font-bold text-white">Ver Linha do Tempo Completa</h2>
            <p class="mt-4 text-lg text-blue-100 max-w-xl mx-auto">
                Explore todos os marcos e momentos importantes desde a fundação até hoje.
            </p>
            <a href="{{ route('pages.timeline') }}"
               class="inline-flex items-center mt-8 px-8 py-3.5 bg-white text-[#1e40af] font-semibold rounded-xl hover:bg-blue-50 transition-colors">
                Ver linha do tempo completa
                <svg class="ml-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                </svg>
            </a>
        </div>
    </section>

@endsection
