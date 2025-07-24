<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Club;
use Illuminate\Http\Request;

class EventController extends Controller
{
    // Show all events
    public function index()
    {
        $events = Event::with('club')->orderBy('date', 'asc')->get();
        return view('events.index', compact('events'));
    }

    // Show the create form
    public function create()
    {
        $clubs = Club::all(); // for dropdown
        return view('events.create', compact('clubs'));
    }

    // Store new event
    public function store(Request $request)
    {
        $request->validate([
        'title' => 'required|string|max:255',
        'club_id' => 'required|exists:clubs,id',
        'date' => 'required|date',
        'venue' => 'required|string|max:255',
        'description' => 'nullable|string',
    ]);

    Event::create($request->only('title', 'club_id', 'date', 'venue', 'description'));

    return redirect()->route('events.index')->with('success', 'Event created successfully!');

    }

    // Show specific event
    public function show(Event $event)
    {
        return view('events.show', compact('event'));
    }

    // Show edit form
    public function edit(Event $event)
    {
        $clubs = Club::all();
        return view('events.edit', compact('event', 'clubs'));
    }

    // Update event
    public function update(Request $request, Event $event)
    {
        $request->validate([
        'title' => 'required|string|max:255',
        'club_id' => 'required|exists:clubs,id',
        'date' => 'required|date',
        'venue' => 'required|string|max:255',
        'description' => 'nullable|string',
     ]);

        $event->update($request->only('title', 'club_id', 'date', 'venue', 'description'));

        return redirect()->route('events.index')->with('success', 'Event updated successfully!');
    }

    // Delete event
    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->route('events.index')->with('success', 'Event deleted successfully.');
    }
}
