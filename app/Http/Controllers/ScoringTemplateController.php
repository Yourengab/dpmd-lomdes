<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ScoringTemplate;
use App\Models\AdminDocument;

class ScoringTemplateController extends Controller
{
    public function index()
    {
        $templates = ScoringTemplate::with('adminDocument')->latest()->get();
        return view('admin.scoring-templates.index', compact('templates'));
    }

    public function create()
    {
        $documents = AdminDocument::orderBy('title')->get();
        return view('admin.scoring-templates.create', compact('documents'));
    }

    public function store(Request $request)
    {
        $rules = [
            'title' => 'required|string|max:200',
            'description' => 'nullable|string',
            'category' => 'required|in:tahap_administrasi,tahap_pemaparan,tahap_klarifikasi_lapangan,daftar_inovasi',
        ];

        // Add validation rules based on category
        switch ($request->category) {
            case 'tahap_administrasi':
                $rules['admin_document_id'] = 'required|exists:admin_documents,id';
                $rules['spreadsheet_url'] = 'required|url|max:255';
                break;
            case 'tahap_pemaparan':
                $rules['questions_spreadsheet_url'] = 'required|url|max:255';
                $rules['village_spreadsheet_url'] = 'required|url|max:255';
                $rules['district_spreadsheet_url'] = 'required|url|max:255';
                break;
            case 'tahap_klarifikasi_lapangan':
                $rules['event_date'] = 'required|date';
                $rules['spreadsheet_url'] = 'required|url|max:255';
                break;
            case 'daftar_inovasi':
                $rules['spreadsheet_url'] = 'required|url|max:255';
                break;
        }

        $request->validate($rules);

        ScoringTemplate::create($request->all());

        return redirect()->route('admin.scoring-templates.index')
            ->with('success', 'Scoring template created successfully.');
    }

    public function show(ScoringTemplate $scoringTemplate)
    {
        $scoringTemplate->load('adminDocument');
        return view('admin.scoring-templates.show', compact('scoringTemplate'));
    }

    public function edit(ScoringTemplate $scoringTemplate)
    {
        $documents = AdminDocument::orderBy('title')->get();
        return view('admin.scoring-templates.edit', compact('scoringTemplate', 'documents'));
    }

    public function update(Request $request, ScoringTemplate $scoringTemplate)
    {
        $rules = [
            'title' => 'required|string|max:200',
            'description' => 'nullable|string',
            'category' => 'required|in:tahap_administrasi,tahap_pemaparan,tahap_klarifikasi_lapangan,daftar_inovasi',
        ];

        // Add validation rules based on category
        switch ($request->category) {
            case 'tahap_administrasi':
                $rules['admin_document_id'] = 'required|exists:admin_documents,id';
                $rules['spreadsheet_url'] = 'required|url|max:255';
                break;
            case 'tahap_pemaparan':
                $rules['questions_spreadsheet_url'] = 'required|url|max:255';
                $rules['village_spreadsheet_url'] = 'required|url|max:255';
                $rules['district_spreadsheet_url'] = 'required|url|max:255';
                break;
            case 'tahap_klarifikasi_lapangan':
                $rules['event_date'] = 'required|date';
                $rules['spreadsheet_url'] = 'required|url|max:255';
                break;
            case 'daftar_inovasi':
                $rules['spreadsheet_url'] = 'required|url|max:255';
                break;
        }

        $request->validate($rules);

        $scoringTemplate->update($request->all());

        return redirect()->route('admin.scoring-templates.index')
            ->with('success', 'Scoring template updated successfully.');
    }

    public function destroy(ScoringTemplate $scoringTemplate)
    {
        $scoringTemplate->delete();

        return redirect()->route('admin.scoring-templates.index')
            ->with('success', 'Scoring template deleted successfully.');
    }
}
