<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $query = News::query();

        if ($search = $request->input('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('author', 'like', "%{$search}%")
                    ->orWhere('category', 'like', "%{$search}%");
            });
        }

        if ($request->filled('is_published')) {
            $query->where('is_published', $request->boolean('is_published'));
        }

        if ($request->filled('category')) {
            $query->where('category', $request->input('category'));
        }

        $news = $query->latest('published_at')->latest()->paginate(15)->withQueryString();

        return view('admin.news.index', compact('news'));
    }

    public function create()
    {
        return view('admin.news.form');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:news,slug'],
            'content' => ['required', 'string'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'author' => ['nullable', 'string', 'max:255'],
            'category' => ['nullable', 'string', 'max:255'],
            'is_published' => ['boolean'],
            'published_at' => ['nullable', 'date'],
        ]);

        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title']);
        }

        $validated['is_published'] = $request->boolean('is_published');

        if ($validated['is_published'] && empty($validated['published_at'])) {
            $validated['published_at'] = now();
        }

        if ($request->hasFile('image')) {
            $validated['image'] = $this->uploadImage($request->file('image'), 'news');
        }

        News::create($validated);

        return redirect()->route('admin.news.index')
            ->with('success', 'News article created successfully.');
    }

    public function show(News $article)
    {
        return view('admin.news.show', ['news' => $article]);
    }

    public function edit(News $article)
    {
        return view('admin.news.form', ['news' => $article]);
    }

    public function update(Request $request, News $article)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:news,slug,'.$article->id],
            'content' => ['required', 'string'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'author' => ['nullable', 'string', 'max:255'],
            'category' => ['nullable', 'string', 'max:255'],
            'is_published' => ['boolean'],
            'published_at' => ['nullable', 'date'],
        ]);

        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title']);
        }

        $validated['is_published'] = $request->boolean('is_published');

        if ($validated['is_published'] && ! $article->is_published && empty($validated['published_at'])) {
            $validated['published_at'] = now();
        }

        if ($request->hasFile('image')) {
            if ($article->image) {
                Storage::disk('public')->delete('news/'.$article->image);
            }
            $validated['image'] = $this->uploadImage($request->file('image'), 'news');
        }

        $article->update($validated);

        return redirect()->route('admin.news.index')
            ->with('success', 'News article updated successfully.');
    }

    public function destroy(News $article)
    {
        if ($article->image) {
            Storage::disk('public')->delete('news/'.$article->image);
        }

        $article->delete();

        return redirect()->route('admin.news.index')
            ->with('success', 'News article deleted successfully.');
    }

    public function togglePublish(News $article)
    {
        $article->update([
            'is_published' => ! $article->is_published,
            'published_at' => $article->is_published ? null : now(),
        ]);

        return redirect()->back()
            ->with('success', 'Publish status updated.');
    }

    private function uploadImage($file, string $directory): string
    {
        $filename = Str::uuid().'.'.$file->getClientOriginalExtension();
        $file->storeAs($directory, $filename, 'public');

        return $filename;
    }
}
