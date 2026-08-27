@extends('layouts.admin')

@section('page-title', isset($item) ? 'Editar Imagem' : 'Nova Imagem')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">
    <!-- Header -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">{{ isset($item) ? 'Editar Imagem' : 'Nova Imagem' }}</h1>
            <p class="text-gray-500 mt-1">{{ isset($item) ? 'Atualizar dados da imagem' : 'Adicionar imagem à galeria' }}</p>
        </div>
        <a href="{{ route('admin.gallery.index') }}"
           class="inline-flex items-center px-4 py-2.5 border border-gray-300 text-gray-700 text-sm font-medium rounded-lg hover:bg-gray-50 transition-colors">
            <i data-lucide="arrow-left" class="w-4 h-4 mr-2"></i>
            Voltar
        </a>
    </div>

    <!-- Form -->
    <form action="{{ isset($item) ? route('admin.gallery.update', $item) : route('admin.gallery.store') }}"
          method="POST"
          enctype="multipart/form-data"
          class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 space-y-6">
        @csrf
        @if(isset($item))
            @method('PUT')
        @endif

        <!-- Image preview -->
        <div x-data="{ preview: '{{ isset($item) && $item->image_path ? asset('storage/' . $item->image_path) : '' }}' }">
            @if(isset($item) && $item->image_path)
                <div class="mb-4">
                    <img :src="preview" class="w-full max-h-64 object-contain rounded-xl bg-gray-100" alt="">
                </div>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Title -->
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-1.5">Título *</label>
                    <input type="text" name="title" id="title" value="{{ old('title', $item->title ?? '') }}" required
                           class="block w-full px-3 py-2.5 border border-gray-300 rounded-lg text-gray-900 text-sm focus:ring-2 focus:ring-[#1e40af] focus:border-[#1e40af]">
                    @error('title') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>

                <!-- Category -->
                <div>
                    <label for="category_id" class="block text-sm font-medium text-gray-700 mb-1.5">Categoria</label>
                    <select name="category_id" id="category_id"
                            class="block w-full px-3 py-2.5 border border-gray-300 rounded-lg text-gray-900 text-sm focus:ring-2 focus:ring-[#1e40af] focus:border-[#1e40af]">
                        <option value="">Selecionar categoria</option>
                        @foreach($categories ?? [] as $category)
                            <option value="{{ $category->id }}" {{ old('category_id', $item->category_id ?? '') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>

                <!-- Image -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Imagem *</label>
                    <input type="file" name="image" accept="image/*"
                           @change="const file = $event.target.files[0]; if(file) { const r = new FileReader(); r.onload = e => preview = e.target.result; r.readAsDataURL(file); }"
                           class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-[#1e40af] hover:file:bg-blue-100">
                    <p class="mt-1 text-xs text-gray-400">JPG, PNG ou WEBP. Max 5MB.</p>
                    @error('image') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>

                <!-- Alt Text -->
                <div class="md:col-span-2">
                    <label for="alt_text" class="block text-sm font-medium text-gray-700 mb-1.5">Texto Alternativo (Acessibilidade)</label>
                    <input type="text" name="alt_text" id="alt_text" value="{{ old('alt_text', $item->alt_text ?? '') }}"
                           placeholder="Descrição da imagem para acessibilidade"
                           class="block w-full px-3 py-2.5 border border-gray-300 rounded-lg text-gray-900 text-sm focus:ring-2 focus:ring-[#1e40af] focus:border-[#1e40af]">
                    @error('alt_text') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>
            </div>
        </div>

        <!-- Submit -->
        <div class="flex items-center justify-end space-x-3 pt-4 border-t border-gray-200">
            <a href="{{ route('admin.gallery.index') }}" class="px-5 py-2.5 border border-gray-300 text-gray-700 text-sm font-medium rounded-lg hover:bg-gray-50 transition-colors">Cancelar</a>
            <button type="submit" class="px-5 py-2.5 bg-[#1e40af] text-white text-sm font-semibold rounded-lg hover:bg-[#1e3a8a] transition-colors shadow-sm">
                {{ isset($item) ? 'Atualizar' : 'Adicionar Imagem' }}
            </button>
        </div>
    </form>
</div>
@endsection
