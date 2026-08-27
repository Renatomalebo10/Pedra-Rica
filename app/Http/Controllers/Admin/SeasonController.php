<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Season;
use Illuminate\Http\Request;

class SeasonController extends Controller
{
    public function index()
    {
        $seasons = Season::withCount(['players', 'games', 'trophies'])
            ->latest('name')
            ->paginate(15);

        return view('admin.seasons.index', compact('seasons'));
    }

    public function create()
    {
        return view('admin.seasons.form');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:seasons,name'],
            'is_current' => ['boolean'],
        ]);

        $validated['is_current'] = $request->boolean('is_current');

        if ($validated['is_current']) {
            Season::query()->update(['is_current' => false]);
        }

        Season::create($validated);

        return redirect()->route('admin.seasons.index')
            ->with('success', 'Season created successfully.');
    }

    public function show(Season $season)
    {
        $season->load(['players', 'games', 'trophies']);

        return view('admin.seasons.show', compact('season'));
    }

    public function edit(Season $season)
    {
        return view('admin.seasons.form', compact('season'));
    }

    public function update(Request $request, Season $season)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:seasons,name,'.$season->id],
            'is_current' => ['boolean'],
        ]);

        $validated['is_current'] = $request->boolean('is_current');

        if ($validated['is_current']) {
            Season::query()->where('id', '!=', $season->id)->update(['is_current' => false]);
        }

        $season->update($validated);

        return redirect()->route('admin.seasons.index')
            ->with('success', 'Season updated successfully.');
    }

    public function destroy(Season $season)
    {
        $season->delete();

        return redirect()->route('admin.seasons.index')
            ->with('success', 'Season deleted successfully.');
    }
}
