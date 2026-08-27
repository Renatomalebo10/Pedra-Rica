@extends('layouts.admin')

@section('page-title', isset($link) ? 'Editar Link' : 'Novo Link')

@section('content')
<div class="max-w-2xl mx-auto space-y-6">
    <!-- Header -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">{{ isset($link) ? 'Editar Link Social' : 'Novo Link Social' }}</h1>
            <p class="text-gray-500 mt-1">{{ isset($link) ? 'Atualizar dados do link' : 'Adicionar rede social' }}</p>
        </div>
        <a href="{{ route('admin.social-links.index') }}"
           class="inline-flex items-center px-4 py-2.5 border border-gray-300 text-gray-700 text-sm font-medium rounded-lg hover:bg-gray-50 transition-colors">
            <i data-lucide="arrow-left" class="w-4 h-4 mr-2"></i>
            Voltar
        </a>
    </div>

    <!-- Form -->
    <form action="{{ isset($link) ? route('admin.social-links.update', $link) : route('admin.social-links.store') }}"
          method="POST"
          class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 space-y-6">
        @csrf
        @if(isset($link))
            @method('PUT')
        @endif

        <!-- Platform -->
        <div>
            <label for="platform" class="block text-sm font-medium text-gray-700 mb-1.5">Plataforma *</label>
            <select name="platform" id="platform" required
                    class="block w-full px-3 py-2.5 border border-gray-300 rounded-lg text-gray-900 text-sm focus:ring-2 focus:ring-[#1e40af] focus:border-[#1e40af]">
                <option value="">Selecionar plataforma</option>
                @foreach(['Facebook', 'Instagram', 'YouTube', 'Twitter', 'TikTok'] as $platform)
                    <option value="{{ $platform }}" {{ old('platform', $link->platform ?? '') === $platform ? 'selected' : '' }}>
                        {{ $platform }}
                    </option>
                @endforeach
            </select>
            @error('platform') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
        </div>

        <!-- URL -->
        <div>
            <label for="url" class="block text-sm font-medium text-gray-700 mb-1.5">URL *</label>
            <input type="url" name="url" id="url" value="{{ old('url', $link->url ?? '') }}" required
                   placeholder="https://..."
                   class="block w-full px-3 py-2.5 border border-gray-300 rounded-lg text-gray-900 text-sm focus:ring-2 focus:ring-[#1e40af] focus:border-[#1e40af]">
            @error('url') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
        </div>

        <!-- Active -->
        <div class="flex items-center">
            <input type="hidden" name="is_active" value="0">
            <input type="checkbox" name="is_active" id="is_active" value="1"
                   {{ old('is_active', $link->is_active ?? 1) ? 'checked' : '' }}
                   class="w-4 h-4 text-[#1e40af] border-gray-300 rounded focus:ring-[#1e40af]">
            <label for="is_active" class="ml-2 text-sm text-gray-700">Link ativo</label>
        </div>

        <!-- Submit -->
        <div class="flex items-center justify-end space-x-3 pt-4 border-t border-gray-200">
            <a href="{{ route('admin.social-links.index') }}" class="px-5 py-2.5 border border-gray-300 text-gray-700 text-sm font-medium rounded-lg hover:bg-gray-50 transition-colors">Cancelar</a>
            <button type="submit" class="px-5 py-2.5 bg-[#1e40af] text-white text-sm font-semibold rounded-lg hover:bg-[#1e3a8a] transition-colors shadow-sm">
                {{ isset($link) ? 'Atualizar' : 'Criar Link' }}
            </button>
        </div>
    </form>
</div>
@endsection
