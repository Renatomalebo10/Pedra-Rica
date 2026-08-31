<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Competition;
use App\Models\Game;
use App\Models\Season;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class GameController extends Controller
{
    public function index(Request $request)
    {
        $query = Game::with(['competition', 'season']);

        if ($search = $request->input('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('opponent', 'like', "%{$search}%")
                    ->orWhere('location', 'like', "%{$search}%");
            });
        }

        if ($request->filled('status')) {
            $query->where('status', $request->input('status'));
        }

        if ($request->filled('season_id')) {
            $query->where('season_id', $request->input('season_id'));
        }

        if ($request->filled('competition_id')) {
            $query->where('competition_id', $request->input('competition_id'));
        }

        $games = $query->latest('match_date')->paginate(15)->withQueryString();
        $seasons = Season::orderByDesc('is_current')->orderByDesc('name')->get();
        $competitions = Competition::orderBy('name')->get();

        return view('admin.games.index', compact('games', 'seasons', 'competitions'));
    }

    public function create()
    {
        $seasons = Season::orderByDesc('is_current')->orderByDesc('name')->get();
        $competitions = Competition::orderBy('name')->get();

        return view('admin.games.form', compact('seasons', 'competitions'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'opponent' => ['required', 'string', 'max:255'],
            'opponent_logo' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp,svg', 'max:10240'],
            'match_date' => ['required', 'date'],
            'match_time' => ['nullable', 'string', 'max:5'],
            'location' => ['nullable', 'string', 'max:255'],
            'competition_id' => ['nullable', 'exists:competitions,id'],
            'season_id' => ['nullable', 'exists:seasons,id'],
            'our_score' => ['nullable', 'integer', 'min:0'],
            'opponent_score' => ['nullable', 'integer', 'min:0'],
            'status' => ['required', 'in:upcoming,played,cancelled'],
            'notes' => ['nullable', 'string'],
        ]);

        if ($request->hasFile('opponent_logo')) {
            $validated['opponent_logo'] = $this->uploadImage($request->file('opponent_logo'), 'logos');
        }

        Game::create($validated);

        return redirect()->route('admin.games.index')
            ->with('success', 'Game created successfully.');
    }

    public function show(Game $game)
    {
        $game->load(['competition', 'season']);

        return view('admin.games.show', compact('game'));
    }

    public function edit(Game $game)
    {
        $seasons = Season::orderByDesc('is_current')->orderByDesc('name')->get();
        $competitions = Competition::orderBy('name')->get();

        return view('admin.games.form', compact('game', 'seasons', 'competitions'));
    }

    public function update(Request $request, Game $game)
    {
        $validated = $request->validate([
            'opponent' => ['required', 'string', 'max:255'],
            'opponent_logo' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp,svg', 'max:10240'],
            'match_date' => ['required', 'date'],
            'match_time' => ['nullable', 'string', 'max:5'],
            'location' => ['nullable', 'string', 'max:255'],
            'competition_id' => ['nullable', 'exists:competitions,id'],
            'season_id' => ['nullable', 'exists:seasons,id'],
            'our_score' => ['nullable', 'integer', 'min:0'],
            'opponent_score' => ['nullable', 'integer', 'min:0'],
            'status' => ['required', 'in:upcoming,played,cancelled'],
            'notes' => ['nullable', 'string'],
        ]);

        if ($request->hasFile('opponent_logo')) {
            if ($game->opponent_logo) {
                Storage::disk('public')->delete($game->opponent_logo);
            }
            $validated['opponent_logo'] = $this->uploadImage($request->file('opponent_logo'), 'logos');
        }

        $game->update($validated);

        return redirect()->route('admin.games.index')
            ->with('success', 'Game updated successfully.');
    }

    public function destroy(Game $game)
    {
        if ($game->opponent_logo) {
            Storage::disk('public')->delete('logos/'.$game->opponent_logo);
        }

        $game->delete();

        return redirect()->route('admin.games.index')
            ->with('success', 'Game deleted successfully.');
    }

    private function uploadImage($file, string $directory): string
    {
        $filename = Str::uuid().'.'.$file->getClientOriginalExtension();
        $file->storeAs($directory, $filename, 'public');

        return $filename;
    }
}
