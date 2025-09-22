<?php

namespace App\Http\Controllers;

use App\Models\VideoSubmission;
use Illuminate\Http\Request;

class VideoSubmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $videoSubmissions = VideoSubmission::all();

        // Check if this is an admin request
        if (request()->is('admin/*')) {
            return view('admin.video-submissions.index', compact('videoSubmissions'));
        }

        return view('video-submissions.index', compact('videoSubmissions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.video-submissions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'link' => 'required|url',
        ]);

        VideoSubmission::create($request->all());

        return redirect()->route('admin.video-submissions.index')->with('success', 'Video submission created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(VideoSubmission $videoSubmission)
    {
        return view('admin.video-submissions.show', compact('videoSubmission'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(VideoSubmission $videoSubmission)
    {
        return view('admin.video-submissions.edit', compact('videoSubmission'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, VideoSubmission $videoSubmission)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'link' => 'required|url',
        ]);

        $videoSubmission->update($request->all());

        return redirect()->route('admin.video-submissions.index')->with('success', 'Video submission updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VideoSubmission $videoSubmission)
    {
        $videoSubmission->delete();

        return redirect()->route('admin.video-submissions.index')->with('success', 'Video submission deleted successfully.');
    }
}
