@extends('layouts.admin')

@section('page-title', 'Detalhes da Temporada')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">
    <!-- Header -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Detalhes da Temporada</h1>
            <p class="text-gray-500 mt-1">{{ $season->name }}</p>
        </div>
        <div class="flex items-center space-x-3">
            <a href="{{ route('admin.seasons.edit', $season) }}"
               class="inline-flex items-center px-4 py-2.5 bg-[#1e40af] text-white text-sm font-semibold rounded-lg hover:bg-[#1e3a8a] transition-colors shadow-sm">
                <i data-lucide="pencil" class="w-4 h-4 mr-2"></i>
                Editar
            </a>
            <a href="{{ route('admin.seasons.index') }}"
               class="inline-flex items-center px-4 py-2.5 border border-gray-300 text-gray-700 text-sm font-medium rounded-lg hover:bg-gray-50 transition-colors">
                <i data-lucide="arrow-left" class="w-4 h-4 mr-2"></i>
                Voltar
            </a>
        </div>
    </div>

    <!-- Season Info -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 space-y-6">
        <div class="flex items-center space-x-3 mb-4">
            <h2 class="text-xl font-bold text-gray-900">{{ $season->name }}</h2>
            @if($season->is_current)
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                    Temporada Atual
                </span>
            @endif
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-gray-50 rounded-lg p-4 text-center">
                <p class="text-2xl font-bold text-gray-900">{{ $season->players->count() }}</p>
                <p class="text-xs text-gray-500 mt-1">Jogadores</p>
            </div>
            <div class="bg-gray-50 rounded-lg p-4 text-center">
                <p class="text-2xl font-bold text-gray-900">{{ $season->games->count() }}</p>
                <p class="text-xs text-gray-500 mt-1">Jogos</p>
            </div>
            <div class="bg-gray-50 rounded-lg p-4 text-center">
                <p class="text-2xl font-bold text-gray-900">{{ $season->trophies->count() }}</p>
                <p class="text-xs text-gray-500 mt-1">Títulos</p>
            </div>
        </div>
    </div>

    <!-- Players -->
    @if($season->players->count())
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Jogadores</h3>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nome</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Número</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Posição</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Estado</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach($season->players as $player)
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-3 text-sm text-gray-900">{{ $player->name }}</td>
                                <td class="px-4 py-3 text-sm text-gray-600">{{ $player->number ?? '—' }}</td>
                                <td class="px-4 py-3 text-sm text-gray-600">{{ $player->position ?? '—' }}</td>
                                <td class="px-4 py-3">
                                    <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium {{ $player->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                        {{ $player->is_active ? 'Ativo' : 'Inativo' }}
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif

    <!-- Games -->
    @if($season->games->count())
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Jogos</h3>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Data</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Adversário</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Resultado</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Estado</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach($season->games as $game)
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-3 text-sm text-gray-900">{{ $game->match_date?->format('d/m/Y') ?? '—' }}</td>
                                <td class="px-4 py-3 text-sm text-gray-900">{{ $game->opponent }}</td>
                                <td class="px-4 py-3 text-sm font-semibold text-gray-900">
                                    {{ $game->our_score ?? '?' }} - {{ $game->opponent_score ?? '?' }}
                                </td>
                                <td class="px-4 py-3">
                                    @php
                                        $statusLabels = ['upcoming' => 'Próximo', 'played' => 'Terminado', 'cancelled' => 'Cancelado'];
                                        $statusColors = ['upcoming' => 'bg-blue-100 text-blue-800', 'played' => 'bg-green-100 text-green-800', 'cancelled' => 'bg-gray-100 text-gray-800'];
                                    @endphp
                                    <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium {{ $statusColors[$game->status] ?? 'bg-gray-100 text-gray-800' }}">
                                        {{ $statusLabels[$game->status] ?? $game->status }}
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif

    <!-- Trophies -->
    @if($season->trophies->count())
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Títulos</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                @foreach($season->trophies as $trophy)
                    <div class="flex items-center space-x-4 p-4 bg-gray-50 rounded-lg">
                        @if($trophy->photo)
                            <img src="{{ asset('storage/' . $trophy->photo) }}" class="w-12 h-12 rounded-lg object-cover" alt="{{ $trophy->name }}">
                        @else
                            <div class="w-12 h-12 rounded-lg bg-yellow-100 flex items-center justify-center">
                                <i data-lucide="trophy" class="w-6 h-6 text-yellow-600"></i>
                            </div>
                        @endif
                        <div>
                            <p class="text-sm font-semibold text-gray-900">{{ $trophy->name }}</p>
                            <p class="text-xs text-gray-500">{{ $trophy->year }}{{ $trophy->competition ? ' — ' . $trophy->competition : '' }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
</div>
@endsection
