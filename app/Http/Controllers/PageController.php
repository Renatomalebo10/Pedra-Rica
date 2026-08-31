<?php

namespace App\Http\Controllers;

use App\Models\Coach;
use App\Models\Competition;
use App\Models\Gallery;
use App\Models\GalleryCategory;
use App\Models\Game;
use App\Models\HistoryEvent;
use App\Models\News;
use App\Models\Player;
use App\Models\Season;
use App\Models\Setting;
use App\Models\SocialLink;
use App\Models\Trophy;
use Illuminate\Contracts\View\View;

class PageController extends Controller
{
    public function about(): View
    {
        $settings = Setting::pluck('value', 'key')->toArray();

        return view('pages.about', compact('settings'));
    }

    public function history(): View
    {
        $historyEvents = HistoryEvent::all();

        return view('pages.history', compact('historyEvents'));
    }

    public function founder(): View
    {
        $settings = Setting::pluck('value', 'key')->toArray();

        return view('pages.founder', compact('settings'));
    }

    public function players(): View
    {
        $players = Player::active()->with('season')->orderByRaw('number IS NULL')->orderBy('number')->get();

        return view('pages.players', compact('players'));
    }

    public function playerDetail(Player $player): View
    {
        $player->load('season');

        return view('pages.player-detail', compact('player'));
    }

    public function coaches(): View
    {
        $coaches = Coach::active()->get();

        return view('pages.coaches', compact('coaches'));
    }

    public function games(): View
    {
        $upcomingGames = Game::where('status', 'upcoming')
            ->with('competition')
            ->orderBy('match_date')
            ->get();

        $playedGames = Game::where('status', 'played')
            ->with('competition')
            ->latest('match_date')
            ->get();

        $competitions = Competition::all();
        $seasons = Season::all();

        return view('pages.games', compact(
            'upcomingGames',
            'playedGames',
            'competitions',
            'seasons',
        ));
    }

    public function competitions(): View
    {
        $competitions = Competition::all();

        return view('pages.competitions', compact('competitions'));
    }

    public function trophies(): View
    {
        $trophies = Trophy::with('season')->get();

        return view('pages.trophies', compact('trophies'));
    }

    public function gallery(): View
    {
        $galleryImages = Gallery::with('category')->get();
        $galleryCategories = GalleryCategory::all();

        return view('pages.gallery', compact('galleryImages', 'galleryCategories'));
    }

    public function galleryCategory(GalleryCategory $category): View
    {
        $images = $category->images()->get();

        return view('pages.gallery-category', compact('category', 'images'));
    }

    public function news(): View
    {
        $news = News::published()->latest('published_at')->get();

        return view('pages.news', compact('news'));
    }

    public function newsDetail(News $news): View
    {
        return view('pages.news-detail', compact('news'));
    }

    public function impact(): View
    {
        $settings = Setting::pluck('value', 'key')->toArray();
        $playerCount = Player::active()->count();
        $coachCount = Coach::active()->count();

        return view('pages.impact', compact('settings', 'playerCount', 'coachCount'));
    }

    public function evangelization(): View
    {
        $settings = Setting::pluck('value', 'key')->toArray();

        return view('pages.evangelization', compact('settings'));
    }

    public function contact(): View
    {
        $settings = Setting::pluck('value', 'key')->toArray();
        $socialLinks = SocialLink::active()->orderBy('sort_order')->get();

        return view('pages.contact', compact('settings', 'socialLinks'));
    }

    public function timeline(): View
    {
        $historyEvents = HistoryEvent::all();

        return view('pages.timeline', compact('historyEvents'));
    }
}
