@extends('layouts.admin')

@section('page-title', isset($article) ? 'Editar Notícia' : 'Nova Notícia')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">
    <!-- Header -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">{{ isset($article) ? 'Editar Notícia' : 'Nova Notícia' }}</h1>
            <p class="text-gray-500 mt-1">{{ isset($article) ? 'Atualizar conteúdo da notícia' : 'Criar nova notícia' }}</p>
        </div>
        <a href="{{ route('admin.news.index') }}"
           class="inline-flex items-center px-4 py-2.5 border border-gray-300 text-gray-700 text-sm font-medium rounded-lg hover:bg-gray-50 transition-colors">
            <i data-lucide="arrow-left" class="w-4 h-4 mr-2"></i>
            Voltar
        </a>
    </div>

    <!-- Form -->
    <form action="{{ isset($article) ? route('admin.news.update', $article) : route('admin.news.store') }}"
          method="POST"
          enctype="multipart/form-data"
          class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 space-y-6">
        @csrf
        @if(isset($article))
            @method('PUT')
        @endif

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Title -->
            <div class="md:col-span-2">
                <label for="title" class="block text-sm font-medium text-gray-700 mb-1.5">Título *</label>
                <input type="text" name="title" id="title" value="{{ old('title', $article->title ?? '') }}" required
                       class="block w-full px-3 py-2.5 border border-gray-300 rounded-lg text-gray-900 text-sm focus:ring-2 focus:ring-[#1e40af] focus:border-[#1e40af]">
                @error('title') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>

            <!-- Slug -->
            <div>
                <label for="slug" class="block text-sm font-medium text-gray-700 mb-1.5">Slug</label>
                <input type="text" name="slug" id="slug" value="{{ old('slug', $article->slug ?? '') }}"
                       class="block w-full px-3 py-2.5 border border-gray-300 rounded-lg text-gray-900 text-sm font-mono focus:ring-2 focus:ring-[#1e40af] focus:border-[#1e40af]">
                @error('slug') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>

            <!-- Author -->
            <div>
                <label for="author" class="block text-sm font-medium text-gray-700 mb-1.5">Autor</label>
                <input type="text" name="author" id="author" value="{{ old('author', $article->author ?? '') }}"
                       class="block w-full px-3 py-2.5 border border-gray-300 rounded-lg text-gray-900 text-sm focus:ring-2 focus:ring-[#1e40af] focus:border-[#1e40af]">
                @error('author') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>

            <!-- Category -->
            <div>
                <label for="category" class="block text-sm font-medium text-gray-700 mb-1.5">Categoria</label>
                <input type="text" name="category" id="category" value="{{ old('category', $article->category ?? '') }}"
                       placeholder="Ex: Equipa Principal, Formação, Eventos"
                       class="block w-full px-3 py-2.5 border border-gray-300 rounded-lg text-gray-900 text-sm focus:ring-2 focus:ring-[#1e40af] focus:border-[#1e40af]">
                @error('category') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>

            <!-- Image -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Imagem de Capa</label>
                <input type="file" name="image" accept="image/*"
                       class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-[#1e40af] hover:file:bg-blue-100">
                @if(isset($article) && $article->image)
                    <div class="mt-2">
                        <img src="{{ asset('storage/' . $article->image) }}" class="w-32 h-20 rounded-lg object-cover" alt="">
                    </div>
                @endif
                @error('image') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>

            <!-- Published At -->
            <div>
                <label for="published_at" class="block text-sm font-medium text-gray-700 mb-1.5">Data de Publicação</label>
                <input type="datetime-local" name="published_at" id="published_at"
                       value="{{ old('published_at', isset($article) && $article->published_at ? $article->published_at->format('Y-m-d\TH:i') : '') }}"
                       class="block w-full px-3 py-2.5 border border-gray-300 rounded-lg text-gray-900 text-sm focus:ring-2 focus:ring-[#1e40af] focus:border-[#1e40af]">
                @error('published_at') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>
        </div>

        <!-- Content -->
        <div>
            <label for="content" class="block text-sm font-medium text-gray-700 mb-1.5">Conteúdo *</label>
            <textarea name="content" id="content" rows="12" required
                      class="block w-full px-3 py-2.5 border border-gray-300 rounded-lg text-gray-900 text-sm focus:ring-2 focus:ring-[#1e40af] focus:border-[#1e40af]">{{ old('content', $article->content ?? '') }}</textarea>
            <p class="mt-1 text-xs text-gray-400">Suporta HTML básico. Use &lt;p&gt;, &lt;h2&gt;, &lt;h3&gt;, &lt;strong&gt;, &lt;em&gt;, &lt;a&gt;, &lt;img&gt;, &lt;ul&gt;, &lt;ol&gt;, &lt;li&gt;.</p>
            @error('content') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
        </div>

        <!-- Published -->
        <div class="flex items-center">
            <input type="hidden" name="is_published" value="0">
            <input type="checkbox" name="is_published" id="is_published" value="1"
                   {{ old('is_published', $article->is_published ?? 0) ? 'checked' : '' }}
                   class="w-4 h-4 text-[#1e40af] border-gray-300 rounded focus:ring-[#1e40af]">
            <label for="is_published" class="ml-2 text-sm text-gray-700">Publicar imediatamente</label>
        </div>

        <!-- Submit -->
        <div class="flex items-center justify-end space-x-3 pt-4 border-t border-gray-200">
            <a href="{{ route('admin.news.index') }}" class="px-5 py-2.5 border border-gray-300 text-gray-700 text-sm font-medium rounded-lg hover:bg-gray-50 transition-colors">Cancelar</a>
            <button type="submit" class="px-5 py-2.5 bg-[#1e40af] text-white text-sm font-semibold rounded-lg hover:bg-[#1e3a8a] transition-colors shadow-sm">
                {{ isset($article) ? 'Atualizar' : 'Criar Notícia' }}
            </button>
        </div>
    </form>
</div>
@endsection
