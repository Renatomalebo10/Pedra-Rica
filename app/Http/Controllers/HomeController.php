<?php

namespace App\Http\Controllers;

use App\Models\Coach;
use App\Models\Gallery;
use App\Models\Game;
use App\Models\HistoryEvent;
use App\Models\News;
use App\Models\Player;
use App\Models\Setting;
use App\Models\SocialLink;
use App\Models\Trophy;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $settings = Setting::pluck('value', 'key')->toArray();

        $upcomingMatches = Game::where('status', 'upcoming')
            ->with('competition')
            ->limit(3)
            ->get();

        $latestNews = News::published()
            ->latest('published_at')
            ->limit(3)
            ->get();

        $players = Player::active()
            ->with('season')
            ->limit(8)
            ->get();

        $coaches = Coach::active()->limit(4)->get();

        $trophies = Trophy::with('season')
            ->latest()
            ->limit(6)
            ->get();

        $galleryImages = Gallery::with('category')
            ->latest()
            ->limit(9)
            ->get();

        $historyEvents = HistoryEvent::latest()
            ->limit(3)
            ->get();

        $socialLinks = SocialLink::active()
            ->orderBy('sort_order')
            ->get();

        return view('home', compact(
            'settings',
            'upcomingMatches',
            'latestNews',
            'players',
            'coaches',
            'trophies',
            'galleryImages',
            'historyEvents',
            'socialLinks',
        ));
    }
}
