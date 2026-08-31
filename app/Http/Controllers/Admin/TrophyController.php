<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Season;
use App\Models\Trophy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class TrophyController extends Controller
{
    public function index(Request $request)
    {
        $query = Trophy::with('season');

        if ($search = $request->input('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('competition', 'like', "%{$search}%");
            });
        }

        if ($request->filled('season_id')) {
            $query->where('season_id', $request->input('season_id'));
        }

        $trophies = $query->latest('year')->paginate(15)->withQueryString();
        $seasons = Season::orderByDesc('is_current')->orderByDesc('name')->get();

        return view('admin.trophies.index', compact('trophies', 'seasons'));
    }

    public function create()
    {
        $seasons = Season::orderByDesc('is_current')->orderByDesc('name')->get();

        return view('admin.trophies.form', compact('seasons'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'competition' => ['nullable', 'string', 'max:255'],
            'year' => ['required', 'integer', 'min:1900', 'max:'.(date('Y') + 1)],
            'season_id' => ['nullable', 'exists:seasons,id'],
            'description' => ['nullable', 'string'],
            'photo' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:10240'],
        ]);

        if ($request->hasFile('photo')) {
            $validated['photo'] = $this->uploadImage($request->file('photo'), 'trophies');
        }

        Trophy::create($validated);

        return redirect()->route('admin.trophies.index')
            ->with('success', 'Trophy created successfully.');
    }

    public function show(Trophy $trophy)
    {
        $trophy->load('season');

        return view('admin.trophies.show', compact('trophy'));
    }

    public function edit(Trophy $trophy)
    {
        $seasons = Season::orderByDesc('is_current')->orderByDesc('name')->get();

        return view('admin.trophies.form', compact('trophy', 'seasons'));
    }

    public function update(Request $request, Trophy $trophy)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'competition' => ['nullable', 'string', 'max:255'],
            'year' => ['required', 'integer', 'min:1900', 'max:'.(date('Y') + 1)],
            'season_id' => ['nullable', 'exists:seasons,id'],
            'description' => ['nullable', 'string'],
            'photo' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:10240'],
        ]);

        if ($request->hasFile('photo')) {
            if ($trophy->photo) {
                Storage::disk('public')->delete($trophy->photo);
            }
            $validated['photo'] = $this->uploadImage($request->file('photo'), 'trophies');
        }

        $trophy->update($validated);

        return redirect()->route('admin.trophies.index')
            ->with('success', 'Trophy updated successfully.');
    }

    public function destroy(Trophy $trophy)
    {
        if ($trophy->photo) {
            Storage::disk('public')->delete($trophy->photo);
        }

        $trophy->delete();

        return redirect()->route('admin.trophies.index')
            ->with('success', 'Trophy deleted successfully.');
    }

    private function uploadImage($file, string $directory): string
    {
        $filename = Str::uuid().'.'.$file->getClientOriginalExtension();
        $file->storeAs($directory, $filename, 'public');

        return $filename;
    }
}
