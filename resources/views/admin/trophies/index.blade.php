@extends('layouts.admin')

@section('page-title', 'Títulos')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Títulos</h1>
            <p class="text-gray-500 mt-1">Gerir títulos e conquistas</p>
        </div>
        <a href="{{ route('admin.trophies.create') }}"
           class="inline-flex items-center px-4 py-2.5 bg-[#1e40af] text-white text-sm font-semibold rounded-lg hover:bg-[#1e3a8a] transition-colors shadow-sm">
            <i data-lucide="plus" class="w-4 h-4 mr-2"></i>
            Novo Título
        </a>
    </div>

    <!-- Table -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Foto</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Nome</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Competição</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Ano</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Temporada</th>
                        <th class="px-6 py-3 text-right text-xs font-semibold text-gray-500 uppercase tracking-wider">Ações</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse($trophies as $trophy)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if($trophy->photo)
                                    <img src="{{ asset('storage/' . $trophy->photo) }}" alt="{{ $trophy->name }}"
                                         class="w-10 h-10 rounded-lg object-cover">
                                @else
                                    <div class="w-10 h-10 bg-amber-100 rounded-lg flex items-center justify-center">
                                        <i data-lucide="award" class="w-5 h-5 text-amber-600"></i>
                                    </div>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="text-sm font-medium text-gray-900">{{ $trophy->name }}</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="text-sm text-gray-600">{{ $trophy->competition->name ?? '-' }}</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="text-sm text-gray-600">{{ $trophy->year ?? '-' }}</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="text-sm text-gray-600">{{ $trophy->season->name ?? '-' }}</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right">
                                <div class="flex items-center justify-end space-x-2">
                                    <a href="{{ route('admin.trophies.edit', $trophy) }}"
                                       class="p-2 text-gray-500 hover:text-[#1e40af] hover:bg-blue-50 rounded-lg transition-colors">
                                        <i data-lucide="pencil" class="w-4 h-4"></i>
                                    </a>
                                    <form action="{{ route('admin.trophies.destroy', $trophy) }}" method="POST"
                                          x-data="{ showDelete: false }">
                                        @csrf
                                        @method('DELETE')
                                        <div x-show="showDelete" x-cloak class="fixed inset-0 bg-black/50 flex items-center justify-center z-50 p-4" x-transition>
                                            <div class="bg-white rounded-xl shadow-xl p-6 max-w-sm w-full" @click.away="showDelete = false">
                                                <div class="text-center">
                                                    <div class="w-12 h-12 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                                        <i data-lucide="alert-triangle" class="w-6 h-6 text-red-600"></i>
                                                    </div>
                                                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Eliminar título?</h3>
                                                    <p class="text-gray-500 text-sm mb-6">Esta ação não pode ser desfeita.</p>
                                                    <div class="flex space-x-3">
                                                        <button type="button" @click="showDelete = false" class="flex-1 px-4 py-2 border border-gray-300 text-gray-700 rounded-lg text-sm font-medium hover:bg-gray-50">Cancelar</button>
                                                        <button type="submit" class="flex-1 px-4 py-2 bg-red-600 text-white rounded-lg text-sm font-medium hover:bg-red-700">Eliminar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="button" @click="showDelete = true" class="p-2 text-gray-500 hover:text-red-600 hover:bg-red-50 rounded-lg transition-colors">
                                            <i data-lucide="trash-2" class="w-4 h-4"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-12 text-center">
                                <i data-lucide="award" class="w-12 h-12 text-gray-300 mx-auto mb-3"></i>
                                <p class="text-gray-500">Nenhum título encontrado</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if(method_exists($trophies, 'links') && $trophies->hasPages())
            <div class="px-6 py-4 border-t border-gray-200">
                {{ $trophies->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
