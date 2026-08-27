@extends('layouts.admin')

@section('page-title', 'Detalhes do Jogo')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">
    <!-- Header -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Detalhes do Jogo</h1>
            <p class="text-gray-500 mt-1">{{ $game->opponent }} — {{ $game->match_date?->format('d/m/Y') ?? '' }}</p>
        </div>
        <div class="flex items-center space-x-3">
            <a href="{{ route('admin.games.edit', $game) }}"
               class="inline-flex items-center px-4 py-2.5 bg-[#1e40af] text-white text-sm font-semibold rounded-lg hover:bg-[#1e3a8a] transition-colors shadow-sm">
                <i data-lucide="pencil" class="w-4 h-4 mr-2"></i>
                Editar
            </a>
            <a href="{{ route('admin.games.index') }}"
               class="inline-flex items-center px-4 py-2.5 border border-gray-300 text-gray-700 text-sm font-medium rounded-lg hover:bg-gray-50 transition-colors">
                <i data-lucide="arrow-left" class="w-4 h-4 mr-2"></i>
                Voltar
            </a>
        </div>
    </div>

    <!-- Score Card -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
        <div class="flex items-center justify-center space-x-8">
            <div class="text-center">
                <div class="w-16 h-16 rounded-full bg-[#1e40af] flex items-center justify-center mx-auto mb-2">
                    <span class="text-white font-bold text-lg">PR</span>
                </div>
                <p class="text-sm font-semibold text-gray-900">Pedra Rica</p>
            </div>

            <div class="text-center px-6">
                <div class="flex items-center space-x-3">
                    <span class="text-4xl font-bold text-gray-900">{{ $game->our_score ?? '—' }}</span>
                    <span class="text-2xl text-gray-400">-</span>
                    <span class="text-4xl font-bold text-gray-900">{{ $game->opponent_score ?? '—' }}</span>
                </div>
                @php
                    $statusLabels = ['upcoming' => 'Próximo', 'live' => 'Ao vivo', 'finished' => 'Terminado', 'postponed' => 'Adiado', 'cancelled' => 'Cancelado'];
                    $statusColors = ['upcoming' => 'bg-blue-100 text-blue-800', 'live' => 'bg-red-100 text-red-800', 'finished' => 'bg-gray-100 text-gray-800', 'postponed' => 'bg-yellow-100 text-yellow-800', 'cancelled' => 'bg-red-100 text-red-800'];
                @endphp
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $statusColors[$game->status] ?? 'bg-gray-100 text-gray-800' }} mt-2">
                    {{ $statusLabels[$game->status] ?? $game->status }}
                </span>
            </div>

            <div class="text-center">
                @if($game->opponent_logo)
                    <img src="{{ asset('storage/' . $game->opponent_logo) }}" class="w-16 h-16 rounded-full object-cover mx-auto mb-2" alt="{{ $game->opponent }}">
                @else
                    <div class="w-16 h-16 rounded-full bg-gray-200 flex items-center justify-center mx-auto mb-2">
                        <i data-lucide="shield" class="w-8 h-8 text-gray-400"></i>
                    </div>
                @endif
                <p class="text-sm font-semibold text-gray-900">{{ $game->opponent }}</p>
            </div>
        </div>
    </div>

    <!-- Details -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 space-y-6">
        <h3 class="text-lg font-semibold text-gray-900">Informações do Jogo</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <p class="text-sm font-medium text-gray-700">Adversário</p>
                <p class="text-sm text-gray-900 mt-1">{{ $game->opponent }}</p>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-700">Data</p>
                <p class="text-sm text-gray-900 mt-1">{{ $game->match_date?->format('d/m/Y') ?? '—' }}</p>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-700">Hora</p>
                <p class="text-sm text-gray-900 mt-1">{{ $game->match_time ?? '—' }}</p>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-700">Local</p>
                <p class="text-sm text-gray-900 mt-1">{{ $game->location ?? '—' }}</p>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-700">Competição</p>
                <p class="text-sm text-gray-900 mt-1">{{ $game->competition?->name ?? '—' }}</p>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-700">Temporada</p>
                <p class="text-sm text-gray-900 mt-1">{{ $game->season?->name ?? '—' }}</p>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-700">Estado</p>
                <p class="mt-1">
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $statusColors[$game->status] ?? 'bg-gray-100 text-gray-800' }}">
                        {{ $statusLabels[$game->status] ?? $game->status }}
                    </span>
                </p>
            </div>
        </div>

        <!-- Notes -->
        @if($game->notes)
            <div class="pt-4 border-t border-gray-200">
                <h3 class="text-sm font-medium text-gray-700 mb-2">Notas</h3>
                <p class="text-sm text-gray-600 whitespace-pre-line">{{ $game->notes }}</p>
            </div>
        @endif
    </div>
</div>
@endsection
