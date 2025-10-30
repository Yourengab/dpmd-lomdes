<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clarification;

class ClarificationController extends Controller
{
    public function index()
    {
        $clarifications = Clarification::orderBy('date', 'desc')->get();
        return view('admin.clarifications.index', compact('clarifications'));
    }

    public function create()
    {
        return view('admin.clarifications.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|in:desa,kelurahan',
            'date' => 'required|date',
        ]);
        Clarification::create($request->only('title', 'category', 'date'));
        return redirect()->route('admin.clarifications.index')->with('success', 'Jadwal berhasil ditambahkan.');
    }

    public function edit(Clarification $clarification)
    {
        return view('admin.clarifications.edit', compact('clarification'));
    }

    public function update(Request $request, Clarification $clarification)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|in:desa,kelurahan',
            'date' => 'required|date',
        ]);
        $clarification->update($request->only('title', 'category', 'date'));
        return redirect()->route('admin.clarifications.index')->with('success', 'Jadwal berhasil diupdate.');
    }

    public function destroy(Clarification $clarification)
    {
        $clarification->delete();
        return redirect()->route('admin.clarifications.index')->with('success', 'Jadwal berhasil dihapus.');
    }
}
