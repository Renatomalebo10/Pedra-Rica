@extends('layouts.admin')

@section('page-title', 'Detalhes da Imagem')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">
    <!-- Header -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Detalhes da Imagem</h1>
            <p class="text-gray-500 mt-1">{{ $image->title }}</p>
        </div>
        <div class="flex items-center space-x-3">
            <a href="{{ route('admin.gallery.edit', $image) }}"
               class="inline-flex items-center px-4 py-2.5 bg-[#1e40af] text-white text-sm font-semibold rounded-lg hover:bg-[#1e3a8a] transition-colors shadow-sm">
                <i data-lucide="pencil" class="w-4 h-4 mr-2"></i>
                Editar
            </a>
            <a href="{{ route('admin.gallery.index') }}"
               class="inline-flex items-center px-4 py-2.5 border border-gray-300 text-gray-700 text-sm font-medium rounded-lg hover:bg-gray-50 transition-colors">
                <i data-lucide="arrow-left" class="w-4 h-4 mr-2"></i>
                Voltar
            </a>
        </div>
    </div>

    <!-- Image Preview -->
    @if($image->image_path)
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <img src="{{ asset('storage/' . $image->image_path) }}" class="w-full max-h-96 object-contain rounded-lg bg-gray-100" alt="{{ $image->alt_text ?? $image->title }}">
        </div>
    @endif

    <!-- Details -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 space-y-6">
        <h3 class="text-lg font-semibold text-gray-900">Informações da Imagem</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <p class="text-sm font-medium text-gray-700">Título</p>
                <p class="text-sm text-gray-900 mt-1">{{ $image->title }}</p>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-700">Categoria</p>
                <p class="text-sm text-gray-900 mt-1">{{ $image->category?->name ?? '—' }}</p>
            </div>
            <div class="md:col-span-2">
                <p class="text-sm font-medium text-gray-700">Texto Alternativo</p>
                <p class="text-sm text-gray-900 mt-1">{{ $image->alt_text ?? '—' }}</p>
            </div>
        </div>
    </div>
</div>
@endsection
