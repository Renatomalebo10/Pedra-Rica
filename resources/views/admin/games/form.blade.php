@extends('layouts.admin')

@section('page-title', isset($game) ? 'Editar Jogo' : 'Novo Jogo')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">
    <!-- Header -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">{{ isset($game) ? 'Editar Jogo' : 'Novo Jogo' }}</h1>
            <p class="text-gray-500 mt-1">{{ isset($game) ? 'Atualizar dados do jogo' : 'Registar um novo jogo' }}</p>
        </div>
        <a href="{{ route('admin.games.index') }}"
           class="inline-flex items-center px-4 py-2.5 border border-gray-300 text-gray-700 text-sm font-medium rounded-lg hover:bg-gray-50 transition-colors">
            <i data-lucide="arrow-left" class="w-4 h-4 mr-2"></i>
            Voltar
        </a>
    </div>

    <!-- Form -->
    <form action="{{ isset($game) ? route('admin.games.update', $game) : route('admin.games.store') }}"
          method="POST"
          enctype="multipart/form-data"
          class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 space-y-6">
        @csrf
        @if(isset($game))
            @method('PUT')
        @endif

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Opponent -->
            <div>
                <label for="opponent" class="block text-sm font-medium text-gray-700 mb-1.5">Adversário *</label>
                <input type="text" name="opponent" id="opponent" value="{{ old('opponent', $game->opponent ?? '') }}" required
                       class="block w-full px-3 py-2.5 border border-gray-300 rounded-lg text-gray-900 text-sm focus:ring-2 focus:ring-[#1e40af] focus:border-[#1e40af]">
                @error('opponent') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>

            <!-- Opponent Logo -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1.5">Logo do Adversário</label>
                <input type="file" name="opponent_logo" accept="image/*"
                       class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-[#1e40af] hover:file:bg-blue-100">
                @if(isset($game) && $game->opponent_logo)
                    <div class="mt-2">
                        <img src="{{ asset('storage/' . $game->opponent_logo) }}" class="w-10 h-10 rounded-full object-cover" alt="">
                    </div>
                @endif
                @error('opponent_logo') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>

            <!-- Is Home / Away -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1.5">Jogo em Casa ou Fora? *</label>
                <div class="flex gap-4">
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="radio" name="is_home" value="1" {{ old('is_home', $game->is_home ?? '1') == '1' ? 'checked' : '' }}
                               class="w-4 h-4 text-[#1e40af] border-gray-300 focus:ring-[#1e40af]">
                        <span class="text-sm text-gray-700">Em Casa</span>
                    </label>
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="radio" name="is_home" value="0" {{ old('is_home', $game->is_home ?? '1') == '0' ? 'checked' : '' }}
                               class="w-4 h-4 text-[#1e40af] border-gray-300 focus:ring-[#1e40af]">
                        <span class="text-sm text-gray-700">Fora</span>
                    </label>
                </div>
                @error('is_home') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>

            <!-- Club Logo Preview -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1.5">Logo do Clube (Pedra Rica)</label>
                <div class="flex items-center gap-3">
                    <img src="{{ asset('images/pedra-rica-logo.jpeg') }}" alt="Pedra Rica" class="w-12 h-12 rounded-lg object-cover border border-gray-200">
                    <span class="text-sm text-gray-500">Logo automático do clube</span>
                </div>
            </div>

            <!-- Match Date -->
            <div>
                <label for="match_date" class="block text-sm font-medium text-gray-700 mb-1.5">Data do Jogo *</label>
                <input type="date" name="match_date" id="match_date" value="{{ old('match_date', isset($game) && $game->match_date ? $game->match_date->format('Y-m-d') : '') }}" required
                       class="block w-full px-3 py-2.5 border border-gray-300 rounded-lg text-gray-900 text-sm focus:ring-2 focus:ring-[#1e40af] focus:border-[#1e40af]">
                @error('match_date') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>

            <!-- Match Time -->
            <div>
                <label for="match_time" class="block text-sm font-medium text-gray-700 mb-1.5">Hora</label>
                <input type="time" name="match_time" id="match_time" value="{{ old('match_time', $game->match_time ?? '') }}"
                       class="block w-full px-3 py-2.5 border border-gray-300 rounded-lg text-gray-900 text-sm focus:ring-2 focus:ring-[#1e40af] focus:border-[#1e40af]">
                @error('match_time') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>

            <!-- Location -->
            <div>
                <label for="location" class="block text-sm font-medium text-gray-700 mb-1.5">Local</label>
                <input type="text" name="location" id="location" value="{{ old('location', $game->location ?? '') }}"
                       class="block w-full px-3 py-2.5 border border-gray-300 rounded-lg text-gray-900 text-sm focus:ring-2 focus:ring-[#1e40af] focus:border-[#1e40af]">
                @error('location') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>

            <!-- Competition -->
            <div>
                <label for="competition_id" class="block text-sm font-medium text-gray-700 mb-1.5">Competição</label>
                <select name="competition_id" id="competition_id"
                        class="block w-full px-3 py-2.5 border border-gray-300 rounded-lg text-gray-900 text-sm focus:ring-2 focus:ring-[#1e40af] focus:border-[#1e40af]">
                    <option value="">Selecionar competição</option>
                    @foreach($competitions ?? [] as $competition)
                        <option value="{{ $competition->id }}" {{ old('competition_id', $game->competition_id ?? '') == $competition->id ? 'selected' : '' }}>
                            {{ $competition->name }}
                        </option>
                    @endforeach
                </select>
                @error('competition_id') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>

            <!-- Season -->
            <div>
                <label for="season_id" class="block text-sm font-medium text-gray-700 mb-1.5">Temporada</label>
                <select name="season_id" id="season_id"
                        class="block w-full px-3 py-2.5 border border-gray-300 rounded-lg text-gray-900 text-sm focus:ring-2 focus:ring-[#1e40af] focus:border-[#1e40af]">
                    <option value="">Selecionar temporada</option>
                    @foreach($seasons ?? [] as $season)
                        <option value="{{ $season->id }}" {{ old('season_id', $game->season_id ?? '') == $season->id ? 'selected' : '' }}>
                            {{ $season->name }}
                        </option>
                    @endforeach
                </select>
                @error('season_id') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>

            <!-- Our Score -->
            <div>
                <label for="our_score" class="block text-sm font-medium text-gray-700 mb-1.5">Golos da Pedra Rica</label>
                <input type="number" name="our_score" id="our_score" value="{{ old('our_score', $game->our_score ?? '') }}" min="0"
                       class="block w-full px-3 py-2.5 border border-gray-300 rounded-lg text-gray-900 text-sm focus:ring-2 focus:ring-[#1e40af] focus:border-[#1e40af]">
                @error('our_score') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>

            <!-- Opponent Score -->
            <div>
                <label for="opponent_score" class="block text-sm font-medium text-gray-700 mb-1.5">Golos do Adversário</label>
                <input type="number" name="opponent_score" id="opponent_score" value="{{ old('opponent_score', $game->opponent_score ?? '') }}" min="0"
                       class="block w-full px-3 py-2.5 border border-gray-300 rounded-lg text-gray-900 text-sm focus:ring-2 focus:ring-[#1e40af] focus:border-[#1e40af]">
                @error('opponent_score') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>

            <!-- Status -->
            <div>
                <label for="status" class="block text-sm font-medium text-gray-700 mb-1.5">Estado *</label>
                <select name="status" id="status" required
                        class="block w-full px-3 py-2.5 border border-gray-300 rounded-lg text-gray-900 text-sm focus:ring-2 focus:ring-[#1e40af] focus:border-[#1e40af]">
                    @foreach(['upcoming' => 'Próximo', 'played' => 'Terminado', 'cancelled' => 'Cancelado'] as $value => $label)
                        <option value="{{ $value }}" {{ old('status', $game->status ?? 'upcoming') === $value ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @error('status') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>
        </div>

        <!-- Notes -->
        <div>
            <label for="notes" class="block text-sm font-medium text-gray-700 mb-1.5">Notas</label>
            <textarea name="notes" id="notes" rows="3"
                      class="block w-full px-3 py-2.5 border border-gray-300 rounded-lg text-gray-900 text-sm focus:ring-2 focus:ring-[#1e40af] focus:border-[#1e40af]">{{ old('notes', $game->notes ?? '') }}</textarea>
            @error('notes') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
        </div>

        <!-- Submit -->
        <div class="flex items-center justify-end space-x-3 pt-4 border-t border-gray-200">
            <a href="{{ route('admin.games.index') }}" class="px-5 py-2.5 border border-gray-300 text-gray-700 text-sm font-medium rounded-lg hover:bg-gray-50 transition-colors">Cancelar</a>
            <button type="submit" class="px-5 py-2.5 bg-[#1e40af] text-white text-sm font-semibold rounded-lg hover:bg-[#1e3a8a] transition-colors shadow-sm">
                {{ isset($game) ? 'Atualizar' : 'Criar Jogo' }}
            </button>
        </div>
    </form>
</div>
@endsection
