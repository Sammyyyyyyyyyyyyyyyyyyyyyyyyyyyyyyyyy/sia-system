<?php

namespace App\Http\Controllers;

use App\Models\CalendarEvent;
use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CalendarController extends Controller
{
    // Display the instructor's own calendar events
    public function index()
{
    $events = CalendarEvent::where('user_id', Auth::id())
        ->orderBy('event_date')
        ->orderBy('event_time')
        ->get();

    $activities = Activity::with('blocks')
        ->where('user_id', Auth::id())
        ->latest()
        ->get();

    $blocks = ['3-A', '3-B', '3-C', '3-D', '3-E', '3-L'];

    return view(
        'dashboard_layout.calendar',
        compact('events', 'activities', 'blocks')
    );
}

    // Save a new calendar event
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'event_type' => 'required|in:Exam,Deadline,Meeting,Activity,Other',
            'event_date' => 'required|date',
            'event_time' => 'nullable|date_format:H:i',
            'description' => 'nullable|string|max:2000',
        ]);

        CalendarEvent::create([
            'user_id' => Auth::id(),
            'title' => $validated['title'],
            'event_type' => $validated['event_type'],
            'event_date' => $validated['event_date'],
            'event_time' => $validated['event_time'] ?? null,
            'description' => $validated['description'] ?? null,
        ]);

        return redirect('/calendar')->with('success', 'Event added successfully!');
    }

    // Update an existing event
    public function update(Request $request, $id)
    {
        $event = CalendarEvent::where('user_id', Auth::id())
            ->findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'event_type' => 'required|in:Exam,Deadline,Meeting,Activity,Other',
            'event_date' => 'required|date',
            'event_time' => 'nullable|date_format:H:i',
            'description' => 'nullable|string|max:2000',
        ]);

        $event->update($validated);

        return redirect('/calendar')->with('success', 'Event updated successfully!');
    }

    // Delete an event
    public function destroy($id)
    {
        $event = CalendarEvent::where('user_id', Auth::id())
            ->findOrFail($id);

        $event->delete();

        return redirect('/calendar')->with('success', 'Event deleted successfully!');
    }
}