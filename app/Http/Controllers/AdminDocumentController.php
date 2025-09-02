<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminDocument;

class AdminDocumentController extends Controller
{
    /**
     * Display a listing of admin documents.
     */
    public function index()
    {
        $documents = AdminDocument::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.documents.index', compact('documents'));
    }

    /**
     * Show the form for creating a new document.
     */
    public function create()
    {
        return view('admin.documents.create');
    }

    /**
     * Store a newly created document in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:200',
            'description' => 'nullable|string',
            'file_url' => 'required|url|max:255',
            'category' => 'required|in:village,district',
        ]);

        AdminDocument::create([
            'title' => $request->title,
            'description' => $request->description,
            'file_url' => $request->file_url,
            'category' => $request->category,
        ]);

        return redirect()->route('admin.documents.index')->with('success', 'Document created successfully.');
    }

    /**
     * Display the specified document.
     */
    public function show(AdminDocument $document)
    {
        return view('admin.documents.show', compact('document'));
    }

    /**
     * Show the form for editing the specified document.
     */
    public function edit(AdminDocument $document)
    {
        return view('admin.documents.edit', compact('document'));
    }

    /**
     * Update the specified document in storage.
     */
    public function update(Request $request, AdminDocument $document)
    {
        $request->validate([
            'title' => 'required|string|max:200',
            'description' => 'nullable|string',
            'file_url' => 'required|url|max:255',
            'category' => 'required|in:village,district',
        ]);

        $document->update([
            'title' => $request->title,
            'description' => $request->description,
            'file_url' => $request->file_url,
            'category' => $request->category,
        ]);

        return redirect()->route('admin.documents.index')->with('success', 'Document updated successfully.');
    }

    /**
     * Remove the specified document from storage.
     */
    public function destroy(AdminDocument $document)
    {
        $document->delete();
        return redirect()->route('admin.documents.index')->with('success', 'Document deleted successfully.');
    }
}
