@extends('layouts.admin')

@section('page-title', isset($competition) ? 'Editar Competição' : 'Nova Competição')

@section('content')
<div class="max-w-2xl mx-auto space-y-6">
    <!-- Header -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">{{ isset($competition) ? 'Editar Competição' : 'Nova Competição' }}</h1>
            <p class="text-gray-500 mt-1">{{ isset($competition) ? 'Atualizar dados da competição' : 'Adicionar nova competição' }}</p>
        </div>
        <a href="{{ route('admin.competitions.index') }}"
           class="inline-flex items-center px-4 py-2.5 border border-gray-300 text-gray-700 text-sm font-medium rounded-lg hover:bg-gray-50 transition-colors">
            <i data-lucide="arrow-left" class="w-4 h-4 mr-2"></i>
            Voltar
        </a>
    </div>

    <!-- Form -->
    <form action="{{ isset($competition) ? route('admin.competitions.update', $competition) : route('admin.competitions.store') }}"
          method="POST"
          class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 space-y-6">
        @csrf
        @if(isset($competition))
            @method('PUT')
        @endif

        <!-- Name -->
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700 mb-1.5">Nome *</label>
            <input type="text" name="name" id="name" value="{{ old('name', $competition->name ?? '') }}" required
                   class="block w-full px-3 py-2.5 border border-gray-300 rounded-lg text-gray-900 text-sm focus:ring-2 focus:ring-[#1e40af] focus:border-[#1e40af]">
            @error('name') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
        </div>

        <!-- Description -->
        <div>
            <label for="description" class="block text-sm font-medium text-gray-700 mb-1.5">Descrição</label>
            <textarea name="description" id="description" rows="4"
                      class="block w-full px-3 py-2.5 border border-gray-300 rounded-lg text-gray-900 text-sm focus:ring-2 focus:ring-[#1e40af] focus:border-[#1e40af]">{{ old('description', $competition->description ?? '') }}</textarea>
            @error('description') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
        </div>

        <!-- Submit -->
        <div class="flex items-center justify-end space-x-3 pt-4 border-t border-gray-200">
            <a href="{{ route('admin.competitions.index') }}" class="px-5 py-2.5 border border-gray-300 text-gray-700 text-sm font-medium rounded-lg hover:bg-gray-50 transition-colors">Cancelar</a>
            <button type="submit" class="px-5 py-2.5 bg-[#1e40af] text-white text-sm font-semibold rounded-lg hover:bg-[#1e3a8a] transition-colors shadow-sm">
                {{ isset($competition) ? 'Atualizar' : 'Criar Competição' }}
            </button>
        </div>
    </form>
</div>
@endsection
