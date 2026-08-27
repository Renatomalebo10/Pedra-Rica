@extends('layouts.admin')

@section('page-title', 'Dashboard')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div>
        <h1 class="text-2xl font-bold text-gray-900">Dashboard</h1>
        <p class="text-gray-500 mt-1">Visão geral do sistema</p>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        <!-- Jogadores -->
        <a href="{{ route('admin.players.index') }}" class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-md transition-shadow group">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500">Jogadores</p>
                    <p class="text-3xl font-bold text-gray-900 mt-1">{{ $players }}</p>
                </div>
                <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center group-hover:bg-blue-200 transition-colors">
                    <i data-lucide="users" class="w-6 h-6 text-[#1e40af]"></i>
                </div>
            </div>
        </a>

        <!-- Treinadores -->
        <a href="{{ route('admin.coaches.index') }}" class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-md transition-shadow group">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500">Treinadores</p>
                    <p class="text-3xl font-bold text-gray-900 mt-1">{{ $coaches }}</p>
                </div>
                <div class="w-12 h-12 bg-indigo-100 rounded-xl flex items-center justify-center group-hover:bg-indigo-200 transition-colors">
                    <i data-lucide="user-check" class="w-6 h-6 text-indigo-600"></i>
                </div>
            </div>
        </a>

        <!-- Jogos -->
        <a href="{{ route('admin.games.index') }}" class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-md transition-shadow group">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500">Jogos</p>
                    <p class="text-3xl font-bold text-gray-900 mt-1">{{ $games }}</p>
                </div>
                <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center group-hover:bg-green-200 transition-colors">
                    <i data-lucide="calendar" class="w-6 h-6 text-green-600"></i>
                </div>
            </div>
        </a>

        <!-- Competições -->
        <a href="{{ route('admin.competitions.index') }}" class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-md transition-shadow group">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500">Competições</p>
                    <p class="text-3xl font-bold text-gray-900 mt-1">{{ $competitions }}</p>
                </div>
                <div class="w-12 h-12 bg-yellow-100 rounded-xl flex items-center justify-center group-hover:bg-yellow-200 transition-colors">
                    <i data-lucide="trophy" class="w-6 h-6 text-yellow-600"></i>
                </div>
            </div>
        </a>

        <!-- Títulos -->
        <a href="{{ route('admin.trophies.index') }}" class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-md transition-shadow group">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500">Títulos</p>
                    <p class="text-3xl font-bold text-gray-900 mt-1">{{ $trophies }}</p>
                </div>
                <div class="w-12 h-12 bg-amber-100 rounded-xl flex items-center justify-center group-hover:bg-amber-200 transition-colors">
                    <i data-lucide="award" class="w-6 h-6 text-amber-600"></i>
                </div>
            </div>
        </a>

        <!-- Galeria -->
        <a href="{{ route('admin.gallery.index') }}" class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-md transition-shadow group">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500">Galeria</p>
                    <p class="text-3xl font-bold text-gray-900 mt-1">{{ $galleryImages }}</p>
                </div>
                <div class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center group-hover:bg-purple-200 transition-colors">
                    <i data-lucide="image" class="w-6 h-6 text-purple-600"></i>
                </div>
            </div>
        </a>

        <!-- Notícias -->
        <a href="{{ route('admin.news.index') }}" class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-md transition-shadow group">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500">Notícias</p>
                    <p class="text-3xl font-bold text-gray-900 mt-1">{{ $news }}</p>
                </div>
                <div class="w-12 h-12 bg-rose-100 rounded-xl flex items-center justify-center group-hover:bg-rose-200 transition-colors">
                    <i data-lucide="newspaper" class="w-6 h-6 text-rose-600"></i>
                </div>
            </div>
        </a>

        <!-- Temporadas -->
        <a href="{{ route('admin.seasons.index') }}" class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-md transition-shadow group">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500">Temporadas</p>
                    <p class="text-3xl font-bold text-gray-900 mt-1">{{ $seasons }}</p>
                </div>
                <div class="w-12 h-12 bg-cyan-100 rounded-xl flex items-center justify-center group-hover:bg-cyan-200 transition-colors">
                    <i data-lucide="clock" class="w-6 h-6 text-cyan-600"></i>
                </div>
            </div>
        </a>

        <!-- Eventos Históricos -->
        <a href="{{ route('admin.history-events.index') }}" class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-md transition-shadow group">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500">Eventos Históricos</p>
                    <p class="text-3xl font-bold text-gray-900 mt-1">{{ $historyEvents }}</p>
                </div>
                <div class="w-12 h-12 bg-amber-100 rounded-xl flex items-center justify-center group-hover:bg-amber-200 transition-colors">
                    <i data-lucide="book-open" class="w-6 h-6 text-amber-600"></i>
                </div>
            </div>
        </a>

        <!-- Links Sociais -->
        <a href="{{ route('admin.social-links.index') }}" class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-md transition-shadow group">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500">Links Sociais</p>
                    <p class="text-3xl font-bold text-gray-900 mt-1">{{ $socialLinks }}</p>
                </div>
                <div class="w-12 h-12 bg-teal-100 rounded-xl flex items-center justify-center group-hover:bg-teal-200 transition-colors">
                    <i data-lucide="link" class="w-6 h-6 text-teal-600"></i>
                </div>
            </div>
        </a>
    </div>

    <!-- Quick Actions -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
        <h2 class="text-lg font-semibold text-gray-900 mb-4">Ações Rápidas</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3">
            <a href="{{ route('admin.players.create') }}" class="flex items-center space-x-3 p-3 rounded-lg border border-gray-200 hover:bg-blue-50 hover:border-blue-200 transition-colors">
                <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                    <i data-lucide="user-plus" class="w-5 h-5 text-[#1e40af]"></i>
                </div>
                <span class="text-sm font-medium text-gray-700">Novo Jogador</span>
            </a>
            <a href="{{ route('admin.coaches.create') }}" class="flex items-center space-x-3 p-3 rounded-lg border border-gray-200 hover:bg-indigo-50 hover:border-indigo-200 transition-colors">
                <div class="w-10 h-10 bg-indigo-100 rounded-lg flex items-center justify-center">
                    <i data-lucide="user-check" class="w-5 h-5 text-indigo-600"></i>
                </div>
                <span class="text-sm font-medium text-gray-700">Novo Treinador</span>
            </a>
            <a href="{{ route('admin.games.create') }}" class="flex items-center space-x-3 p-3 rounded-lg border border-gray-200 hover:bg-green-50 hover:border-green-200 transition-colors">
                <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center">
                    <i data-lucide="calendar-plus" class="w-5 h-5 text-green-600"></i>
                </div>
                <span class="text-sm font-medium text-gray-700">Novo Jogo</span>
            </a>
            <a href="{{ route('admin.news.create') }}" class="flex items-center space-x-3 p-3 rounded-lg border border-gray-200 hover:bg-rose-50 hover:border-rose-200 transition-colors">
                <div class="w-10 h-10 bg-rose-100 rounded-lg flex items-center justify-center">
                    <i data-lucide="file-plus" class="w-5 h-5 text-rose-600"></i>
                </div>
                <span class="text-sm font-medium text-gray-700">Nova Notícia</span>
            </a>
            <a href="{{ route('admin.history-events.create') }}" class="flex items-center space-x-3 p-3 rounded-lg border border-gray-200 hover:bg-amber-50 hover:border-amber-200 transition-colors">
                <div class="w-10 h-10 bg-amber-100 rounded-lg flex items-center justify-center">
                    <i data-lucide="book-open" class="w-5 h-5 text-amber-600"></i>
                </div>
                <span class="text-sm font-medium text-gray-700">Novo Evento Histórico</span>
            </a>
            <a href="{{ route('admin.trophies.create') }}" class="flex items-center space-x-3 p-3 rounded-lg border border-gray-200 hover:bg-yellow-50 hover:border-yellow-200 transition-colors">
                <div class="w-10 h-10 bg-yellow-100 rounded-lg flex items-center justify-center">
                    <i data-lucide="award" class="w-5 h-5 text-yellow-600"></i>
                </div>
                <span class="text-sm font-medium text-gray-700">Novo Título</span>
            </a>
            <a href="{{ route('admin.gallery.create') }}" class="flex items-center space-x-3 p-3 rounded-lg border border-gray-200 hover:bg-purple-50 hover:border-purple-200 transition-colors">
                <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center">
                    <i data-lucide="upload" class="w-5 h-5 text-purple-600"></i>
                </div>
                <span class="text-sm font-medium text-gray-700">Upload Galeria</span>
            </a>
            <a href="{{ route('admin.seasons.create') }}" class="flex items-center space-x-3 p-3 rounded-lg border border-gray-200 hover:bg-cyan-50 hover:border-cyan-200 transition-colors">
                <div class="w-10 h-10 bg-cyan-100 rounded-lg flex items-center justify-center">
                    <i data-lucide="clock" class="w-5 h-5 text-cyan-600"></i>
                </div>
                <span class="text-sm font-medium text-gray-700">Nova Temporada</span>
            </a>
        </div>
    </div>
</div>
@endsection
