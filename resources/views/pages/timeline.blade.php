@extends('layouts.public')

@section('title', 'Linha do Tempo - Pedra Rica Oficial')

@section('content')

    {{-- Hero --}}
    <section class="bg-gradient-to-br from-[#1e40af] via-[#2563eb] to-[#3b82f6] text-white py-20 lg:py-28">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl lg:text-6xl font-extrabold tracking-tight">Linha do Tempo</h1>
            <p class="mt-4 text-lg lg:text-xl text-blue-100 max-w-2xl mx-auto">Os marcos mais importantes da nossa história</p>
        </div>
    </section>

    {{-- Timeline --}}
    <section class="py-16 lg:py-24 bg-white">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">

            @if($historyEvents->isEmpty())
                <div class="text-center py-16">
                    <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <p class="text-gray-500 text-lg">Informação ainda não cadastrada.</p>
                </div>
            @else
                <div class="relative">
                    {{-- Vertical line --}}
                    <div class="absolute left-4 md:left-1/2 top-0 bottom-0 w-0.5 bg-[#3b82f6]/20 md:-translate-x-0.5"></div>

                    <div class="space-y-8 lg:space-y-12">
                        @foreach($historyEvents as $index => $event)
                            @php
                                $isEven = $index % 2 === 0;
                            @endphp

                            {{-- Desktop: alternating left/right --}}
                            <div class="relative flex flex-col md:flex-row {{ $isEven ? '' : 'md:flex-row-reverse' }} items-start md:items-center">

                                {{-- Dot --}}
                                <div class="absolute left-4 md:left-1/2 w-4 h-4 bg-[#3b82f6] rounded-full border-4 border-white shadow-md z-10 md:-translate-x-1/2 mt-1 md:mt-0"></div>

                                {{-- Content card (desktop) --}}
                                <div class="hidden md:block md:w-1/2 {{ $isEven ? 'md:pr-12' : 'md:pl-12' }}">
                                    <div class="bg-gray-50 rounded-2xl p-6 lg:p-8 border border-gray-100 hover:shadow-md transition-shadow">
                                        @if($event->year)
                                            <span class="inline-block text-sm font-bold text-[#3b82f6] bg-blue-50 px-3 py-1 rounded-full">{{ $event->year }}</span>
                                        @endif
                                        @if($event->event_date)
                                            <span class="inline-block ml-2 text-xs text-gray-500">{{ $event->event_date }}</span>
                                        @endif
                                        <h3 class="mt-3 text-lg font-bold text-[#1e40af]">{{ $event->title }}</h3>
                                        @if($event->description)
                                            <p class="mt-2 text-gray-600 leading-relaxed">{{ $event->description }}</p>
                                        @endif
                                    </div>
                                </div>

                                {{-- Empty spacer for desktop --}}
                                <div class="hidden md:block md:w-1/2"></div>

                                {{-- Content card (mobile) --}}
                                <div class="md:hidden ml-10">
                                    <div class="bg-gray-50 rounded-2xl p-5 border border-gray-100">
                                        @if($event->year)
                                            <span class="inline-block text-sm font-bold text-[#3b82f6] bg-blue-50 px-3 py-1 rounded-full">{{ $event->year }}</span>
                                        @endif
                                        @if($event->event_date)
                                            <span class="inline-block ml-2 text-xs text-gray-500">{{ $event->event_date }}</span>
                                        @endif
                                        <h3 class="mt-3 text-lg font-bold text-[#1e40af]">{{ $event->title }}</h3>
                                        @if($event->description)
                                            <p class="mt-2 text-gray-600 text-sm leading-relaxed">{{ $event->description }}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

        </div>
    </section>

@endsection
