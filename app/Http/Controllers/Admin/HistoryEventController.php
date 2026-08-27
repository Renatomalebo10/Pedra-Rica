<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HistoryEvent;
use Illuminate\Http\Request;

class HistoryEventController extends Controller
{
    public function index(Request $request)
    {
        $query = HistoryEvent::withoutGlobalScopes();

        if ($search = $request->input('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%");
            });
        }

        $events = $query->orderBy('sort_order')->orderByDesc('year')->paginate(15)->withQueryString();

        return view('admin.history-events.index', compact('events'));
    }

    public function create()
    {
        $maxOrder = HistoryEvent::withoutGlobalScopes()->max('sort_order') ?? 0;

        return view('admin.history-events.form', ['maxOrder' => $maxOrder]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'event_date' => ['nullable', 'string', 'max:255'],
            'year' => ['required', 'integer', 'min:1900', 'max:'.(date('Y') + 1)],
            'sort_order' => ['required', 'integer', 'min:0'],
        ]);

        HistoryEvent::create($validated);

        return redirect()->route('admin.history-events.index')
            ->with('success', 'History event created successfully.');
    }

    public function show(HistoryEvent $event)
    {
        return view('admin.history-events.show', compact('event'));
    }

    public function edit(HistoryEvent $event)
    {
        return view('admin.history-events.form', compact('event'));
    }

    public function update(Request $request, HistoryEvent $event)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'event_date' => ['nullable', 'string', 'max:255'],
            'year' => ['required', 'integer', 'min:1900', 'max:'.(date('Y') + 1)],
            'sort_order' => ['required', 'integer', 'min:0'],
        ]);

        $event->update($validated);

        return redirect()->route('admin.history-events.index')
            ->with('success', 'History event updated successfully.');
    }

    public function destroy(HistoryEvent $event)
    {
        $event->delete();

        return redirect()->route('admin.history-events.index')
            ->with('success', 'History event deleted successfully.');
    }
}
