<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\GalleryCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class GalleryController extends Controller
{
    public function index(Request $request)
    {
        $query = Gallery::with('category');

        if ($search = $request->input('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('alt_text', 'like', "%{$search}%");
            });
        }

        if ($request->filled('category_id')) {
            $query->where('category_id', $request->input('category_id'));
        }

        $images = $query->latest()->paginate(15)->withQueryString();
        $categories = GalleryCategory::orderBy('name')->get();

        return view('admin.gallery.index', compact('images', 'categories'));
    }

    public function create()
    {
        $categories = GalleryCategory::orderBy('name')->get();

        return view('admin.gallery.form', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'image' => ['required', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'category_id' => ['required', 'exists:gallery_categories,id'],
            'alt_text' => ['nullable', 'string', 'max:255'],
        ]);

        $validated['image_path'] = $this->uploadImage($request->file('image'), 'gallery');
        unset($validated['image']);

        Gallery::create($validated);

        return redirect()->route('admin.gallery.index')
            ->with('success', 'Image uploaded successfully.');
    }

    public function show(Gallery $image)
    {
        $image->load('category');

        return view('admin.gallery.show', compact('image'));
    }

    public function edit(Gallery $image)
    {
        $categories = GalleryCategory::orderBy('name')->get();

        return view('admin.gallery.form', compact('image', 'categories'));
    }

    public function update(Request $request, Gallery $image)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'category_id' => ['required', 'exists:gallery_categories,id'],
            'alt_text' => ['nullable', 'string', 'max:255'],
        ]);

        if ($request->hasFile('image')) {
            if ($image->image_path) {
                Storage::disk('public')->delete('gallery/'.$image->image_path);
            }
            $validated['image_path'] = $this->uploadImage($request->file('image'), 'gallery');
        }

        unset($validated['image']);

        $image->update($validated);

        return redirect()->route('admin.gallery.index')
            ->with('success', 'Image updated successfully.');
    }

    public function destroy(Gallery $image)
    {
        if ($image->image_path) {
            Storage::disk('public')->delete('gallery/'.$image->image_path);
        }

        $image->delete();

        return redirect()->route('admin.gallery.index')
            ->with('success', 'Image deleted successfully.');
    }

    private function uploadImage($file, string $directory): string
    {
        $filename = Str::uuid().'.'.$file->getClientOriginalExtension();
        $file->storeAs($directory, $filename, 'public');

        return $filename;
    }
}
