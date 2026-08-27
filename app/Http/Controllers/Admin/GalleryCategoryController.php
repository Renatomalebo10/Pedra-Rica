<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GalleryCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GalleryCategoryController extends Controller
{
    public function index(Request $request)
    {
        $query = GalleryCategory::query();

        if ($search = $request->input('search')) {
            $query->where('name', 'like', "%{$search}%");
        }

        $categories = $query->withCount('images')->latest()->paginate(15)->withQueryString();

        return view('admin.gallery-categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.gallery-categories.form');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:gallery_categories,slug'],
        ]);

        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['name']);
        }

        GalleryCategory::create($validated);

        return redirect()->route('admin.gallery-categories.index')
            ->with('success', 'Category created successfully.');
    }

    public function show(GalleryCategory $category)
    {
        $category->load('images');

        return view('admin.gallery-categories.show', compact('category'));
    }

    public function edit(GalleryCategory $category)
    {
        return view('admin.gallery-categories.form', compact('category'));
    }

    public function update(Request $request, GalleryCategory $category)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:gallery_categories,slug,'.$category->id],
        ]);

        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['name']);
        }

        $category->update($validated);

        return redirect()->route('admin.gallery-categories.index')
            ->with('success', 'Category updated successfully.');
    }

    public function destroy(GalleryCategory $category)
    {
        $category->delete();

        return redirect()->route('admin.gallery-categories.index')
            ->with('success', 'Category deleted successfully.');
    }
}
