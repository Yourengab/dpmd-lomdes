<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $schedules = Schedule::all();

        // Check if this is an admin request
        if (request()->is('admin/*')) {
            return view('admin.schedules.index', compact('schedules'));
        }

        return view('schedules.index', compact('schedules'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.schedules.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'type' => 'required|in:desa,kelurahan',
            'meet_link' => 'required|url',
            'top_village_1' => 'nullable|string|max:255',
            'time_1' => 'nullable|date_format:H:i',
            'top_village_2' => 'nullable|string|max:255',
            'time_2' => 'nullable|date_format:H:i',
            'top_village_3' => 'nullable|string|max:255',
            'time_3' => 'nullable|date_format:H:i',
        ]);

        Schedule::create($request->all());

        return redirect()->route('admin.schedules.index')->with('success', 'Schedule created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Schedule $schedule)
    {
        return view('admin.schedules.show', compact('schedule'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Schedule $schedule)
    {
        return view('admin.schedules.edit', compact('schedule'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Schedule $schedule)
    {
        $request->validate([
            'date' => 'required|date',
            'type' => 'required|in:desa,kelurahan',
            'meet_link' => 'required|url',
            'top_village_1' => 'nullable|string|max:255',
            'time_1' => 'nullable|date_format:H:i',
            'top_village_2' => 'nullable|string|max:255',
            'time_2' => 'nullable|date_format:H:i',
            'top_village_3' => 'nullable|string|max:255',
            'time_3' => 'nullable|date_format:H:i',
        ]);

        $schedule->update($request->all());

        return redirect()->route('admin.schedules.index')->with('success', 'Schedule updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Schedule $schedule)
    {
        $schedule->delete();

        return redirect()->route('admin.schedules.index')->with('success', 'Schedule deleted successfully.');
    }
}
