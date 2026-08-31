@extends('layouts.admin')

@section('page-title', 'Configurações')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">
    <!-- Header -->
    <div>
        <h1 class="text-2xl font-bold text-gray-900">Configurações</h1>
        <p class="text-gray-500 mt-1">Gerir configurações gerais do site</p>
    </div>

    <!-- Form -->
    <form action="{{ route('admin.settings.update') }}" method="POST"
          class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 space-y-6">
        @csrf

        <!-- Geral -->
        <div>
            <h2 class="text-lg font-semibold text-gray-900 mb-4 pb-2 border-b border-gray-200">Sobre o Clube</h2>
            <div class="space-y-6">
                <div>
                    <label for="founder_name" class="block text-sm font-medium text-gray-700 mb-1.5">Nome do Fundador</label>
                    <input type="text" name="founder_name" id="founder_name" value="{{ old('founder_name', $settings['founder_name'] ?? '') }}"
                           class="block w-full px-3 py-2.5 border border-gray-300 rounded-lg text-gray-900 text-sm focus:ring-2 focus:ring-[#1e40af] focus:border-[#1e40af]">
                </div>
                <div>
                    <label for="about_description" class="block text-sm font-medium text-gray-700 mb-1.5">Descrição Sobre</label>
                    <textarea name="about_description" id="about_description" rows="3"
                              class="block w-full px-3 py-2.5 border border-gray-300 rounded-lg text-gray-900 text-sm focus:ring-2 focus:ring-[#1e40af] focus:border-[#1e40af]">{{ old('about_description', $settings['about_description'] ?? '') }}</textarea>
                </div>
                <div>
                    <label for="mission" class="block text-sm font-medium text-gray-700 mb-1.5">Missão</label>
                    <textarea name="mission" id="mission" rows="3"
                              class="block w-full px-3 py-2.5 border border-gray-300 rounded-lg text-gray-900 text-sm focus:ring-2 focus:ring-[#1e40af] focus:border-[#1e40af]">{{ old('mission', $settings['mission'] ?? '') }}</textarea>
                </div>
                <div>
                    <label for="vision" class="block text-sm font-medium text-gray-700 mb-1.5">Visão</label>
                    <textarea name="vision" id="vision" rows="3"
                              class="block w-full px-3 py-2.5 border border-gray-300 rounded-lg text-gray-900 text-sm focus:ring-2 focus:ring-[#1e40af] focus:border-[#1e40af]">{{ old('vision', $settings['vision'] ?? '') }}</textarea>
                </div>
                <div>
                    <label for="history_summary" class="block text-sm font-medium text-gray-700 mb-1.5">Resumo da História</label>
                    <textarea name="history_summary" id="history_summary" rows="3"
                              class="block w-full px-3 py-2.5 border border-gray-300 rounded-lg text-gray-900 text-sm focus:ring-2 focus:ring-[#1e40af] focus:border-[#1e40af]">{{ old('history_summary', $settings['history_summary'] ?? '') }}</textarea>
                </div>
                <div>
                    <label for="founder_quote" class="block text-sm font-medium text-gray-700 mb-1.5">Citação do Fundador</label>
                    <textarea name="founder_quote" id="founder_quote" rows="2"
                              class="block w-full px-3 py-2.5 border border-gray-300 rounded-lg text-gray-900 text-sm focus:ring-2 focus:ring-[#1e40af] focus:border-[#1e40af]">{{ old('founder_quote', $settings['founder_quote'] ?? '') }}</textarea>
                </div>
                <div>
                    <label for="founder_bio" class="block text-sm font-medium text-gray-700 mb-1.5">Biografia do Fundador</label>
                    <textarea name="founder_bio" id="founder_bio" rows="3"
                              class="block w-full px-3 py-2.5 border border-gray-300 rounded-lg text-gray-900 text-sm focus:ring-2 focus:ring-[#1e40af] focus:border-[#1e40af]">{{ old('founder_bio', $settings['founder_bio'] ?? '') }}</textarea>
                </div>
            </div>
        </div>

        <!-- Contacto -->
        <div>
            <h2 class="text-lg font-semibold text-gray-900 mb-4 pb-2 border-b border-gray-200">Contacto</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="contact_email" class="block text-sm font-medium text-gray-700 mb-1.5">E-mail</label>
                    <input type="email" name="contact_email" id="contact_email" value="{{ old('contact_email', $settings['contact_email'] ?? '') }}"
                           class="block w-full px-3 py-2.5 border border-gray-300 rounded-lg text-gray-900 text-sm focus:ring-2 focus:ring-[#1e40af] focus:border-[#1e40af]">
                </div>
                <div>
                    <label for="contact_phone" class="block text-sm font-medium text-gray-700 mb-1.5">Telefone</label>
                    <input type="text" name="contact_phone" id="contact_phone" value="{{ old('contact_phone', $settings['contact_phone'] ?? '') }}"
                           class="block w-full px-3 py-2.5 border border-gray-300 rounded-lg text-gray-900 text-sm focus:ring-2 focus:ring-[#1e40af] focus:border-[#1e40af]">
                </div>
                <div class="md:col-span-2">
                    <label for="contact_address" class="block text-sm font-medium text-gray-700 mb-1.5">Morada</label>
                    <input type="text" name="contact_address" id="contact_address" value="{{ old('contact_address', $settings['contact_address'] ?? '') }}"
                           class="block w-full px-3 py-2.5 border border-gray-300 rounded-lg text-gray-900 text-sm focus:ring-2 focus:ring-[#1e40af] focus:border-[#1e40af]">
                </div>
            </div>
        </div>

        <!-- Desenvolvedor / Rodapé -->
        <div>
            <h2 class="text-lg font-semibold text-gray-900 mb-4 pb-2 border-b border-gray-200">Desenvolvedor & Rodapé</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="developer_name" class="block text-sm font-medium text-gray-700 mb-1.5">Nome do Desenvolvedor</label>
                    <input type="text" name="developer_name" id="developer_name" value="{{ old('developer_name', $settings['developer_name'] ?? '') }}"
                           class="block w-full px-3 py-2.5 border border-gray-300 rounded-lg text-gray-900 text-sm focus:ring-2 focus:ring-[#1e40af] focus:border-[#1e40af]">
                </div>
                <div>
                    <label for="developer_url" class="block text-sm font-medium text-gray-700 mb-1.5">URL do Desenvolvedor</label>
                    <input type="url" name="developer_url" id="developer_url" value="{{ old('developer_url', $settings['developer_url'] ?? '') }}"
                           placeholder="https://..."
                           class="block w-full px-3 py-2.5 border border-gray-300 rounded-lg text-gray-900 text-sm focus:ring-2 focus:ring-[#1e40af] focus:border-[#1e40af]">
                </div>
            </div>
        </div>

        <!-- Submit -->
        <div class="flex items-center justify-end space-x-3 pt-4 border-t border-gray-200">
            <button type="submit"
                    class="px-5 py-2.5 bg-[#1e40af] text-white text-sm font-semibold rounded-lg
                           hover:bg-[#1e3a8a] transition-colors shadow-sm">
                Guardar Configurações
            </button>
        </div>
    </form>
</div>
@endsection
