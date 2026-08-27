@extends('layouts.admin')

@section('page-title', 'Detalhes do Link Social')

@section('content')
<div class="max-w-2xl mx-auto space-y-6">
    <!-- Header -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Detalhes do Link Social</h1>
            <p class="text-gray-500 mt-1">{{ $socialLink->platform }}</p>
        </div>
        <div class="flex items-center space-x-3">
            <a href="{{ route('admin.social-links.edit', $socialLink) }}"
               class="inline-flex items-center px-4 py-2.5 bg-[#1e40af] text-white text-sm font-semibold rounded-lg hover:bg-[#1e3a8a] transition-colors shadow-sm">
                <i data-lucide="pencil" class="w-4 h-4 mr-2"></i>
                Editar
            </a>
            <a href="{{ route('admin.social-links.index') }}"
               class="inline-flex items-center px-4 py-2.5 border border-gray-300 text-gray-700 text-sm font-medium rounded-lg hover:bg-gray-50 transition-colors">
                <i data-lucide="arrow-left" class="w-4 h-4 mr-2"></i>
                Voltar
            </a>
        </div>
    </div>

    <!-- Social Link Info -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 space-y-6">
        <h2 class="text-xl font-bold text-gray-900">{{ $socialLink->platform }}</h2>

        <div class="grid grid-cols-1 gap-6">
            <div>
                <p class="text-sm font-medium text-gray-700">Plataforma</p>
                <p class="text-sm text-gray-900 mt-1">{{ $socialLink->platform }}</p>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-700">URL</p>
                <p class="text-sm text-gray-900 mt-1">
                    <a href="{{ $socialLink->url }}" target="_blank" rel="noopener noreferrer" class="text-[#1e40af] hover:underline">
                        {{ $socialLink->url }}
                    </a>
                </p>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-700">Estado</p>
                <p class="mt-1">
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $socialLink->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                        {{ $socialLink->is_active ? 'Ativo' : 'Inativo' }}
                    </span>
                </p>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-700">Ordem</p>
                <p class="text-sm text-gray-900 mt-1">{{ $socialLink->sort_order }}</p>
            </div>
        </div>
    </div>
</div>
@endsection
