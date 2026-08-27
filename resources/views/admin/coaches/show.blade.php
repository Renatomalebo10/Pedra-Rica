@extends('layouts.admin')

@section('page-title', 'Detalhes do Treinador')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">
    <!-- Header -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Detalhes do Treinador</h1>
            <p class="text-gray-500 mt-1">{{ $coach->name }}</p>
        </div>
        <div class="flex items-center space-x-3">
            <a href="{{ route('admin.coaches.edit', $coach) }}"
               class="inline-flex items-center px-4 py-2.5 bg-[#1e40af] text-white text-sm font-semibold rounded-lg hover:bg-[#1e3a8a] transition-colors shadow-sm">
                <i data-lucide="pencil" class="w-4 h-4 mr-2"></i>
                Editar
            </a>
            <a href="{{ route('admin.coaches.index') }}"
               class="inline-flex items-center px-4 py-2.5 border border-gray-300 text-gray-700 text-sm font-medium rounded-lg hover:bg-gray-50 transition-colors">
                <i data-lucide="arrow-left" class="w-4 h-4 mr-2"></i>
                Voltar
            </a>
        </div>
    </div>

    <!-- Coach Info -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 space-y-6">
        <!-- Photo and Name -->
        <div class="flex items-start space-x-6">
            <div class="w-32 h-32 rounded-xl overflow-hidden bg-gray-100 flex-shrink-0">
                @if($coach->photo)
                    <img src="{{ asset('storage/' . $coach->photo) }}" class="w-full h-full object-cover" alt="{{ $coach->name }}">
                @else
                    <div class="w-full h-full flex items-center justify-center">
                        <i data-lucide="user" class="w-12 h-12 text-gray-300"></i>
                    </div>
                @endif
            </div>
            <div class="flex-1">
                <div class="flex items-center space-x-3 mb-2">
                    <h2 class="text-xl font-bold text-gray-900">{{ $coach->name }}</h2>
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $coach->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                        {{ $coach->is_active ? 'Ativo' : 'Inativo' }}
                    </span>
                </div>
                @if($coach->role)
                    <p class="text-sm text-gray-500">{{ $coach->role }}</p>
                @endif
                @if($coach->year_joined)
                    <p class="text-sm text-gray-500 mt-1">Ano de entrada: {{ $coach->year_joined }}</p>
                @endif
            </div>
        </div>

        <!-- Details -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <p class="text-sm font-medium text-gray-700">Nome</p>
                <p class="text-sm text-gray-900 mt-1">{{ $coach->name }}</p>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-700">Função</p>
                <p class="text-sm text-gray-900 mt-1">{{ $coach->role ?? '—' }}</p>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-700">Ano de Entrada</p>
                <p class="text-sm text-gray-900 mt-1">{{ $coach->year_joined ?? '—' }}</p>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-700">Estado</p>
                <p class="mt-1">
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $coach->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                        {{ $coach->is_active ? 'Ativo' : 'Inativo' }}
                    </span>
                </p>
            </div>
        </div>

        <!-- Biography -->
        @if($coach->biography)
            <div class="pt-4 border-t border-gray-200">
                <h3 class="text-sm font-medium text-gray-700 mb-2">Biografia</h3>
                <p class="text-sm text-gray-600 whitespace-pre-line">{{ $coach->biography }}</p>
            </div>
        @endif
    </div>
</div>
@endsection
