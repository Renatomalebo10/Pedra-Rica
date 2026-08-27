@extends('layouts.admin')

@section('page-title', 'Detalhes da Notícia')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">
    <!-- Header -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Detalhes da Notícia</h1>
            <p class="text-gray-500 mt-1">{{ $news->title }}</p>
        </div>
        <div class="flex items-center space-x-3">
            <a href="{{ route('admin.news.edit', $news) }}"
               class="inline-flex items-center px-4 py-2.5 bg-[#1e40af] text-white text-sm font-semibold rounded-lg hover:bg-[#1e3a8a] transition-colors shadow-sm">
                <i data-lucide="pencil" class="w-4 h-4 mr-2"></i>
                Editar
            </a>
            <a href="{{ route('admin.news.index') }}"
               class="inline-flex items-center px-4 py-2.5 border border-gray-300 text-gray-700 text-sm font-medium rounded-lg hover:bg-gray-50 transition-colors">
                <i data-lucide="arrow-left" class="w-4 h-4 mr-2"></i>
                Voltar
            </a>
        </div>
    </div>

    <!-- Cover Image -->
    @if($news->image)
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <img src="{{ asset('storage/' . $news->image) }}" class="w-full max-h-64 object-cover rounded-lg" alt="{{ $news->title }}">
        </div>
    @endif

    <!-- Article Info -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 space-y-6">
        <div class="flex items-center space-x-3 mb-2">
            <h2 class="text-xl font-bold text-gray-900">{{ $news->title }}</h2>
            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $news->is_published ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                {{ $news->is_published ? 'Publicado' : 'Rascunho' }}
            </span>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <p class="text-sm font-medium text-gray-700">Título</p>
                <p class="text-sm text-gray-900 mt-1">{{ $news->title }}</p>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-700">Slug</p>
                <p class="text-sm text-gray-900 font-mono mt-1">{{ $news->slug }}</p>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-700">Autor</p>
                <p class="text-sm text-gray-900 mt-1">{{ $news->author ?? '—' }}</p>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-700">Categoria</p>
                <p class="text-sm text-gray-900 mt-1">{{ $news->category ?? '—' }}</p>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-700">Estado</p>
                <p class="mt-1">
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $news->is_published ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                        {{ $news->is_published ? 'Publicado' : 'Rascunho' }}
                    </span>
                </p>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-700">Data de Publicação</p>
                <p class="text-sm text-gray-900 mt-1">{{ $news->published_at?->format('d/m/Y H:i') ?? '—' }}</p>
            </div>
        </div>

        <!-- Content -->
        @if($news->content)
            <div class="pt-4 border-t border-gray-200">
                <h3 class="text-sm font-medium text-gray-700 mb-2">Conteúdo</h3>
                <div class="text-sm text-gray-600 prose prose-sm max-w-none">{!! $news->content !!}</div>
            </div>
        @endif
    </div>
</div>
@endsection
