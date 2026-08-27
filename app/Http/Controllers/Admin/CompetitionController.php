<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Competition;
use Illuminate\Http\Request;

class CompetitionController extends Controller
{
    public function index(Request $request)
    {
        $query = Competition::query();

        if ($search = $request->input('search')) {
            $query->where('name', 'like', "%{$search}%");
        }

        $competitions = $query->withCount('games')->latest()->paginate(15)->withQueryString();

        return view('admin.competitions.index', compact('competitions'));
    }

    public function create()
    {
        return view('admin.competitions.form');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
        ]);

        Competition::create($validated);

        return redirect()->route('admin.competitions.index')
            ->with('success', 'Competition created successfully.');
    }

    public function show(Competition $competition)
    {
        $competition->load('games');

        return view('admin.competitions.show', compact('competition'));
    }

    public function edit(Competition $competition)
    {
        return view('admin.competitions.form', compact('competition'));
    }

    public function update(Request $request, Competition $competition)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
        ]);

        $competition->update($validated);

        return redirect()->route('admin.competitions.index')
            ->with('success', 'Competition updated successfully.');
    }

    public function destroy(Competition $competition)
    {
        $competition->delete();

        return redirect()->route('admin.competitions.index')
            ->with('success', 'Competition deleted successfully.');
    }
}
