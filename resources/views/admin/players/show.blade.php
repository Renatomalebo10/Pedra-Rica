@extends('layouts.admin')

@section('page-title', 'Detalhes do Jogador')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">
    <!-- Header -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Detalhes do Jogador</h1>
            <p class="text-gray-500 mt-1">{{ $player->name }}</p>
        </div>
        <div class="flex items-center space-x-3">
            <a href="{{ route('admin.players.edit', $player) }}"
               class="inline-flex items-center px-4 py-2.5 bg-[#1e40af] text-white text-sm font-semibold rounded-lg hover:bg-[#1e3a8a] transition-colors shadow-sm">
                <i data-lucide="pencil" class="w-4 h-4 mr-2"></i>
                Editar
            </a>
            <a href="{{ route('admin.players.index') }}"
               class="inline-flex items-center px-4 py-2.5 border border-gray-300 text-gray-700 text-sm font-medium rounded-lg hover:bg-gray-50 transition-colors">
                <i data-lucide="arrow-left" class="w-4 h-4 mr-2"></i>
                Voltar
            </a>
        </div>
    </div>

    <!-- Player Info -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 space-y-6">
        <!-- Photo and Name -->
        <div class="flex items-start space-x-6">
            <div class="w-32 h-32 rounded-xl overflow-hidden bg-gray-100 flex-shrink-0">
                @if($player->photo)
                    <img src="{{ asset('storage/' . $player->photo) }}" class="w-full h-full object-cover" alt="{{ $player->name }}">
                @else
                    <div class="w-full h-full flex items-center justify-center">
                        <i data-lucide="user" class="w-12 h-12 text-gray-300"></i>
                    </div>
                @endif
            </div>
            <div class="flex-1">
                <div class="flex items-center space-x-3 mb-2">
                    <h2 class="text-xl font-bold text-gray-900">{{ $player->name }}</h2>
                    @if($player->number)
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-[#1e40af] text-white">#{{ $player->number }}</span>
                    @endif
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $player->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                        {{ $player->is_active ? 'Ativo' : 'Inativo' }}
                    </span>
                </div>
                @if($player->position)
                    <p class="text-sm text-gray-500">{{ $player->position }}</p>
                @endif
                @if($player->season)
                    <p class="text-sm text-gray-500 mt-1">Temporada: {{ $player->season->name }}</p>
                @endif
            </div>
        </div>

        <!-- Stats Grid -->
        <div class="grid grid-cols-2 md:grid-cols-5 gap-4">
            <div class="bg-gray-50 rounded-lg p-4 text-center">
                <p class="text-2xl font-bold text-gray-900">{{ $player->goals ?? 0 }}</p>
                <p class="text-xs text-gray-500 mt-1">Golos</p>
            </div>
            <div class="bg-gray-50 rounded-lg p-4 text-center">
                <p class="text-2xl font-bold text-gray-900">{{ $player->assists ?? 0 }}</p>
                <p class="text-xs text-gray-500 mt-1">Assistências</p>
            </div>
            <div class="bg-gray-50 rounded-lg p-4 text-center">
                <p class="text-2xl font-bold text-gray-900">{{ $player->matches_played ?? 0 }}</p>
                <p class="text-xs text-gray-500 mt-1">Jogos</p>
            </div>
            <div class="bg-yellow-50 rounded-lg p-4 text-center">
                <p class="text-2xl font-bold text-yellow-600">{{ $player->yellow_cards ?? 0 }}</p>
                <p class="text-xs text-gray-500 mt-1">Amarelos</p>
            </div>
            <div class="bg-red-50 rounded-lg p-4 text-center">
                <p class="text-2xl font-bold text-red-600">{{ $player->red_cards ?? 0 }}</p>
                <p class="text-xs text-gray-500 mt-1">Vermelhos</p>
            </div>
        </div>

        <!-- Biography -->
        @if($player->biography)
            <div class="pt-4 border-t border-gray-200">
                <h3 class="text-sm font-medium text-gray-700 mb-2">Biografia</h3>
                <p class="text-sm text-gray-600 whitespace-pre-line">{{ $player->biography }}</p>
            </div>
        @endif
    </div>
</div>
@endsection
