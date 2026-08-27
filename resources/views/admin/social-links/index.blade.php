@extends('layouts.admin')

@section('page-title', 'Links Sociais')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Links Sociais</h1>
            <p class="text-gray-500 mt-1">Gerir redes sociais do clube</p>
        </div>
        <a href="{{ route('admin.social-links.create') }}"
           class="inline-flex items-center px-4 py-2.5 bg-[#1e40af] text-white text-sm font-semibold rounded-lg hover:bg-[#1e3a8a] transition-colors shadow-sm">
            <i data-lucide="plus" class="w-4 h-4 mr-2"></i>
            Novo Link
        </a>
    </div>

    <!-- Table -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Plataforma</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">URL</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Estado</th>
                        <th class="px-6 py-3 text-right text-xs font-semibold text-gray-500 uppercase tracking-wider">Ações</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse($socialLinks as $link)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    @php
                                        $platformIcons = [
                                            'Facebook' => 'facebook',
                                            'Instagram' => 'instagram',
                                            'YouTube' => 'youtube',
                                            'Twitter' => 'twitter',
                                            'TikTok' => 'music',
                                        ];
                                        $platformColors = [
                                            'Facebook' => 'bg-blue-100 text-blue-600',
                                            'Instagram' => 'bg-pink-100 text-pink-600',
                                            'YouTube' => 'bg-red-100 text-red-600',
                                            'Twitter' => 'bg-sky-100 text-sky-600',
                                            'TikTok' => 'bg-gray-100 text-gray-900',
                                        ];
                                    @endphp
                                    <span class="inline-flex items-center justify-center w-8 h-8 rounded-lg mr-3 {{ $platformColors[$link->platform] ?? 'bg-gray-100 text-gray-600' }}">
                                        <i data-lucide="{{ $platformIcons[$link->platform] ?? 'link' }}" class="w-4 h-4"></i>
                                    </span>
                                    <span class="text-sm font-medium text-gray-900">{{ $link->platform }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <a href="{{ $link->url }}" target="_blank" class="text-sm text-[#1e40af] hover:underline truncate block max-w-xs">
                                    {{ $link->url }}
                                </a>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if($link->is_active)
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                        Ativo
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-600">
                                        Inativo
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right">
                                <div class="flex items-center justify-end space-x-2">
                                    <a href="{{ route('admin.social-links.edit', $link) }}"
                                       class="p-2 text-gray-500 hover:text-[#1e40af] hover:bg-blue-50 rounded-lg transition-colors">
                                        <i data-lucide="pencil" class="w-4 h-4"></i>
                                    </a>
                                    <form action="{{ route('admin.social-links.destroy', $link) }}" method="POST"
                                          x-data="{ showDelete: false }">
                                        @csrf
                                        @method('DELETE')
                                        <div x-show="showDelete" x-cloak class="fixed inset-0 bg-black/50 flex items-center justify-center z-50 p-4" x-transition>
                                            <div class="bg-white rounded-xl shadow-xl p-6 max-w-sm w-full" @click.away="showDelete = false">
                                                <div class="text-center">
                                                    <div class="w-12 h-12 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                                        <i data-lucide="alert-triangle" class="w-6 h-6 text-red-600"></i>
                                                    </div>
                                                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Eliminar link?</h3>
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
                            <td colspan="4" class="px-6 py-12 text-center">
                                <i data-lucide="link" class="w-12 h-12 text-gray-300 mx-auto mb-3"></i>
                                <p class="text-gray-500">Nenhum link social encontrado</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if(method_exists($socialLinks, 'links') && $socialLinks->hasPages())
            <div class="px-6 py-4 border-t border-gray-200">
                {{ $socialLinks->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
