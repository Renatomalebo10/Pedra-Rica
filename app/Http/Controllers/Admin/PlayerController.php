<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Player;
use App\Models\Season;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PlayerController extends Controller
{
    public function index(Request $request)
    {
        $query = Player::with('season');

        if ($search = $request->input('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('position', 'like', "%{$search}%");
            });
        }

        if ($request->filled('season_id')) {
            $query->where('season_id', $request->input('season_id'));
        }

        if ($request->filled('is_active')) {
            $query->where('is_active', $request->boolean('is_active'));
        }

        $players = $query->latest()->paginate(15)->withQueryString();

        return view('admin.players.index', compact('players'));
    }

    public function create()
    {
        $seasons = Season::orderByDesc('is_current')->orderByDesc('name')->get();

        return view('admin.players.form', compact('seasons'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'photo' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'number' => ['nullable', 'integer', 'min:0', 'max:99'],
            'position' => ['nullable', 'string', 'max:255'],
            'biography' => ['nullable', 'string'],
            'season_id' => ['nullable', 'exists:seasons,id'],
            'is_active' => ['boolean'],
            'goals' => ['nullable', 'integer', 'min:0'],
            'assists' => ['nullable', 'integer', 'min:0'],
            'yellow_cards' => ['nullable', 'integer', 'min:0'],
            'red_cards' => ['nullable', 'integer', 'min:0'],
            'matches_played' => ['nullable', 'integer', 'min:0'],
        ]);

        if ($request->hasFile('photo')) {
            $validated['photo'] = $this->uploadImage($request->file('photo'), 'players');
        }

        $validated['is_active'] = $request->boolean('is_active');

        Player::create($validated);

        return redirect()->route('admin.players.index')
            ->with('success', 'Player created successfully.');
    }

    public function show(Player $player)
    {
        $player->load('season');

        return view('admin.players.show', compact('player'));
    }

    public function edit(Player $player)
    {
        $seasons = Season::orderByDesc('is_current')->orderByDesc('name')->get();

        return view('admin.players.form', compact('player', 'seasons'));
    }

    public function update(Request $request, Player $player)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'photo' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'number' => ['nullable', 'integer', 'min:0', 'max:99'],
            'position' => ['nullable', 'string', 'max:255'],
            'biography' => ['nullable', 'string'],
            'season_id' => ['nullable', 'exists:seasons,id'],
            'is_active' => ['boolean'],
            'goals' => ['nullable', 'integer', 'min:0'],
            'assists' => ['nullable', 'integer', 'min:0'],
            'yellow_cards' => ['nullable', 'integer', 'min:0'],
            'red_cards' => ['nullable', 'integer', 'min:0'],
            'matches_played' => ['nullable', 'integer', 'min:0'],
        ]);

        if ($request->hasFile('photo')) {
            if ($player->photo) {
                Storage::disk('public')->delete($player->photo);
            }
            $validated['photo'] = $this->uploadImage($request->file('photo'), 'players');
        }

        $validated['is_active'] = $request->boolean('is_active');

        $player->update($validated);

        return redirect()->route('admin.players.index')
            ->with('success', 'Player updated successfully.');
    }

    public function destroy(Player $player)
    {
        if ($player->photo) {
            Storage::disk('public')->delete('players/'.$player->photo);
        }

        $player->delete();

        return redirect()->route('admin.players.index')
            ->with('success', 'Player deleted successfully.');
    }

    private function uploadImage($file, string $directory): string
    {
        $filename = Str::uuid().'.'.$file->getClientOriginalExtension();
        $file->storeAs($directory, $filename, 'public');

        return $filename;
    }
}
