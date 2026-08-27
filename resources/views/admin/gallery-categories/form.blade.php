@extends('layouts.admin')

@section('page-title', isset($category) ? 'Editar Categoria' : 'Nova Categoria')

@section('content')
<div class="max-w-2xl mx-auto space-y-6">
    <!-- Header -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">{{ isset($category) ? 'Editar Categoria' : 'Nova Categoria' }}</h1>
            <p class="text-gray-500 mt-1">{{ isset($category) ? 'Atualizar dados da categoria' : 'Criar nova categoria de galeria' }}</p>
        </div>
        <a href="{{ route('admin.gallery-categories.index') }}"
           class="inline-flex items-center px-4 py-2.5 border border-gray-300 text-gray-700 text-sm font-medium rounded-lg hover:bg-gray-50 transition-colors">
            <i data-lucide="arrow-left" class="w-4 h-4 mr-2"></i>
            Voltar
        </a>
    </div>

    <!-- Form -->
    <form action="{{ isset($category) ? route('admin.gallery-categories.update', $category) : route('admin.gallery-categories.store') }}"
          method="POST"
          class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 space-y-6">
        @csrf
        @if(isset($category))
            @method('PUT')
        @endif

        <!-- Name -->
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700 mb-1.5">Nome *</label>
            <input type="text" name="name" id="name" value="{{ old('name', $category->name ?? '') }}" required
                   x-data="{ slug: '{{ old('slug', $category->slug ?? '') }}' }"
                   @input="
                       slug = $event.target.value
                           .toLowerCase()
                           .normalize('NFD').replace(/[\u0300-\u036f]/g, '')
                           .replace(/[^a-z0-9\s-]/g, '')
                           .replace(/\s+/g, '-')
                           .replace(/-+/g, '-');
                       $dispatch('update-slug', slug);
                   "
                   class="block w-full px-3 py-2.5 border border-gray-300 rounded-lg text-gray-900 text-sm focus:ring-2 focus:ring-[#1e40af] focus:border-[#1e40af]">
            @error('name') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
        </div>

        <!-- Slug -->
        <div>
            <label for="slug" class="block text-sm font-medium text-gray-700 mb-1.5">Slug</label>
            <div class="flex items-center">
                <span class="text-sm text-gray-400 mr-1">/</span>
                <input type="text" name="slug" id="slug" value="{{ old('slug', $category->slug ?? '') }}"
                       x-data
                       @update-slug.window="$el.value = $event.detail"
                       class="flex-1 px-3 py-2.5 border border-gray-300 rounded-lg text-gray-900 text-sm font-mono
                              focus:ring-2 focus:ring-[#1e40af] focus:border-[#1e40af]">
            </div>
            <p class="mt-1 text-xs text-gray-400">Gerado automaticamente a partir do nome. Pode ser editado manualmente.</p>
            @error('slug') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
        </div>

        <!-- Submit -->
        <div class="flex items-center justify-end space-x-3 pt-4 border-t border-gray-200">
            <a href="{{ route('admin.gallery-categories.index') }}" class="px-5 py-2.5 border border-gray-300 text-gray-700 text-sm font-medium rounded-lg hover:bg-gray-50 transition-colors">Cancelar</a>
            <button type="submit" class="px-5 py-2.5 bg-[#1e40af] text-white text-sm font-semibold rounded-lg hover:bg-[#1e3a8a] transition-colors shadow-sm">
                {{ isset($category) ? 'Atualizar' : 'Criar Categoria' }}
            </button>
        </div>
    </form>
</div>
@endsection
