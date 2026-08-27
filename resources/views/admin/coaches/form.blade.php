@extends('layouts.admin')

@section('page-title', isset($coach) ? 'Editar Treinador' : 'Novo Treinador')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">
    <!-- Header -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">{{ isset($coach) ? 'Editar Treinador' : 'Novo Treinador' }}</h1>
            <p class="text-gray-500 mt-1">{{ isset($coach) ? 'Atualizar dados do treinador' : 'Adicionar novo treinador' }}</p>
        </div>
        <a href="{{ route('admin.coaches.index') }}"
           class="inline-flex items-center px-4 py-2.5 border border-gray-300 text-gray-700 text-sm font-medium rounded-lg hover:bg-gray-50 transition-colors">
            <i data-lucide="arrow-left" class="w-4 h-4 mr-2"></i>
            Voltar
        </a>
    </div>

    <!-- Form -->
    <form action="{{ isset($coach) ? route('admin.coaches.update', $coach) : route('admin.coaches.store') }}"
          method="POST"
          enctype="multipart/form-data"
          class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 space-y-6">
        @csrf
        @if(isset($coach))
            @method('PUT')
        @endif

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Photo -->
            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700 mb-2">Foto</label>
                <div class="flex items-start space-x-6" x-data="{ preview: '{{ isset($coach) && $coach->photo ? asset('storage/' . $coach->photo) : '' }}' }">
                    <div class="w-32 h-32 rounded-xl border-2 border-dashed border-gray-300 overflow-hidden bg-gray-50 flex items-center justify-center">
                        <img x-show="preview" :src="preview" class="w-full h-full object-cover" alt="Preview">
                        <div x-show="!preview" class="text-center">
                            <i data-lucide="camera" class="w-8 h-8 text-gray-300 mx-auto"></i>
                            <span class="text-xs text-gray-400 mt-1 block">Foto</span>
                        </div>
                    </div>
                    <div class="flex-1">
                        <input type="file" name="photo" accept="image/*"
                               @change="const file = $event.target.files[0]; if (file) { const reader = new FileReader(); reader.onload = (e) => { preview = e.target.result; }; reader.readAsDataURL(file); }"
                               class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-[#1e40af] hover:file:bg-blue-100">
                        <p class="mt-1 text-xs text-gray-400">JPG, PNG ou WEBP. Max 2MB.</p>
                    </div>
                </div>
            </div>

            <!-- Name -->
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 mb-1.5">Nome *</label>
                <input type="text" name="name" id="name" value="{{ old('name', $coach->name ?? '') }}" required
                       class="block w-full px-3 py-2.5 border border-gray-300 rounded-lg text-gray-900 text-sm focus:ring-2 focus:ring-[#1e40af] focus:border-[#1e40af]">
                @error('name') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>

            <!-- Role -->
            <div>
                <label for="role" class="block text-sm font-medium text-gray-700 mb-1.5">Função</label>
                <select name="role" id="role"
                        class="block w-full px-3 py-2.5 border border-gray-300 rounded-lg text-gray-900 text-sm focus:ring-2 focus:ring-[#1e40af] focus:border-[#1e40af]">
                    <option value="">Selecionar função</option>
                    @foreach(['Treinador Principal', 'Treinador Adjunto', 'Preparador Físico', 'Treinador de Guarda-Redes', 'Coordenador Técnico'] as $r)
                        <option value="{{ $r }}" {{ old('role', $coach->role ?? '') === $r ? 'selected' : '' }}>{{ $r }}</option>
                    @endforeach
                </select>
                @error('role') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>

            <!-- Year Joined -->
            <div>
                <label for="year_joined" class="block text-sm font-medium text-gray-700 mb-1.5">Ano de Entrada</label>
                <input type="number" name="year_joined" id="year_joined" value="{{ old('year_joined', $coach->year_joined ?? '') }}"
                       min="1900" max="{{ date('Y') }}"
                       class="block w-full px-3 py-2.5 border border-gray-300 rounded-lg text-gray-900 text-sm focus:ring-2 focus:ring-[#1e40af] focus:border-[#1e40af]">
                @error('year_joined') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>
        </div>

        <!-- Biography -->
        <div>
            <label for="biography" class="block text-sm font-medium text-gray-700 mb-1.5">Biografia</label>
            <textarea name="biography" id="biography" rows="4"
                      class="block w-full px-3 py-2.5 border border-gray-300 rounded-lg text-gray-900 text-sm focus:ring-2 focus:ring-[#1e40af] focus:border-[#1e40af]">{{ old('biography', $coach->biography ?? '') }}</textarea>
            @error('biography') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
        </div>

        <!-- Active -->
        <div class="flex items-center">
            <input type="hidden" name="is_active" value="0">
            <input type="checkbox" name="is_active" id="is_active" value="1"
                   {{ old('is_active', $coach->is_active ?? 1) ? 'checked' : '' }}
                   class="w-4 h-4 text-[#1e40af] border-gray-300 rounded focus:ring-[#1e40af]">
            <label for="is_active" class="ml-2 text-sm text-gray-700">Treinador ativo</label>
        </div>

        <!-- Submit -->
        <div class="flex items-center justify-end space-x-3 pt-4 border-t border-gray-200">
            <a href="{{ route('admin.coaches.index') }}"
               class="px-5 py-2.5 border border-gray-300 text-gray-700 text-sm font-medium rounded-lg hover:bg-gray-50 transition-colors">
                Cancelar
            </a>
            <button type="submit"
                    class="px-5 py-2.5 bg-[#1e40af] text-white text-sm font-semibold rounded-lg hover:bg-[#1e3a8a] transition-colors shadow-sm">
                {{ isset($coach) ? 'Atualizar' : 'Criar Treinador' }}
            </button>
        </div>
    </form>
</div>
@endsection
