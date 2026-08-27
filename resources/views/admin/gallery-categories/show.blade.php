@extends('layouts.admin')

@section('page-title', 'Detalhes da Categoria')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">
    <!-- Header -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Detalhes da Categoria</h1>
            <p class="text-gray-500 mt-1">{{ $category->name }}</p>
        </div>
        <div class="flex items-center space-x-3">
            <a href="{{ route('admin.gallery-categories.edit', $category) }}"
               class="inline-flex items-center px-4 py-2.5 bg-[#1e40af] text-white text-sm font-semibold rounded-lg hover:bg-[#1e3a8a] transition-colors shadow-sm">
                <i data-lucide="pencil" class="w-4 h-4 mr-2"></i>
                Editar
            </a>
            <a href="{{ route('admin.gallery-categories.index') }}"
               class="inline-flex items-center px-4 py-2.5 border border-gray-300 text-gray-700 text-sm font-medium rounded-lg hover:bg-gray-50 transition-colors">
                <i data-lucide="arrow-left" class="w-4 h-4 mr-2"></i>
                Voltar
            </a>
        </div>
    </div>

    <!-- Category Info -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 space-y-6">
        <h2 class="text-xl font-bold text-gray-900">{{ $category->name }}</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <p class="text-sm font-medium text-gray-700">Nome</p>
                <p class="text-sm text-gray-900 mt-1">{{ $category->name }}</p>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-700">Slug</p>
                <p class="text-sm text-gray-900 font-mono mt-1">{{ $category->slug }}</p>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-700">Total de Imagens</p>
                <p class="text-sm text-gray-900 mt-1">{{ $category->images->count() }}</p>
            </div>
        </div>
    </div>

    <!-- Images -->
    @if($category->images->count())
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Imagens nesta Categoria</h3>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                @foreach($category->images as $image)
                    <div class="aspect-square rounded-lg overflow-hidden bg-gray-100">
                        @if($image->image_path)
                            <img src="{{ asset('storage/' . $image->image_path) }}" class="w-full h-full object-cover" alt="{{ $image->alt_text ?? $image->title }}">
                        @else
                            <div class="w-full h-full flex items-center justify-center">
                                <i data-lucide="image" class="w-8 h-8 text-gray-300"></i>
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    @endif
</div>
@endsection
