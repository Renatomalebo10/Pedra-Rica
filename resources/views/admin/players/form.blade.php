@extends('layouts.admin')

@section('page-title', isset($player) ? 'Editar Jogador' : 'Novo Jogador')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">
    <!-- Header -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">{{ isset($player) ? 'Editar Jogador' : 'Novo Jogador' }}</h1>
            <p class="text-gray-500 mt-1">{{ isset($player) ? 'Atualizar dados do jogador' : 'Adicionar um novo jogador ao elenco' }}</p>
        </div>
        <a href="{{ route('admin.players.index') }}"
           class="inline-flex items-center px-4 py-2.5 border border-gray-300 text-gray-700 text-sm font-medium rounded-lg
                  hover:bg-gray-50 transition-colors">
            <i data-lucide="arrow-left" class="w-4 h-4 mr-2"></i>
            Voltar
        </a>
    </div>

    <!-- Form -->
    <form action="{{ isset($player) ? route('admin.players.update', $player) : route('admin.players.store') }}"
          method="POST"
          enctype="multipart/form-data"
          class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 space-y-6">
        @csrf
        @if(isset($player))
            @method('PUT')
        @endif

        <!-- Photo preview + upload -->
        <div class="flex items-start space-x-6" x-data="{ preview: '{{ isset($player) && $player->photo ? asset('storage/' . $player->photo) : '' }}' }">
            <div class="w-32 h-32 rounded-xl border-2 border-dashed border-gray-300 overflow-hidden bg-gray-50 flex items-center justify-center">
                <img x-show="preview" :src="preview" class="w-full h-full object-cover" alt="Preview">
                <div x-show="!preview" class="text-center">
                    <i data-lucide="camera" class="w-8 h-8 text-gray-300 mx-auto"></i>
                    <span class="text-xs text-gray-400 mt-1 block">Foto</span>
                </div>
            </div>
            <div class="flex-1">
                <label class="block text-sm font-medium text-gray-700 mb-2">Foto do jogador</label>
                <input type="file" name="photo" accept="image/*"
                       @change="const file = $event.target.files[0]; if (file) { const reader = new FileReader(); reader.onload = (e) => { preview = e.target.result; }; reader.readAsDataURL(file); }"
                       class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-[#1e40af] hover:file:bg-blue-100 transition-colors">
                <p class="mt-1 text-xs text-gray-400">JPG, PNG ou WEBP. Max 10MB.</p>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Name -->
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 mb-1.5">Nome *</label>
                <input type="text" name="name" id="name" value="{{ old('name', $player->name ?? '') }}" required
                       class="block w-full px-3 py-2.5 border border-gray-300 rounded-lg text-gray-900 text-sm
                              focus:ring-2 focus:ring-[#1e40af] focus:border-[#1e40af]">
                @error('name')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Number -->
            <div>
                <label for="number" class="block text-sm font-medium text-gray-700 mb-1.5">Número da Camisola</label>
                <input type="number" name="number" id="number" value="{{ old('number', $player->number ?? '') }}" min="0" max="99"
                       class="block w-full px-3 py-2.5 border border-gray-300 rounded-lg text-gray-900 text-sm
                              focus:ring-2 focus:ring-[#1e40af] focus:border-[#1e40af]">
                @error('number')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Position -->
            <div>
                <label for="position" class="block text-sm font-medium text-gray-700 mb-1.5">Posição</label>
                <select name="position" id="position"
                        class="block w-full px-3 py-2.5 border border-gray-300 rounded-lg text-gray-900 text-sm
                               focus:ring-2 focus:ring-[#1e40af] focus:border-[#1e40af]">
                    <option value="">Selecionar posição</option>
                    @foreach(['Guarda-Redes', 'Fixo', 'Ala', 'Pivô'] as $pos)
                        <option value="{{ $pos }}" {{ old('position', $player->position ?? '') === $pos ? 'selected' : '' }}>{{ $pos }}</option>
                    @endforeach
                </select>
                @error('position')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Goals -->
            <div>
                <label for="goals" class="block text-sm font-medium text-gray-700 mb-1.5">Golos</label>
                <input type="number" name="goals" id="goals" value="{{ old('goals', $player->goals ?? 0) }}" min="0"
                       class="block w-full px-3 py-2.5 border border-gray-300 rounded-lg text-gray-900 text-sm
                              focus:ring-2 focus:ring-[#1e40af] focus:border-[#1e40af]">
                @error('goals')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Assists -->
            <div>
                <label for="assists" class="block text-sm font-medium text-gray-700 mb-1.5">Assistências</label>
                <input type="number" name="assists" id="assists" value="{{ old('assists', $player->assists ?? 0) }}" min="0"
                       class="block w-full px-3 py-2.5 border border-gray-300 rounded-lg text-gray-900 text-sm
                              focus:ring-2 focus:ring-[#1e40af] focus:border-[#1e40af]">
                @error('assists')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Yellow Cards -->
            <div>
                <label for="yellow_cards" class="block text-sm font-medium text-gray-700 mb-1.5">Cartões Amarelos</label>
                <input type="number" name="yellow_cards" id="yellow_cards" value="{{ old('yellow_cards', $player->yellow_cards ?? 0) }}" min="0"
                       class="block w-full px-3 py-2.5 border border-gray-300 rounded-lg text-gray-900 text-sm
                              focus:ring-2 focus:ring-[#1e40af] focus:border-[#1e40af]">
                @error('yellow_cards')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Red Cards -->
            <div>
                <label for="red_cards" class="block text-sm font-medium text-gray-700 mb-1.5">Cartões Vermelhos</label>
                <input type="number" name="red_cards" id="red_cards" value="{{ old('red_cards', $player->red_cards ?? 0) }}" min="0"
                       class="block w-full px-3 py-2.5 border border-gray-300 rounded-lg text-gray-900 text-sm
                              focus:ring-2 focus:ring-[#1e40af] focus:border-[#1e40af]">
                @error('red_cards')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Matches Played -->
            <div>
                <label for="matches_played" class="block text-sm font-medium text-gray-700 mb-1.5">Jogos Disputados</label>
                <input type="number" name="matches_played" id="matches_played" value="{{ old('matches_played', $player->matches_played ?? 0) }}" min="0"
                       class="block w-full px-3 py-2.5 border border-gray-300 rounded-lg text-gray-900 text-sm
                              focus:ring-2 focus:ring-[#1e40af] focus:border-[#1e40af]">
                @error('matches_played')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- Biography -->
        <div>
            <label for="biography" class="block text-sm font-medium text-gray-700 mb-1.5">Biografia</label>
            <textarea name="biography" id="biography" rows="4"
                      class="block w-full px-3 py-2.5 border border-gray-300 rounded-lg text-gray-900 text-sm
                             focus:ring-2 focus:ring-[#1e40af] focus:border-[#1e40af]">{{ old('biography', $player->biography ?? '') }}</textarea>
            @error('biography')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Active status -->
        <div class="flex items-center">
            <input type="hidden" name="is_active" value="0">
            <input type="checkbox" name="is_active" id="is_active" value="1"
                   {{ old('is_active', $player->is_active ?? 1) ? 'checked' : '' }}
                   class="w-4 h-4 text-[#1e40af] border-gray-300 rounded focus:ring-[#1e40af]">
            <label for="is_active" class="ml-2 text-sm text-gray-700">Jogador ativo</label>
        </div>

        <!-- Submit -->
        <div class="flex items-center justify-end space-x-3 pt-4 border-t border-gray-200">
            <a href="{{ route('admin.players.index') }}"
               class="px-5 py-2.5 border border-gray-300 text-gray-700 text-sm font-medium rounded-lg hover:bg-gray-50 transition-colors">
                Cancelar
            </a>
            <button type="submit"
                    class="px-5 py-2.5 bg-[#1e40af] text-white text-sm font-semibold rounded-lg
                           hover:bg-[#1e3a8a] transition-colors shadow-sm">
                {{ isset($player) ? 'Atualizar' : 'Criar Jogador' }}
            </button>
        </div>
    </form>
</div>
@endsection
