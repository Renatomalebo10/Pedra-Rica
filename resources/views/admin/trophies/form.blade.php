@extends('layouts.admin')

@section('page-title', isset($trophy) ? 'Editar Título' : 'Novo Título')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">
    <!-- Header -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">{{ isset($trophy) ? 'Editar Título' : 'Novo Título' }}</h1>
            <p class="text-gray-500 mt-1">{{ isset($trophy) ? 'Atualizar dados do título' : 'Adicionar novo título' }}</p>
        </div>
        <a href="{{ route('admin.trophies.index') }}"
           class="inline-flex items-center px-4 py-2.5 border border-gray-300 text-gray-700 text-sm font-medium rounded-lg hover:bg-gray-50 transition-colors">
            <i data-lucide="arrow-left" class="w-4 h-4 mr-2"></i>
            Voltar
        </a>
    </div>

    <!-- Form -->
    <form action="{{ isset($trophy) ? route('admin.trophies.update', $trophy) : route('admin.trophies.store') }}"
          method="POST"
          enctype="multipart/form-data"
          class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 space-y-6">
        @csrf
        @if(isset($trophy))
            @method('PUT')
        @endif

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Name -->
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 mb-1.5">Nome *</label>
                <input type="text" name="name" id="name" value="{{ old('name', $trophy->name ?? '') }}" required
                       class="block w-full px-3 py-2.5 border border-gray-300 rounded-lg text-gray-900 text-sm focus:ring-2 focus:ring-[#1e40af] focus:border-[#1e40af]">
                @error('name') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>

            <!-- Competition -->
            <div>
                <label for="competition" class="block text-sm font-medium text-gray-700 mb-1.5">Competição</label>
                <input type="text" name="competition" id="competition" value="{{ old('competition', $trophy->competition ?? '') }}"
                       placeholder="Ex.: Campeonato Nacional"
                       class="block w-full px-3 py-2.5 border border-gray-300 rounded-lg text-gray-900 text-sm focus:ring-2 focus:ring-[#1e40af] focus:border-[#1e40af]">
                @error('competition') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>

            <!-- Year -->
            <div>
                <label for="year" class="block text-sm font-medium text-gray-700 mb-1.5">Ano *</label>
                <input type="number" name="year" id="year" value="{{ old('year', $trophy->year ?? '') }}" required
                       min="1900" max="{{ date('Y') }}"
                       class="block w-full px-3 py-2.5 border border-gray-300 rounded-lg text-gray-900 text-sm focus:ring-2 focus:ring-[#1e40af] focus:border-[#1e40af]">
                @error('year') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>

            <!-- Season -->
            <div>
                <label for="season_id" class="block text-sm font-medium text-gray-700 mb-1.5">Temporada</label>
                <select name="season_id" id="season_id"
                        class="block w-full px-3 py-2.5 border border-gray-300 rounded-lg text-gray-900 text-sm focus:ring-2 focus:ring-[#1e40af] focus:border-[#1e40af]">
                    <option value="">Selecionar temporada</option>
                    @foreach($seasons ?? [] as $season)
                        <option value="{{ $season->id }}" {{ old('season_id', $trophy->season_id ?? '') == $season->id ? 'selected' : '' }}>
                            {{ $season->name }}
                        </option>
                    @endforeach
                </select>
                @error('season_id') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>

            <!-- Photo -->
            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700 mb-2">Foto</label>
                <div class="flex items-start space-x-6">
                    @if(isset($trophy) && $trophy->photo)
                        <img src="{{ asset('storage/' . $trophy->photo) }}" class="w-24 h-24 rounded-xl object-cover" alt="">
                    @endif
                    <div class="flex-1">
                        <input type="file" name="photo" accept="image/*"
                               class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-[#1e40af] hover:file:bg-blue-100">
                        <p class="mt-1 text-xs text-gray-400">JPG, PNG ou WEBP. Max 10MB.</p>
                    </div>
                </div>
                @error('photo') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>
        </div>

        <!-- Description -->
        <div>
            <label for="description" class="block text-sm font-medium text-gray-700 mb-1.5">Descrição</label>
            <textarea name="description" id="description" rows="3"
                      class="block w-full px-3 py-2.5 border border-gray-300 rounded-lg text-gray-900 text-sm focus:ring-2 focus:ring-[#1e40af] focus:border-[#1e40af]">{{ old('description', $trophy->description ?? '') }}</textarea>
            @error('description') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
        </div>

        <!-- Submit -->
        <div class="flex items-center justify-end space-x-3 pt-4 border-t border-gray-200">
            <a href="{{ route('admin.trophies.index') }}" class="px-5 py-2.5 border border-gray-300 text-gray-700 text-sm font-medium rounded-lg hover:bg-gray-50 transition-colors">Cancelar</a>
            <button type="submit" class="px-5 py-2.5 bg-[#1e40af] text-white text-sm font-semibold rounded-lg hover:bg-[#1e3a8a] transition-colors shadow-sm">
                {{ isset($trophy) ? 'Atualizar' : 'Criar Título' }}
            </button>
        </div>
    </form>
</div>
@endsection
