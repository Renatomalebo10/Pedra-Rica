@extends('layouts.public')

@section('title', $news->title . ' - Pedra Rica Oficial')

@section('content')

    {{-- HERO --}}
    <section class="relative bg-gradient-to-br from-[#1e3a5f] via-[#1e40af] to-[#2563eb] text-white overflow-hidden">
        <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg%20width%3D%2260%22%20height%3D%2260%22%20viewBox%3D%220%200%2060%2060%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%3E%3Cg%20fill%3D%22none%22%20fill-rule%3D%22evenodd%22%3E%3Cg%20fill%3D%22%23ffffff%22%20fill-opacity%3D%220.03%22%3E%3Cpath%20d%3D%22M36%2034v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6%2034v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6%204V0H4v4H0v2h4v4h2V6h4V4H6z%22%2F%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E')] opacity-50"></div>
        <div class="absolute -top-24 -right-24 w-96 h-96 bg-[#3b82f6] rounded-full blur-3xl opacity-20"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 sm:py-28">
            <div class="max-w-3xl">
                <a href="{{ route('pages.news') }}" class="inline-flex items-center gap-2 text-sm font-medium text-blue-200 hover:text-white mb-4 transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                    Voltar às Notícias
                </a>
                <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold tracking-tight leading-tight">{{ $news->title }}</h1>
                <div class="flex flex-wrap items-center gap-3 mt-6">
                    <time class="text-sm text-blue-200">{{ $news->published_at?->format('d/m/Y') }}</time>
                    @if($news->category)
                        <span class="text-xs font-semibold text-[#3b82f6] bg-white/10 backdrop-blur-sm px-3 py-1 rounded-full">{{ $news->category }}</span>
                    @endif
                </div>
            </div>
        </div>
        <div class="absolute bottom-0 inset-x-0 h-16 bg-gradient-to-t from-white to-transparent"></div>
    </section>

    {{-- ARTICLE --}}
    <article class="py-16 sm:py-20 bg-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            {{-- Article Image --}}
            @if($news->image)
                <div class="aspect-video rounded-2xl overflow-hidden mb-10 shadow-lg">
                    <img src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->title }}" class="w-full h-full object-cover">
                </div>
            @endif

            {{-- Article Meta --}}
            <div class="flex flex-wrap items-center gap-4 mb-8 pb-8 border-b border-gray-100">
                @if($news->author)
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-[#1e40af] rounded-full flex items-center justify-center">
                            <span class="text-xs font-bold text-white">{{ strtoupper(substr($news->author, 0, 2)) }}</span>
                        </div>
                        <div>
                            <span class="text-sm font-semibold text-gray-900 block">{{ $news->author }}</span>
                            <span class="text-xs text-gray-400">Autor</span>
                        </div>
                    </div>
                @endif
                <time class="text-sm text-gray-400">{{ $news->published_at?->format('d \d\e F \d\e Y') }}</time>
            </div>

            {{-- Article Content --}}
            <div class="prose prose-lg prose-gray max-w-none prose-headings:text-gray-900 prose-p:text-gray-600 prose-a:text-[#1e40af] prose-img:rounded-xl">
                {!! $news->content !!}
            </div>

            {{-- Back Link --}}
            <div class="mt-12 pt-8 border-t border-gray-100">
                <a href="{{ route('pages.news') }}" class="inline-flex items-center px-6 py-3 border-2 border-[#1e40af] text-[#1e40af] font-semibold rounded-xl hover:bg-[#1e40af] hover:text-white transition-all duration-200">
                    <svg class="mr-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                    Ver todas as notícias
                </a>
            </div>
        </div>
    </article>

@endsection
