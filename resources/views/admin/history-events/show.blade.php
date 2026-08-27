@extends('layouts.admin')

@section('page-title', 'Detalhes do Evento')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">
    <!-- Header -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Detalhes do Evento</h1>
            <p class="text-gray-500 mt-1">{{ $event->title }}</p>
        </div>
        <div class="flex items-center space-x-3">
            <a href="{{ route('admin.history-events.edit', $event) }}"
               class="inline-flex items-center px-4 py-2.5 bg-[#1e40af] text-white text-sm font-semibold rounded-lg hover:bg-[#1e3a8a] transition-colors shadow-sm">
                <i data-lucide="pencil" class="w-4 h-4 mr-2"></i>
                Editar
            </a>
            <a href="{{ route('admin.history-events.index') }}"
               class="inline-flex items-center px-4 py-2.5 border border-gray-300 text-gray-700 text-sm font-medium rounded-lg hover:bg-gray-50 transition-colors">
                <i data-lucide="arrow-left" class="w-4 h-4 mr-2"></i>
                Voltar
            </a>
        </div>
    </div>

    <!-- Event Info -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 space-y-6">
        <h2 class="text-xl font-bold text-gray-900">{{ $event->title }}</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <p class="text-sm font-medium text-gray-700">Título</p>
                <p class="text-sm text-gray-900 mt-1">{{ $event->title }}</p>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-700">Ano</p>
                <p class="text-sm text-gray-900 mt-1">{{ $event->year }}</p>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-700">Data do Evento</p>
                <p class="text-sm text-gray-900 mt-1">{{ $event->event_date ?? '—' }}</p>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-700">Ordem de Exibição</p>
                <p class="text-sm text-gray-900 mt-1">{{ $event->sort_order }}</p>
            </div>
        </div>

        @if($event->description)
            <div class="pt-4 border-t border-gray-200">
                <h3 class="text-sm font-medium text-gray-700 mb-2">Descrição</h3>
                <p class="text-sm text-gray-600 whitespace-pre-line">{{ $event->description }}</p>
            </div>
        @endif
    </div>
</div>
@endsection
