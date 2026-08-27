@extends('layouts.admin')

@section('page-title', 'Detalhes do Título')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">
    <!-- Header -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Detalhes do Título</h1>
            <p class="text-gray-500 mt-1">{{ $trophy->name }}</p>
        </div>
        <div class="flex items-center space-x-3">
            <a href="{{ route('admin.trophies.edit', $trophy) }}"
               class="inline-flex items-center px-4 py-2.5 bg-[#1e40af] text-white text-sm font-semibold rounded-lg hover:bg-[#1e3a8a] transition-colors shadow-sm">
                <i data-lucide="pencil" class="w-4 h-4 mr-2"></i>
                Editar
            </a>
            <a href="{{ route('admin.trophies.index') }}"
               class="inline-flex items-center px-4 py-2.5 border border-gray-300 text-gray-700 text-sm font-medium rounded-lg hover:bg-gray-50 transition-colors">
                <i data-lucide="arrow-left" class="w-4 h-4 mr-2"></i>
                Voltar
            </a>
        </div>
    </div>

    <!-- Trophy Info -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 space-y-6">
        <!-- Photo and Name -->
        <div class="flex items-start space-x-6">
            @if($trophy->photo)
                <img src="{{ asset('storage/' . $trophy->photo) }}" class="w-32 h-32 rounded-xl object-cover flex-shrink-0" alt="{{ $trophy->name }}">
            @else
                <div class="w-32 h-32 rounded-xl bg-yellow-50 flex items-center justify-center flex-shrink-0">
                    <i data-lucide="trophy" class="w-12 h-12 text-yellow-500"></i>
                </div>
            @endif
            <div class="flex-1">
                <h2 class="text-xl font-bold text-gray-900">{{ $trophy->name }}</h2>
                <p class="text-sm text-gray-500 mt-1">{{ $trophy->year }}</p>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <p class="text-sm font-medium text-gray-700">Nome</p>
                <p class="text-sm text-gray-900 mt-1">{{ $trophy->name }}</p>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-700">Ano</p>
                <p class="text-sm text-gray-900 mt-1">{{ $trophy->year }}</p>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-700">Competição</p>
                <p class="text-sm text-gray-900 mt-1">{{ $trophy->competition?->name ?? '—' }}</p>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-700">Temporada</p>
                <p class="text-sm text-gray-900 mt-1">{{ $trophy->season?->name ?? '—' }}</p>
            </div>
        </div>

        @if($trophy->description)
            <div class="pt-4 border-t border-gray-200">
                <h3 class="text-sm font-medium text-gray-700 mb-2">Descrição</h3>
                <p class="text-sm text-gray-600 whitespace-pre-line">{{ $trophy->description }}</p>
            </div>
        @endif
    </div>
</div>
@endsection
