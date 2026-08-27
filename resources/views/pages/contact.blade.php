@extends('layouts.public')

@section('title', 'Contacto - Pedra Rica Oficial')

@section('content')

    {{-- HERO --}}
    <section class="relative bg-gradient-to-br from-[#1e3a5f] via-[#1e40af] to-[#2563eb] text-white overflow-hidden">
        <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg%20width%3D%2260%22%20height%3D%2260%22%20viewBox%3D%220%200%2060%2060%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%3E%3Cg%20fill%3D%22none%22%20fill-rule%3D%22evenodd%22%3E%3Cg%20fill%3D%22%23ffffff%22%20fill-opacity%3D%220.03%22%3E%3Cpath%20d%3D%22M36%2034v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6%2034v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6%204V0H4v4H0v2h4v4h2V6h4V4H6z%22%2F%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E')] opacity-50"></div>
        <div class="absolute -top-24 -right-24 w-96 h-96 bg-[#3b82f6] rounded-full blur-3xl opacity-20"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 sm:py-28">
            <div class="max-w-3xl">
                <span class="inline-block text-sm font-semibold text-blue-200 uppercase tracking-widest mb-3">Fale Connosco</span>
                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight leading-tight">Contacto</h1>
                <p class="mt-6 text-lg sm:text-xl text-blue-100/90 max-w-xl leading-relaxed">Estamos aqui para ajudar. Entre em contacto connosco.</p>
            </div>
        </div>
        <div class="absolute bottom-0 inset-x-0 h-16 bg-gradient-to-t from-white to-transparent"></div>
    </section>

    {{-- CONTACT INFO --}}
    <section class="py-16 sm:py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">

                {{-- Contact Card --}}
                <div>
                    <h2 class="text-2xl sm:text-3xl font-extrabold text-gray-900 mb-8">Informações de Contacto</h2>

                    <div class="space-y-6">
                        @if($settings['contact_email'] ?? null)
                            <div class="flex items-start gap-4 p-6 bg-gray-50 rounded-2xl border border-gray-100">
                                <div class="w-12 h-12 bg-[#1e40af] rounded-xl flex items-center justify-center shrink-0">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-gray-900 mb-1">Email</h3>
                                    <a href="mailto:{{ $settings['contact_email'] }}" class="text-[#3b82f6] hover:text-[#1e40af] transition-colors">{{ $settings['contact_email'] }}</a>
                                </div>
                            </div>
                        @endif

                        @if($settings['contact_phone'] ?? null)
                            <div class="flex items-start gap-4 p-6 bg-gray-50 rounded-2xl border border-gray-100">
                                <div class="w-12 h-12 bg-[#1e40af] rounded-xl flex items-center justify-center shrink-0">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-gray-900 mb-1">Telefone</h3>
                                    <a href="tel:{{ $settings['contact_phone'] }}" class="text-[#3b82f6] hover:text-[#1e40af] transition-colors">{{ $settings['contact_phone'] }}</a>
                                </div>
                            </div>
                        @endif

                        @if($settings['contact_address'] ?? null)
                            <div class="flex items-start gap-4 p-6 bg-gray-50 rounded-2xl border border-gray-100">
                                <div class="w-12 h-12 bg-[#1e40af] rounded-xl flex items-center justify-center shrink-0">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-gray-900 mb-1">Morada</h3>
                                    <p class="text-gray-500">{{ $settings['contact_address'] }}</p>
                                </div>
                            </div>
                        @endif

                        @if(!($settings['contact_email'] ?? null) && !($settings['contact_phone'] ?? null) && !($settings['contact_address'] ?? null))
                            <div class="text-center py-12 bg-gray-50 rounded-2xl">
                                <svg class="w-12 h-12 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                                <p class="text-gray-500">Informação ainda não cadastrada.</p>
                            </div>
                        @endif
                    </div>

                    {{-- Social Media --}}
                    @if($socialLinks->isNotEmpty())
                        <div class="mt-8">
                            <h3 class="text-lg font-semibold text-gray-900 mb-4">Redes Sociais</h3>
                            <div class="flex flex-wrap gap-3">
                                @foreach($socialLinks as $link)
                                    <a href="{{ $link->url }}" target="_blank" rel="noopener noreferrer"
                                       class="inline-flex items-center gap-2 px-4 py-2.5 bg-gray-50 border border-gray-100 rounded-xl text-sm font-medium text-gray-700 hover:bg-[#1e40af] hover:text-white hover:border-[#1e40af] transition-all duration-200">
                                        <span class="text-xs font-bold uppercase">{{ strtoupper(substr($link->platform, 0, 2)) }}</span>
                                        <span>{{ $link->platform }}</span>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>

                {{-- Map / Location --}}
                <div>
                    <h2 class="text-2xl sm:text-3xl font-extrabold text-gray-900 mb-8">Localização</h2>
                    <div class="aspect-video bg-gray-100 rounded-2xl overflow-hidden border border-gray-200 flex items-center justify-center">
                        @if($settings['contact_address'] ?? null)
                            <div class="text-center p-8">
                                <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                <p class="text-gray-500 font-medium">{{ $settings['contact_address'] }}</p>
                            </div>
                        @else
                            <div class="text-center p-8">
                                <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                <p class="text-gray-500">Mapa disponível em breve.</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- FAQ --}}
    <section class="py-16 sm:py-20 bg-gray-50">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl sm:text-4xl font-extrabold text-gray-900">Perguntas Frequentes</h2>
            </div>

            <div class="space-y-4" x-data="{ openFaq: null }">
                <div class="bg-white rounded-2xl border border-gray-100 overflow-hidden">
                    <button @click="openFaq = openFaq === 1 ? null : 1" class="w-full flex items-center justify-between px-6 py-5 text-left">
                        <span class="font-semibold text-gray-900">Como posso inscrever o meu filho/a?</span>
                        <svg class="w-5 h-5 text-gray-400 shrink-0 ml-4 transition-transform duration-200" :class="openFaq === 1 ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </button>
                    <div x-show="openFaq === 1" x-cloak x-transition class="px-6 pb-5">
                        <p class="text-gray-500 leading-relaxed">Entre em contacto connosco através do email ou telefone indicados acima. Teremos todo o prazer em ajudá-lo/a.</p>
                    </div>
                </div>

                <div class="bg-white rounded-2xl border border-gray-100 overflow-hidden">
                    <button @click="openFaq = openFaq === 2 ? null : 2" class="w-full flex items-center justify-between px-6 py-5 text-left">
                        <span class="font-semibold text-gray-900">O projeto é gratuito?</span>
                        <svg class="w-5 h-5 text-gray-400 shrink-0 ml-4 transition-transform duration-200" :class="openFaq === 2 ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </button>
                    <div x-show="openFaq === 2" x-cloak x-transition class="px-6 pb-5">
                        <p class="text-gray-500 leading-relaxed">Sim, a Pedra Rica é um projeto social sem fins lucrativos. A participação é totalmente gratuita.</p>
                    </div>
                </div>

                <div class="bg-white rounded-2xl border border-gray-100 overflow-hidden">
                    <button @click="openFaq = openFaq === 3 ? null : 3" class="w-full flex items-center justify-between px-6 py-5 text-left">
                        <span class="font-semibold text-gray-900">Quais as idades admitidas?</span>
                        <svg class="w-5 h-5 text-gray-400 shrink-0 ml-4 transition-transform duration-200" :class="openFaq === 3 ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </button>
                    <div x-show="openFaq === 3" x-cloak x-transition class="px-6 pb-5">
                        <p class="text-gray-500 leading-relaxed">O projeto acolhe crianças e adolescentes. Contacte-nos para mais informações sobre faixas etárias específicas.</p>
                    </div>
                </div>

                <div class="bg-white rounded-2xl border border-gray-100 overflow-hidden">
                    <button @click="openFaq = openFaq === 4 ? null : 4" class="w-full flex items-center justify-between px-6 py-5 text-left">
                        <span class="font-semibold text-gray-900">Posso ser voluntário?</span>
                        <svg class="w-5 h-5 text-gray-400 shrink-0 ml-4 transition-transform duration-200" :class="openFaq === 4 ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </button>
                    <div x-show="openFaq === 4" x-cloak x-transition class="px-6 pb-5">
                        <p class="text-gray-500 leading-relaxed">Claro! Estamos sempre a precisar de voluntários. Entre em contacto connosco para saber como pode ajudar.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
