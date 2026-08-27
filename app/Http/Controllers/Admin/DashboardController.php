<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'players' => Player::count(),
            'coaches' => Coach::count(),
            'games' => Game::count(),
            'seasons' => Season::count(),
            'competitions' => Competition::count(),
            'trophies' => Trophy::count(),
            'galleryImages' => Gallery::count(),
            'galleryCategories' => GalleryCategory::count(),
            'news' => News::count(),
            'historyEvents' => HistoryEvent::count(),
            'settings' => Setting::count(),
            'socialLinks' => SocialLink::count(),
        ]);
    }
}
