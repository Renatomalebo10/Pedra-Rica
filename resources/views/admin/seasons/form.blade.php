@extends('layouts.admin')

@section('page-title', isset($season) ? 'Editar Temporada' : 'Nova Temporada')

@section('content')
<div class="max-w-2xl mx-auto space-y-6">
    <!-- Header -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">{{ isset($season) ? 'Editar Temporada' : 'Nova Temporada' }}</h1>
            <p class="text-gray-500 mt-1">{{ isset($season) ? 'Atualizar dados da temporada' : 'Criar nova temporada desportiva' }}</p>
        </div>
        <a href="{{ route('admin.seasons.index') }}"
           class="inline-flex items-center px-4 py-2.5 border border-gray-300 text-gray-700 text-sm font-medium rounded-lg hover:bg-gray-50 transition-colors">
            <i data-lucide="arrow-left" class="w-4 h-4 mr-2"></i>
            Voltar
        </a>
    </div>

    <!-- Form -->
    <form action="{{ isset($season) ? route('admin.seasons.update', $season) : route('admin.seasons.store') }}"
          method="POST"
          class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 space-y-6">
        @csrf
        @if(isset($season))
            @method('PUT')
        @endif

        <!-- Name -->
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700 mb-1.5">Nome da Temporada *</label>
            <input type="text" name="name" id="name" value="{{ old('name', $season->name ?? '') }}" required
                   placeholder="Ex: 2024/2025"
                   class="block w-full px-3 py-2.5 border border-gray-300 rounded-lg text-gray-900 text-sm focus:ring-2 focus:ring-[#1e40af] focus:border-[#1e40af]">
            @error('name') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
        </div>

        <!-- Current Season -->
        <div class="flex items-center">
            <input type="hidden" name="is_current" value="0">
            <input type="checkbox" name="is_current" id="is_current" value="1"
                   {{ old('is_current', $season->is_current ?? 0) ? 'checked' : '' }}
                   class="w-4 h-4 text-[#1e40af] border-gray-300 rounded focus:ring-[#1e40af]">
            <label for="is_current" class="ml-2 text-sm text-gray-700">Temporada atual</label>
        </div>
        <p class="text-xs text-gray-400 -mt-4 ml-6">Marcar como temporada atual desactivará a marcação na temporada anterior.</p>

        <!-- Submit -->
        <div class="flex items-center justify-end space-x-3 pt-4 border-t border-gray-200">
            <a href="{{ route('admin.seasons.index') }}" class="px-5 py-2.5 border border-gray-300 text-gray-700 text-sm font-medium rounded-lg hover:bg-gray-50 transition-colors">Cancelar</a>
            <button type="submit" class="px-5 py-2.5 bg-[#1e40af] text-white text-sm font-semibold rounded-lg hover:bg-[#1e3a8a] transition-colors shadow-sm">
                {{ isset($season) ? 'Atualizar' : 'Criar Temporada' }}
            </button>
        </div>
    </form>
</div>
@endsection
