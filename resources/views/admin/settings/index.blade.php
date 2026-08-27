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
        @method('PUT')

        <!-- Club Info -->
        <div>
            <h2 class="text-lg font-semibold text-gray-900 mb-4 pb-2 border-b border-gray-200">Informações do Clube</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="club_name" class="block text-sm font-medium text-gray-700 mb-1.5">Nome do Clube</label>
                    <input type="text" name="club_name" id="club_name" value="{{ old('club_name', $settings['club_name'] ?? '') }}"
                           class="block w-full px-3 py-2.5 border border-gray-300 rounded-lg text-gray-900 text-sm focus:ring-2 focus:ring-[#1e40af] focus:border-[#1e40af]">
                    @error('club_name') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label for="club_founded" class="block text-sm font-medium text-gray-700 mb-1.5">Ano de Fundação</label>
                    <input type="number" name="club_founded" id="club_founded" value="{{ old('club_founded', $settings['club_founded'] ?? '') }}"
                           class="block w-full px-3 py-2.5 border border-gray-300 rounded-lg text-gray-900 text-sm focus:ring-2 focus:ring-[#1e40af] focus:border-[#1e40af]">
                    @error('club_founded') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>
                <div class="md:col-span-2">
                    <label for="club_address" class="block text-sm font-medium text-gray-700 mb-1.5">Morada</label>
                    <input type="text" name="club_address" id="club_address" value="{{ old('club_address', $settings['club_address'] ?? '') }}"
                           class="block w-full px-3 py-2.5 border border-gray-300 rounded-lg text-gray-900 text-sm focus:ring-2 focus:ring-[#1e40af] focus:border-[#1e40af]">
                    @error('club_address') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>
                <div class="md:col-span-2">
                    <label for="club_description" class="block text-sm font-medium text-gray-700 mb-1.5">Descrição do Clube</label>
                    <textarea name="club_description" id="club_description" rows="3"
                              class="block w-full px-3 py-2.5 border border-gray-300 rounded-lg text-gray-900 text-sm focus:ring-2 focus:ring-[#1e40af] focus:border-[#1e40af]">{{ old('club_description', $settings['club_description'] ?? '') }}</textarea>
                    @error('club_description') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>
            </div>
        </div>

        <!-- Contact -->
        <div>
            <h2 class="text-lg font-semibold text-gray-900 mb-4 pb-2 border-b border-gray-200">Contacto</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="contact_email" class="block text-sm font-medium text-gray-700 mb-1.5">E-mail</label>
                    <input type="email" name="contact_email" id="contact_email" value="{{ old('contact_email', $settings['contact_email'] ?? '') }}"
                           class="block w-full px-3 py-2.5 border border-gray-300 rounded-lg text-gray-900 text-sm focus:ring-2 focus:ring-[#1e40af] focus:border-[#1e40af]">
                    @error('contact_email') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label for="contact_phone" class="block text-sm font-medium text-gray-700 mb-1.5">Telefone</label>
                    <input type="text" name="contact_phone" id="contact_phone" value="{{ old('contact_phone', $settings['contact_phone'] ?? '') }}"
                           class="block w-full px-3 py-2.5 border border-gray-300 rounded-lg text-gray-900 text-sm focus:ring-2 focus:ring-[#1e40af] focus:border-[#1e40af]">
                    @error('contact_phone') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>
            </div>
        </div>

        <!-- Social -->
        <div>
            <h2 class="text-lg font-semibold text-gray-900 mb-4 pb-2 border-b border-gray-200">Redes Sociais</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="facebook_url" class="block text-sm font-medium text-gray-700 mb-1.5">Facebook URL</label>
                    <input type="url" name="facebook_url" id="facebook_url" value="{{ old('facebook_url', $settings['facebook_url'] ?? '') }}"
                           placeholder="https://facebook.com/..."
                           class="block w-full px-3 py-2.5 border border-gray-300 rounded-lg text-gray-900 text-sm focus:ring-2 focus:ring-[#1e40af] focus:border-[#1e40af]">
                    @error('facebook_url') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label for="instagram_url" class="block text-sm font-medium text-gray-700 mb-1.5">Instagram URL</label>
                    <input type="url" name="instagram_url" id="instagram_url" value="{{ old('instagram_url', $settings['instagram_url'] ?? '') }}"
                           placeholder="https://instagram.com/..."
                           class="block w-full px-3 py-2.5 border border-gray-300 rounded-lg text-gray-900 text-sm focus:ring-2 focus:ring-[#1e40af] focus:border-[#1e40af]">
                    @error('instagram_url') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label for="youtube_url" class="block text-sm font-medium text-gray-700 mb-1.5">YouTube URL</label>
                    <input type="url" name="youtube_url" id="youtube_url" value="{{ old('youtube_url', $settings['youtube_url'] ?? '') }}"
                           placeholder="https://youtube.com/..."
                           class="block w-full px-3 py-2.5 border border-gray-300 rounded-lg text-gray-900 text-sm focus:ring-2 focus:ring-[#1e40af] focus:border-[#1e40af]">
                    @error('youtube_url') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label for="twitter_url" class="block text-sm font-medium text-gray-700 mb-1.5">Twitter/X URL</label>
                    <input type="url" name="twitter_url" id="twitter_url" value="{{ old('twitter_url', $settings['twitter_url'] ?? '') }}"
                           placeholder="https://twitter.com/..."
                           class="block w-full px-3 py-2.5 border border-gray-300 rounded-lg text-gray-900 text-sm focus:ring-2 focus:ring-[#1e40af] focus:border-[#1e40af]">
                    @error('twitter_url') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>
            </div>
        </div>

        <!-- Footer / Meta -->
        <div>
            <h2 class="text-lg font-semibold text-gray-900 mb-4 pb-2 border-b border-gray-200">Rodapé & Meta</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="md:col-span-2">
                    <label for="footer_text" class="block text-sm font-medium text-gray-700 mb-1.5">Texto do Rodapé</label>
                    <input type="text" name="footer_text" id="footer_text" value="{{ old('footer_text', $settings['footer_text'] ?? '') }}"
                           class="block w-full px-3 py-2.5 border border-gray-300 rounded-lg text-gray-900 text-sm focus:ring-2 focus:ring-[#1e40af] focus:border-[#1e40af]">
                    @error('footer_text') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>
                <div class="md:col-span-2">
                    <label for="meta_description" class="block text-sm font-medium text-gray-700 mb-1.5">Meta Descrição (SEO)</label>
                    <textarea name="meta_description" id="meta_description" rows="2"
                              class="block w-full px-3 py-2.5 border border-gray-300 rounded-lg text-gray-900 text-sm focus:ring-2 focus:ring-[#1e40af] focus:border-[#1e40af]">{{ old('meta_description', $settings['meta_description'] ?? '') }}</textarea>
                    @error('meta_description') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
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
