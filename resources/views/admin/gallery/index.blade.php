@extends('layouts.admin')

@section('page-title', 'Galeria')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Galeria</h1>
            <p class="text-gray-500 mt-1">Gerir imagens da galeria</p>
        </div>
        <a href="{{ route('admin.gallery.create') }}"
           class="inline-flex items-center px-4 py-2.5 bg-[#1e40af] text-white text-sm font-semibold rounded-lg hover:bg-[#1e3a8a] transition-colors shadow-sm">
            <i data-lucide="plus" class="w-4 h-4 mr-2"></i>
            Nova Imagem
        </a>
    </div>

    <!-- Category Filter -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-4">
        <form method="GET" action="{{ route('admin.gallery.index') }}" class="flex gap-3">
            <select name="category_id" class="px-3 py-2.5 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-[#1e40af] focus:border-[#1e40af]">
                <option value="">Todas as categorias</option>
                @foreach($categories ?? [] as $category)
                    <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            <button type="submit" class="px-4 py-2.5 bg-gray-100 text-gray-700 text-sm font-medium rounded-lg hover:bg-gray-200 transition-colors">
                Filtrar
            </button>
        </form>
    </div>

    <!-- Gallery Grid -->
    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4">
        @forelse($images as $item)
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden group">
                <div class="aspect-square bg-gray-100 relative overflow-hidden">
                    @if($item->image_path)
                        <img src="{{ asset('storage/' . $item->image_path) }}" alt="{{ $item->alt_text ?? $item->title }}"
                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                    @else
                        <div class="w-full h-full flex items-center justify-center">
                            <i data-lucide="image" class="w-10 h-10 text-gray-300"></i>
                        </div>
                    @endif

                    <!-- Hover overlay -->
                    <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center space-x-2">
                        <a href="{{ route('admin.gallery.edit', $item) }}"
                           class="p-2 bg-white rounded-lg text-gray-700 hover:text-[#1e40af] transition-colors">
                            <i data-lucide="pencil" class="w-4 h-4"></i>
                        </a>
                        <form action="{{ route('admin.gallery.destroy', $item) }}" method="POST"
                              x-data="{ showDelete: false }">
                            @csrf
                            @method('DELETE')
                            <div x-show="showDelete" x-cloak class="fixed inset-0 bg-black/50 flex items-center justify-center z-50 p-4" x-transition>
                                <div class="bg-white rounded-xl shadow-xl p-6 max-w-sm w-full" @click.away="showDelete = false">
                                    <div class="text-center">
                                        <div class="w-12 h-12 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                            <i data-lucide="alert-triangle" class="w-6 h-6 text-red-600"></i>
                                        </div>
                                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Eliminar imagem?</h3>
                                        <p class="text-gray-500 text-sm mb-6">Esta ação não pode ser desfeita.</p>
                                        <div class="flex space-x-3">
                                            <button type="button" @click="showDelete = false" class="flex-1 px-4 py-2 border border-gray-300 text-gray-700 rounded-lg text-sm font-medium hover:bg-gray-50">Cancelar</button>
                                            <button type="submit" class="flex-1 px-4 py-2 bg-red-600 text-white rounded-lg text-sm font-medium hover:bg-red-700">Eliminar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="button" @click="showDelete = true"
                                    class="p-2 bg-white rounded-lg text-gray-700 hover:text-red-600 transition-colors">
                                <i data-lucide="trash-2" class="w-4 h-4"></i>
                            </button>
                        </form>
                    </div>
                </div>
                <div class="p-3">
                    <h3 class="text-sm font-medium text-gray-900 truncate">{{ $item->title }}</h3>
                    <p class="text-xs text-gray-500 mt-0.5">{{ $item->category->name ?? 'Sem categoria' }}</p>
                </div>
            </div>
        @empty
            <div class="col-span-full py-12 text-center">
                <i data-lucide="image" class="w-12 h-12 text-gray-300 mx-auto mb-3"></i>
                <p class="text-gray-500">Nenhuma imagem encontrada</p>
                <a href="{{ route('admin.gallery.create') }}" class="mt-2 inline-flex items-center text-sm text-[#1e40af] hover:underline">
                    <i data-lucide="plus" class="w-4 h-4 mr-1"></i> Adicionar primeira imagem
                </a>
            </div>
        @endforelse
    </div>

    @if(method_exists($images, 'links') && $images->hasPages())
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 px-6 py-4">
            {{ $images->links() }}
        </div>
    @endif
</div>
@endsection
