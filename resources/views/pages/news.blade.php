@extends('layouts.public')

@section('title', 'Notícias - Pedra Rica Oficial')

@section('content')

    {{-- HERO --}}
    <section class="relative bg-gradient-to-br from-[#1e3a5f] via-[#1e40af] to-[#2563eb] text-white overflow-hidden">
        <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg%20width%3D%2260%22%20height%3D%2260%22%20viewBox%3D%220%200%2060%2060%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%3E%3Cg%20fill%3D%22none%22%20fill-rule%3D%22evenodd%22%3E%3Cg%20fill%3D%22%23ffffff%22%20fill-opacity%3D%220.03%22%3E%3Cpath%20d%3D%22M36%2034v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6%2034v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6%204V0H4v4H0v2h4v4h2V6h4V4H6z%22%2F%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E')] opacity-50"></div>
        <div class="absolute -top-24 -right-24 w-96 h-96 bg-[#3b82f6] rounded-full blur-3xl opacity-20"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 sm:py-28">
            <div class="max-w-3xl">
                <span class="inline-block text-sm font-semibold text-blue-200 uppercase tracking-widest mb-3">Novidades</span>
                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight leading-tight">Notícias</h1>
                <p class="mt-6 text-lg sm:text-xl text-blue-100/90 max-w-xl leading-relaxed">Fique por dentro de tudo o que acontece na Pedra Rica.</p>
            </div>
        </div>
        <div class="absolute bottom-0 inset-x-0 h-16 bg-gradient-to-t from-white to-transparent"></div>
    </section>

    {{-- NEWS --}}
    <section class="py-16 sm:py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @if($news->isNotEmpty())
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($news as $article)
                        <article class="group bg-gray-50 rounded-2xl overflow-hidden border border-gray-100 hover:shadow-lg hover:-translate-y-1 transition-all duration-300">
                            <a href="{{ route('pages.news-detail', $article) }}" class="block">
                                <div class="aspect-video bg-blue-100 overflow-hidden">
                                    @if($article->image)
                                        <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center">
                                            <svg class="w-10 h-10 text-blue-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
                                        </div>
                                    @endif
                                </div>
                            </a>
                            <div class="p-6">
                                <div class="flex items-center gap-3 mb-3">
                                    <time class="text-xs font-medium text-gray-400 uppercase tracking-wider">{{ $article->published_at?->format('d/m/Y') }}</time>
                                    @if($article->category)
                                        <span class="text-xs font-semibold text-[#3b82f6] bg-blue-50 px-2 py-0.5 rounded-full">{{ $article->category }}</span>
                                    @endif
                                </div>
                                <a href="{{ route('pages.news-detail', $article) }}" class="block">
                                    <h3 class="font-semibold text-gray-900 group-hover:text-[#1e40af] transition-colors line-clamp-2 mb-3">{{ $article->title }}</h3>
                                </a>
                                <p class="text-sm text-gray-500 line-clamp-3">{{ Str::limit(strip_tags($article->content), 150) }}</p>
                                @if($article->author)
                                    <div class="flex items-center gap-2 mt-4 pt-4 border-t border-gray-100">
                                        <div class="w-7 h-7 bg-[#1e40af] rounded-full flex items-center justify-center">
                                            <span class="text-[10px] font-bold text-white">{{ strtoupper(substr($article->author, 0, 2)) }}</span>
                                        </div>
                                        <span class="text-xs text-gray-400">{{ $article->author }}</span>
                                    </div>
                                @endif
                            </div>
                        </article>
                    @endforeach
                </div>
            @else
                <div class="text-center py-12 bg-gray-50 rounded-2xl">
                    <svg class="w-12 h-12 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
                    <p class="text-gray-500">Informação ainda não cadastrada.</p>
                </div>
            @endif
        </div>
    </section>

@endsection
