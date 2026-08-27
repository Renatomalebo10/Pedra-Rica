@extends('layouts.admin')

@section('page-title', 'Detalhes da Competição')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">
    <!-- Header -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Detalhes da Competição</h1>
            <p class="text-gray-500 mt-1">{{ $competition->name }}</p>
        </div>
        <div class="flex items-center space-x-3">
            <a href="{{ route('admin.competitions.edit', $competition) }}"
               class="inline-flex items-center px-4 py-2.5 bg-[#1e40af] text-white text-sm font-semibold rounded-lg hover:bg-[#1e3a8a] transition-colors shadow-sm">
                <i data-lucide="pencil" class="w-4 h-4 mr-2"></i>
                Editar
            </a>
            <a href="{{ route('admin.competitions.index') }}"
               class="inline-flex items-center px-4 py-2.5 border border-gray-300 text-gray-700 text-sm font-medium rounded-lg hover:bg-gray-50 transition-colors">
                <i data-lucide="arrow-left" class="w-4 h-4 mr-2"></i>
                Voltar
            </a>
        </div>
    </div>

    <!-- Competition Info -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 space-y-6">
        <h2 class="text-xl font-bold text-gray-900">{{ $competition->name }}</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <p class="text-sm font-medium text-gray-700">Nome</p>
                <p class="text-sm text-gray-900 mt-1">{{ $competition->name }}</p>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-700">Total de Jogos</p>
                <p class="text-sm text-gray-900 mt-1">{{ $competition->games->count() }}</p>
            </div>
        </div>

        @if($competition->description)
            <div class="pt-4 border-t border-gray-200">
                <h3 class="text-sm font-medium text-gray-700 mb-2">Descrição</h3>
                <p class="text-sm text-gray-600 whitespace-pre-line">{{ $competition->description }}</p>
            </div>
        @endif
    </div>

    <!-- Games -->
    @if($competition->games->count())
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Jogos nesta Competição</h3>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Data</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Adversário</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Resultado</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Temporada</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach($competition->games as $game)
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-3 text-sm text-gray-900">{{ $game->match_date?->format('d/m/Y') ?? '—' }}</td>
                                <td class="px-4 py-3 text-sm text-gray-900">{{ $game->opponent }}</td>
                                <td class="px-4 py-3 text-sm font-semibold text-gray-900">
                                    {{ $game->our_score ?? '?' }} - {{ $game->opponent_score ?? '?' }}
                                </td>
                                <td class="px-4 py-3 text-sm text-gray-600">{{ $game->season?->name ?? '—' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
</div>
@endsection
