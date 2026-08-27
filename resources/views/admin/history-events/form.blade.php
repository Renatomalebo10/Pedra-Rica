@extends('layouts.admin')

@section('page-title', isset($event) ? 'Editar Evento' : 'Novo Evento')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">
    <!-- Header -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">{{ isset($event) ? 'Editar Evento' : 'Novo Evento' }}</h1>
            <p class="text-gray-500 mt-1">{{ isset($event) ? 'Atualizar dados do evento' : 'Adicionar novo evento histórico' }}</p>
        </div>
        <a href="{{ route('admin.history-events.index') }}"
           class="inline-flex items-center px-4 py-2.5 border border-gray-300 text-gray-700 text-sm font-medium rounded-lg hover:bg-gray-50 transition-colors">
            <i data-lucide="arrow-left" class="w-4 h-4 mr-2"></i>
            Voltar
        </a>
    </div>

    <!-- Form -->
    <form action="{{ isset($event) ? route('admin.history-events.update', $event) : route('admin.history-events.store') }}"
          method="POST"
          class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 space-y-6">
        @csrf
        @if(isset($event))
            @method('PUT')
        @endif

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Title -->
            <div class="md:col-span-2">
                <label for="title" class="block text-sm font-medium text-gray-700 mb-1.5">Título *</label>
                <input type="text" name="title" id="title" value="{{ old('title', $event->title ?? '') }}" required
                       class="block w-full px-3 py-2.5 border border-gray-300 rounded-lg text-gray-900 text-sm focus:ring-2 focus:ring-[#1e40af] focus:border-[#1e40af]">
                @error('title') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>

            <!-- Event Date -->
            <div>
                <label for="event_date" class="block text-sm font-medium text-gray-700 mb-1.5">Data do Evento</label>
                <input type="text" name="event_date" id="event_date"
                       value="{{ old('event_date', $event->event_date ?? '') }}"
                       placeholder="Ex: 25 de Maio de 2009"
                       class="block w-full px-3 py-2.5 border border-gray-300 rounded-lg text-gray-900 text-sm focus:ring-2 focus:ring-[#1e40af] focus:border-[#1e40af]">
                @error('event_date') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>

            <!-- Year -->
            <div>
                <label for="year" class="block text-sm font-medium text-gray-700 mb-1.5">Ano *</label>
                <input type="number" name="year" id="year" value="{{ old('year', $event->year ?? '') }}" required
                       min="1900" max="{{ date('Y') + 10 }}"
                       class="block w-full px-3 py-2.5 border border-gray-300 rounded-lg text-gray-900 text-sm focus:ring-2 focus:ring-[#1e40af] focus:border-[#1e40af]">
                @error('year') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>

            <!-- Sort Order -->
            <div>
                <label for="sort_order" class="block text-sm font-medium text-gray-700 mb-1.5">Ordem de Exibição</label>
                <input type="number" name="sort_order" id="sort_order" value="{{ old('sort_order', $event->sort_order ?? 0) }}" min="0"
                       class="block w-full px-3 py-2.5 border border-gray-300 rounded-lg text-gray-900 text-sm focus:ring-2 focus:ring-[#1e40af] focus:border-[#1e40af]">
                <p class="mt-1 text-xs text-gray-400">Número menor aparece primeiro na linha do tempo.</p>
                @error('sort_order') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>
        </div>

        <!-- Description -->
        <div>
            <label for="description" class="block text-sm font-medium text-gray-700 mb-1.5">Descrição</label>
            <textarea name="description" id="description" rows="4"
                      class="block w-full px-3 py-2.5 border border-gray-300 rounded-lg text-gray-900 text-sm focus:ring-2 focus:ring-[#1e40af] focus:border-[#1e40af]">{{ old('description', $event->description ?? '') }}</textarea>
            @error('description') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
        </div>

        <!-- Submit -->
        <div class="flex items-center justify-end space-x-3 pt-4 border-t border-gray-200">
            <a href="{{ route('admin.history-events.index') }}" class="px-5 py-2.5 border border-gray-300 text-gray-700 text-sm font-medium rounded-lg hover:bg-gray-50 transition-colors">Cancelar</a>
            <button type="submit" class="px-5 py-2.5 bg-[#1e40af] text-white text-sm font-semibold rounded-lg hover:bg-[#1e3a8a] transition-colors shadow-sm">
                {{ isset($event) ? 'Atualizar' : 'Criar Evento' }}
            </button>
        </div>
    </form>
</div>
@endsection
