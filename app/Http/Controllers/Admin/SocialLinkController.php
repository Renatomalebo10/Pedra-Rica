<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SocialLink;
use Illuminate\Http\Request;

class SocialLinkController extends Controller
{
    public function index()
    {
        $socialLinks = SocialLink::orderBy('sort_order')->get();

        return view('admin.social-links.index', compact('socialLinks'));
    }

    public function create()
    {
        $maxOrder = SocialLink::max('sort_order') ?? 0;

        return view('admin.social-links.form', ['maxOrder' => $maxOrder]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'platform' => ['required', 'string', 'max:255'],
            'url' => ['required', 'url', 'max:255'],
            'is_active' => ['boolean'],
            'sort_order' => ['required', 'integer', 'min:0'],
        ]);

        $validated['is_active'] = $request->boolean('is_active');

        SocialLink::create($validated);

        return redirect()->route('admin.social-links.index')
            ->with('success', 'Social link created successfully.');
    }

    public function show(SocialLink $socialLink)
    {
        return view('admin.social-links.show', compact('socialLink'));
    }

    public function edit(SocialLink $socialLink)
    {
        return view('admin.social-links.form', compact('socialLink'));
    }

    public function update(Request $request, SocialLink $socialLink)
    {
        $validated = $request->validate([
            'platform' => ['required', 'string', 'max:255'],
            'url' => ['required', 'url', 'max:255'],
            'is_active' => ['boolean'],
            'sort_order' => ['required', 'integer', 'min:0'],
        ]);

        $validated['is_active'] = $request->boolean('is_active');

        $socialLink->update($validated);

        return redirect()->route('admin.social-links.index')
            ->with('success', 'Social link updated successfully.');
    }

    public function destroy(SocialLink $socialLink)
    {
        $socialLink->delete();

        return redirect()->route('admin.social-links.index')
            ->with('success', 'Social link deleted successfully.');
    }
}
