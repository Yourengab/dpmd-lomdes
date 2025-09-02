<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminDocument;

class RegistrationController extends Controller
{
    public function index()
    {
        return view('registration.index');
    }

    public function village()
    {
        $documents = AdminDocument::where('category', 'village')
            ->orderBy('created_at', 'desc')
            ->get();
        
        return view('registration.village', compact('documents'));
    }

    public function district()
    {
        $documents = AdminDocument::where('category', 'district')
            ->orderBy('created_at', 'desc')
            ->get();
        
        return view('registration.district', compact('documents'));
    }

    public function showForm($id)
    {
        $document = AdminDocument::findOrFail($id);
        return view('registration.form', compact('document'));
    }
}
