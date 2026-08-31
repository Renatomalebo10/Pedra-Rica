<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CoachController;
use App\Http\Controllers\Admin\CompetitionController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GalleryCategoryController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\GameController;
use App\Http\Controllers\Admin\HistoryEventController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\PlayerController;
use App\Http\Controllers\Admin\SeasonController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SocialLinkController;
use App\Http\Controllers\Admin\TrophyController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

// Public Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/sobre', [PageController::class, 'about'])->name('pages.about');
Route::get('/historia', [PageController::class, 'history'])->name('pages.history');
Route::get('/fundador', [PageController::class, 'founder'])->name('pages.founder');
Route::get('/jogadores', [PageController::class, 'players'])->name('pages.players');
Route::get('/jogadores/{player}', [PageController::class, 'playerDetail'])->name('pages.player-detail');
Route::get('/treinadores', [PageController::class, 'coaches'])->name('pages.coaches');
Route::get('/jogos', [PageController::class, 'games'])->name('pages.games');
Route::get('/competicoes', [PageController::class, 'competitions'])->name('pages.competitions');
Route::get('/titulos', [PageController::class, 'trophies'])->name('pages.trophies');
Route::get('/galeria', [PageController::class, 'gallery'])->name('pages.gallery');
Route::get('/galeria/{category:slug}', [PageController::class, 'galleryCategory'])->name('pages.gallery-category');
Route::get('/noticias', [PageController::class, 'news'])->name('pages.news');
Route::get('/noticias/{news:slug}', [PageController::class, 'newsDetail'])->name('pages.news-detail');
Route::get('/impacto-social', [PageController::class, 'impact'])->name('pages.impact');
Route::get('/evangelizacao', [PageController::class, 'evangelization'])->name('pages.evangelization');
Route::get('/contato', [PageController::class, 'contact'])->name('pages.contact');
Route::get('/linha-do-tempo', [PageController::class, 'timeline'])->name('pages.timeline');

// Admin Routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('login', [AuthController::class, 'login'])->name('login.post');

    Route::middleware('admin')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        Route::post('logout', [AuthController::class, 'logout'])->name('logout');
        Route::resource('players', PlayerController::class);
        Route::resource('coaches', CoachController::class);
        Route::resource('games', GameController::class);
        Route::resource('seasons', SeasonController::class);
        Route::resource('competitions', CompetitionController::class);
        Route::resource('trophies', TrophyController::class);
        Route::resource('gallery', GalleryController::class)->parameters(['gallery' => 'image']);
        Route::resource('gallery-categories', GalleryCategoryController::class)->parameters(['gallery-categories' => 'category']);
        Route::resource('news', NewsController::class)->parameters(['news' => 'article']);
        Route::resource('history-events', HistoryEventController::class)->parameters(['history-events' => 'event']);
        Route::resource('social-links', SocialLinkController::class);
        Route::get('settings', [SettingController::class, 'index'])->name('settings');
        Route::post('settings', [SettingController::class, 'update'])->name('settings.update');
    });
});

// Serve public storage files
Route::get('storage/{path}', function (string $path) {
    if (config('filesystems.default') === 's3') {
        return redirect()->away(Storage::disk('public')->url($path), 301);
    }

    $fullPath = storage_path('app/public/'.$path);
    if (! file_exists($fullPath)) {
        abort(404);
    }

    $mime = mime_content_type($fullPath);

    return response()->file($fullPath, [
        'Content-Type' => $mime,
        'Cache-Control' => 'public, max-age=86400',
    ]);
})->where('path', '.*')->name('storage.public');
