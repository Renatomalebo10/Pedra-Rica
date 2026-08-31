<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coach;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CoachController extends Controller
{
    public function index(Request $request)
    {
        $query = Coach::query();

        if ($search = $request->input('search')) {
            $query->where('name', 'like', "%{$search}%");
        }

        if ($request->filled('is_active')) {
            $query->where('is_active', $request->boolean('is_active'));
        }

        $coaches = $query->latest()->paginate(15)->withQueryString();

        return view('admin.coaches.index', compact('coaches'));
    }

    public function create()
    {
        return view('admin.coaches.form');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'photo' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:10240'],
            'role' => ['nullable', 'string', 'max:255'],
            'biography' => ['nullable', 'string'],
            'year_joined' => ['nullable', 'integer', 'min:1900', 'max:'.(date('Y') + 1)],
            'is_active' => ['boolean'],
        ]);

        if ($request->hasFile('photo')) {
            $validated['photo'] = $this->uploadImage($request->file('photo'), 'coaches');
        }

        $validated['role'] = $validated['role'] ?? 'Treinador';

        $validated['is_active'] = $request->boolean('is_active');

        Coach::create($validated);

        return redirect()->route('admin.coaches.index')
            ->with('success', 'Coach created successfully.');
    }

    public function show(Coach $coach)
    {
        return view('admin.coaches.show', compact('coach'));
    }

    public function edit(Coach $coach)
    {
        return view('admin.coaches.form', compact('coach'));
    }

    public function update(Request $request, Coach $coach)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'photo' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:10240'],
            'role' => ['nullable', 'string', 'max:255'],
            'biography' => ['nullable', 'string'],
            'year_joined' => ['nullable', 'integer', 'min:1900', 'max:'.(date('Y') + 1)],
            'is_active' => ['boolean'],
        ]);

        if ($request->hasFile('photo')) {
            if ($coach->photo) {
                Storage::disk('public')->delete($coach->photo);
            }
            $validated['photo'] = $this->uploadImage($request->file('photo'), 'coaches');
        }

        $validated['role'] = $validated['role'] ?? 'Treinador';

        $validated['is_active'] = $request->boolean('is_active');

        $coach->update($validated);

        return redirect()->route('admin.coaches.index')
            ->with('success', 'Coach updated successfully.');
    }

    public function destroy(Coach $coach)
    {
        if ($coach->photo) {
            Storage::disk('public')->delete('coaches/'.$coach->photo);
        }

        $coach->delete();

        return redirect()->route('admin.coaches.index')
            ->with('success', 'Coach deleted successfully.');
    }

    private function uploadImage($file, string $directory): string
    {
        $filename = Str::uuid().'.'.$file->getClientOriginalExtension();
        $file->storeAs($directory, $filename, 'public');

        return $filename;
    }
}
